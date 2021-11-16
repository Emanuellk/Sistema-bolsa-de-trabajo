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
    use \Exception as Exception;
    use Models\Company;


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

            
            public function Delete($id)
            {
                $this->OfferDAO->deleteOffer($id);
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

            require_once(VIEWS_PATH."jobOffer-postulates.php");
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
                     $user= $this->UserDAO->SearchById($userId);
                     $student = $this->StudentsDAO->SearchStudentByEmail($user->getEmail());
                     if($student->getActive()==true){
                     $this->UserXOfferDAO->Add($aux);
                     $this->ShowOfferView();
                     $this->ShowAddMesaggeView("Postulación cargada con éxito.");
                     }
                     else{
                        $this->ShowOfferView();          
                        $this->ShowAddMesaggeView("No esta activo");
                     }
                        
                }else{            
                        $this->ShowOfferView();          
                        $this->ShowAddMesaggeView("Error! Ya se encuentra postulado a esta oferta   ");
                }
                

                /*
                $user = $this->UserDAO->SearchById($userxoffer->getIdUser());
                $student = $this->StudentsDAO->SearchStudentByEmail($user->getEmail());
                if($student->getActive()==true){ 
                    array_push($studentsList, $student);
                }
                else
                {
                    $this->UserXOfferDAO->deletePostulationsByUserId($userxoffer->getIdUser());
                }
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


            public function UploadCv()
            { 
                $dir = "archivo/";
                $ruta_carga = $dir . $_FILES['archivo']['name'];

                if(!file_exists($dir))
                {
                    mkdir('archivo',0777,true);
                
                }
               if(move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_carga))
                    {
                        $this->ShowAddMesaggeView("Archivo subido con éxito");
                    }else{
                        $this->ShowAddMesaggeView("Error! No se pudo subir el archivo");
                    }           
            require_once(VIEWS_PATH."upload-cv.php");
            }


            //Extra
           
            public function ShowAddMesaggeView($message = "")
            {
                 echo "<script>alert('$message');</script>"; 
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