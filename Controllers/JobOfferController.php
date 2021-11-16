<?php
    namespace Controllers;

    
    use Models\JobOffer as JobOffer;
    use Models\Offer as Offer;
    use Models\Career;
    use Models\Job;   
    use Models\User;
    use Models\userXOffer as UserXOffer;
    use Models\Students as Students;    

    
    use DAO\userXOfferDAO as UserXOfferDAO;
    use DAO\UserDAO as UserDAO;
    use DAO\OfferDAO as OfferDAO;    
    use DAO\CareerDAO as CareerDAO;
    use DAO\JobDAO as JobDAO;
    use DAO\CompanyDAO as CompanyDAO;
    use DAO\StudentsDAO as StudentsDAO;
    /*use \Exception as Exception;*/
    use Models\Company;


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

class JobOfferController{
            
            private $UserDAO;
            private $OfferDAO;
            private $JobDAO;
            private $CareerDAO;
            private $CompanyDAO;    
            private $UserXOfferDAO;
            private $StudentsDAO;

            public function __construct()
            {
                $this->UserXOfferDAO = new UserXOfferDAO();
                $this->OfferDAO = new OfferDAO();
                $this->JobDAO = new JobDAO();
                $this->CareerDAO = new CareerDAO();
                $this->CompanyDAO = new CompanyDAO(); 
                $this->UserDAO = new UserDAO();
                $this->StudentsDAO = new StudentsDAO;         
            }

            //==================================================================================================================================
            //Admin---------------------------------------------------------------------------------------------------------------------------
            //==================================================================================================================================            

            

            //Administrar Empleo / job-manage.php


            public function ShowManageView()
            {
                $offerList = $this->OfferDAO->GetAll();
                $jobOfferList = array();

                foreach($offerList as $offer){
                    $jobPosition= new Job();
                    $career= new Career();
                    $company = new Company();



                    $jobPosition= $this->JobDAO->SearchById($offer->getIdJobPosition());

                    $career = $this->CareerDAO->SearchCareerById($jobPosition->getCareerId());

                    $company = $this->CompanyDAO->SearchById($offer->getIdCompany());

                    $jobOffer = new JobOffer($offer->getId(),$offer->getIdCompany(),$offer->getIdjobPosition(),$offer->getTitle(),$offer->getDescription(),$offer->getPublicationDate(),$offer->getExpirationDate(),$offer->getWorkLoad(),$offer->getSalary(),$offer->getRequirements(),$jobPosition->getCareerId(),$jobPosition->getDescription(),$career->getDescription(),$company->getNameCompany(),$company->getEmail());
                    
                    array_push($jobOfferList, $jobOffer);
                }
                $jobList = $this->JobDAO->GetAll();
                $companyList = $this->CompanyDAO->GetAll();
                
                require_once(VIEWS_PATH."job-manage.php");
            }
         

            public function Update( $title,$idCompany ,$idJobPosition, $publicationDate, $expirationDate, $workLoad, $salary, $requirements,$description, $id)
            {    
                $this->OfferDAO->updateOffer($title,$idCompany ,$idJobPosition, $publicationDate, $expirationDate, $workLoad, $salary, $requirements,$description, $id);
                $this->ShowManageView();
            } 


            //ver usuarios que postularon a una oferta / jobOffer-postulates.php
            public function ShowPostulates($id)
            {

            $userxofferList = $this->UserXOfferDAO->SearchByOfferId($id);
            $studentsList = array();

            foreach($userxofferList as  $userxoffer){
                $user = $this->UserDAO->SearchById($userxoffer->getIdUser());
                $student = $this->StudentsDAO->SearchStudentByEmail($user->getEmail());

                if($student->getActive()==true){ 
                    array_push($studentsList, $student);
                }
                else
                {
                    $this->UserXOfferDAO->deletePostulationsByUserId($userxoffer->getIdUser());
                }

               
            }
            foreach($studentsList as $student){
                $emails[] = $student->getEmail();
            }
            var_dump($emails);
            require_once(VIEWS_PATH."jobOffer-postulates.php");
            
            }

            public function Delete($id)
            {
                $offerAux = $this->OfferDAO->SearchOffer($id);
                $companyAux = $this->CompanyDAO->SearchById($offerAux->getIdCompany());
                $this->sendMailFinisheOffer($offerAux->getTitle(),$companyAux->getNameCompany());
                $this->OfferDAO->deleteOffer($id);
                 
                $this->ShowManageView();
            }
            
            //Agregar Empleo / offer-add.php


            public function ShowAddView()
            {   
                $jobList = $this->JobDAO->GetAll();                
                $companyList = $this->CompanyDAO->GetAll();
                require_once(VIEWS_PATH."offer-add.php");
            }


            public function Add($idCompany,$idJobPosition,$title, $description, $publicationDate, $expirationDate, $workLoad, $salary, $requirements)
            {
                try{
                    $offer = new Offer("",$idCompany,$idJobPosition,$title, $description, $publicationDate, $expirationDate, $workLoad, $salary, $requirements);
                    
                    $this->OfferDAO->Add($offer);
                    $this->ShowAddMesaggeView("Registro de oferta laboral exitoso");
                    $this->ShowManageView();
                }
                catch(Exception $ex){
                    $this->ShowAddMesaggeView("Error al cargar esta oferta laboral");
                }
            }


            //==================================================================================================================================
            //USUARIO---------------------------------------------------------------------------------------------------------------------------
            //==================================================================================================================================
            
            //Ver empleos / offer-view.php


            public function ShowOfferView()
            {

                $offerList = $this->OfferDAO->GetAll();
                $jobOfferList = array();
                $alreadyPostulated = array();
                $User = $this->UserDAO->SearchUserByEmail($_SESSION['loggedUser']);
                
                foreach($offerList as $offer){
                    $jobPosition= new Job();
                    $career= new Career();
                    $company = new Company();


                    $jobPosition= $this->JobDAO->SearchById($offer->getIdJobPosition());

                    $career = $this->CareerDAO->SearchCareerById($jobPosition->getCareerId());

                    $company = $this->CompanyDAO->SearchById($offer->getIdCompany());                
                    
                    

                    $jobOffer = new JobOffer($offer->getId(),$offer->getIdCompany(),$offer->getIdjobPosition(),$offer->getTitle(),$offer->getDescription(),$offer->getPublicationDate(),$offer->getExpirationDate(),$offer->getWorkLoad(),$offer->getSalary(),$offer->getRequirements(),$jobPosition->getCareerId(),$jobPosition->getDescription(),$career->getDescription(),$company->getNameCompany(),$company->getEmail());

                    $userxoffer = $this->UserXOfferDAO->SearchOfferByUser($offer->getId(),$User->getId());

                    if(!empty($userxoffer)) {                        
                        array_push($alreadyPostulated,"exist");
                            
                    }else{            
                        array_push($alreadyPostulated,"not-exist");
                    }
                    
                    array_push($jobOfferList, $jobOffer);
                }
               
                require_once(VIEWS_PATH."offer-view.php");
            }

            
            public function apply($userId,$offerId)
            {
                $userxoffer = $this->UserXOfferDAO->SearchOfferByUser($offerId,$userId);

                if(empty($userxoffer)) {
                     $aux = new UserXOffer("",$userId,$offerId);
                    
                     $this->UserXOfferDAO->Add($aux);
                     $this->ShowOfferView();
                     $this->ShowAddMesaggeView("Postulación cargada con éxito.");
                        
                }else{            
                        $this->ShowOfferView();          
                        $this->ShowAddMesaggeView("Error! Ya se encuentra postulado a esta oferta   ");
                }

                /*
                try{
                    $aux = new UserXOffer("",$userId,$offerId);
                    
                    
                    $this->UserXOfferDAO->Add($aux);
                    $this->ShowOfferView();
                    $this->ShowAddMesaggeView("Postulación cargada con éxito.");
                    
                }
                catch(Exception $ex){
                    $this->ShowAddMesaggeView("Error al cargar esta oferta laboral");
                }*/
            }
                
                
            



            //Ver Historial(Mi Perfil) / postulation-view.php      

            
            public function ShowPostulationView()
            {

                $offerList = array();
                $jobOfferList = array();
                $User = $this->UserDAO->SearchUserByEmail($_SESSION['loggedUser']);
                $listPostulation = $this->UserXOfferDAO->SearchByUserId($User->getId());  
                

                foreach($listPostulation as $postulation){

                    $jobOffer = $this->OfferDAO->SearchOffer($postulation->getIdOffer());
                    array_push($offerList, $jobOffer);
                }
                
                foreach($offerList as $offer){
                    $jobPosition= new Job();
                    $career= new Career();
                    $company = new Company();
                   

                    $jobPosition= $this->JobDAO->SearchById($offer->getIdJobPosition());

                    $career = $this->CareerDAO->SearchCareerById($jobPosition->getCareerId());

                    $company = $this->CompanyDAO->SearchById($offer->getIdCompany());

                    $jobOffer = new JobOffer($offer->getId(),$offer->getIdCompany(),$offer->getIdjobPosition(),$offer->getTitle(),$offer->getDescription(),$offer->getPublicationDate(),$offer->getExpirationDate(),$offer->getWorkLoad(),$offer->getSalary(),$offer->getRequirements(),$jobPosition->getCareerId(),$jobPosition->getDescription(),$career->getDescription(),$company->getNameCompany(),$company->getEmail());
                    
                    array_push($jobOfferList, $jobOffer);
                }
                require_once(VIEWS_PATH."postulation-view.php");
            }


            public function DeletePostulation($id)
            {
                
                $this->UserXOfferDAO->deletePostulation($id);
                $this->ShowPostulationView();
            }

            

            //Extra
           
            public function ShowAddMesaggeView($message = "")
            {
                 echo "<script>alert('$message');</script>"; 
            }
 

            public function sendMailFinisheOffer($titleJob,$nameCompany){
                require_once(ROOT.'PHPMailer/PHPMailer.php');
                require_once(ROOT.'PHPMailer/SMTP.php');
                require_once(ROOT.'PHPMailer/Exception.php');

                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'linkedinUTN@gmail.com';                     //SMTP username
                    $mail->Password   = 'linkedinutn123';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom('linkedinUTN@gmail.com', 'Empleos UTN');
                    $mail->addAddress('linkedinUTN@gmail.com');     //Add a recipient
            
                    ///RECIBIR EL LISTADO DE MAILS
                    /*
                    $emails = $array;
                    for($i = 0; $i < count($emails); $i++){
                        $mail->AddAddress($emails[$i]);
                    }
                    /*

                    //Attachments
                    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                    */
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Linkedin UTN';
                    $mail->Body    = "
                    <table style='border: 8px groove orange;width: 600px;height: 300px;margin: 15px auto 0px auto; background-color:silver'>
                    <tr>
                    <td style='font-size:40px; text-align:center;'>Bolsa de Trabajo UTN</td>
                    </tr>
                    <tr> 
                      <td style='text-align:center;font-size:25px;' colspan='3'>Oferta de trabajo finalizada.</td> 
                    </tr>
                    <tr>
                    <td style='text-align:center;font-size:19px;'>Si quedaste seleccionad@ para el puesto la empresa se pondra
                    en contacto contigo en la brevedad. Gracias por participar en las postulaciones!</td> 
                    </tr>
                    <tr>
                    <td style='text-align:center;font-size:20px;'><strong>Titulo del trabajo: </strong>".$titleJob."<br><strong>Empresa: </strong>".$nameCompany."</td>
                    </tr>
                    </table>
                    ";
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
                    $mail->send();
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        }     



        /*
            ________________________________BBBBBBBBBBBB
            _______________________________BBBBBBBBBBBBB0
            __BBBBBBBBB___________________BBBBBBBBBBBBBBB,
            _BBBBBBBBBBBB________________BBBBBBBBBBBBBBBB0,
            _BBBBBBBBBBBBB_______________BBBBBBBBBBBBBBBB0
            BBBBBBBBBBBBBBBB____________BBBBBBBBBBBBBBBBB,
            _BBBBBBBBBBBBBBBB___________BBBBBBBBBBBBBBBB0,
            __BBBBBBBBBBBBBBBB_________BBBBBBBBBBBBBBBBB,
            __BBBBBBBBBBBBBBBB_________BBBBBBBBBBBBBBBB,
            ___BBBBBBBBBBBBBBBB________BBBBBBBBBBBBBBB,
            ____BBBBBBBBBBBBBBB________BBBBBBBBBBBBBB0,
            _____BBBBBBBBBBBBBB_______BBBBBBBBBBBBBB0,
            ______BBBBBBBBBBBBB_______BBBBBBBBBBBBBB,
            _______BBBBBBBBBBBBB______BBBBBBBBBBBBB,
            ________BBBBBBBBBBBB______BBBBBBBBBB00,
            __________BBBBBBBBBB______BBBBBBBBBBB,
            ___________BBBBBBBBBB_____BBBBBBBBBB0
            ____________BBBBBBBBB_____BBBBBBBBBB
            ______________BBBBBBB_____BBBBBBBB0
            ______________BBBBBBB_____BBBBBBBB
            _______________BBBBBB_____BBBBBBB
            ________________BBBBBBBBBBBBBBBBB_
            ______________BBBBBBBBBBBBBBBBBBBBBB
            ____________BBBBBBBBBBBBBBBBBBBBBBBBBB_
            __________BBBBBBBBBBBBB_________BBBBBBBB
            _________BBBBB__BBBBB____________BBBBBBBBB
            ________BBB________B______________BBBBBBBBB
            _______BBB_________B______________BBBBBBBBBB,
            _______BBB______BB_B_BBB__________BBBBBBBBBB,
            _______BBB_____BBB_B_BBBB________BBBBBBBBBBB,
            _______BBB________000___________BBBBBBBBBBBB,
            _______BBBB______00000_________BBBBBBBBBBBBB,
            ____00000BBBBBBBBB000BBBBBBBBBBBBBBBBBBBBBB00000000,
            ___0BBBB00BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB00BBBBBB0B0,
            __0BBBBBB00BBBB00______B000000BBBBBBBBBB000B00BBBB0B0,
            _0BBBBBBBB_BBBB00___B__BBBB000BBBBBBBBB00B0___B00000,
            _00BBBBB____BBBB00BBBBBB000BBBBBBBBBBBB0,
            __0BB_________B0B00000000BBBBBBBBBB0BB
            ________________00BBBBBBBBBBBB000000
            _____________BBBBB0B00000000000BBBB_
            ___________BB0B00BBBBBB0__BBBBBBBBBBB,
            __________BB_______BBBBB_BB0B00BB____BB,
            __________0B________BBBB_BBB__________BB,
            __________0BBBBBBBBBBBB__BBBBB_________B,
            ____________________________BBBB0BBBBBBB

        
        */
?>