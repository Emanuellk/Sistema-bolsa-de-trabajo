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

           

            public function ShowAddMesaggeView($message = "")
            {
                echo "<script>alert('$message');</script>"; 
            }

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


            public function ShowOfferView()
            {

                $offerList = $this->OfferDAO->GetAll();
                $jobOfferList = array();
                $User = $this->UserDAO->SearchUserByEmail($_SESSION['loggedUser']);
                
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
                require_once(VIEWS_PATH."offer-view.php");
            }

            public function apply($userId,$offerId)
            {
                try{
                    $aux = new UserXOffer("",$userId,$offerId);
                    
                    
                    $this->UserXOfferDAO->Add($aux);
                    $this->ShowOfferView();
                    
                }
                catch(Exception $ex){
                    $this->ShowAddMesaggeView("Error al cargar esta oferta laboral");
                }
            }


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

        
            public function Delete($id)
            {
                $this->OfferDAO->deleteOffer($id);
                $this-> ShowPostulationView();
            }

            public function Update( $title,$idCompany ,$idJobPosition, $publicationDate, $expirationDate, $workLoad, $salary, $requirements,$description, $id)
            {
                
                $this->OfferDAO->updateOffer($title,$idCompany ,$idJobPosition, $publicationDate, $expirationDate, $workLoad, $salary, $requirements,$description, $id);
                $this->ShowManageView();
            } 

            public function JobList()
            {
                $jobList = $this->OfferDAO->GetAll(); 
                require_once(VIEWS_PATH."job-list.php");
            }



            
		public function ShowPostulates($id)
		{
			
			$userxofferList = $this->UserXOfferDAO->SearchByOfferId($id);
            $studentsList = array();
    
			foreach($userxofferList as  $userxoffer){
                $user = $this->UserDAO->SearchById($userxoffer->getIdUser());
                $student = $this->StudentsDAO->SearchStudentByEmail($user->getEmail());
            
                
                array_push($studentsList, $student);
            }

			require_once(VIEWS_PATH."jobOffer-postulates.php");
		}

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
                $jobList = $this->JobDAO->GetAll();
                $companyList = $this->CompanyDAO->GetAll();
                require_once(VIEWS_PATH."postulation-view.php");
            }

        }     
?>