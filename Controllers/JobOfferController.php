<?php
    namespace Controllers;

    use Models\JobOffer as JobOffer;
    use Models\Offer as Offer;
    use Models\Career;
    use Models\Job;

    use DAO\OfferDAO as OfferDAO;    
    use DAO\CareerDAO as CareerDAO;
    use DAO\JobDAO as JobDAO;
    use DAO\CompanyDAO as CompanyDAO;
    use \Exception as Exception;
    use Models\Company;

class JobOfferController{
            
            private $OfferDAO;
            private $JobDAO;
            private $CareerDAO;
            private $CompanyDAO;

            public function __construct()
            {
                $this->OfferDAO = new OfferDAO();
                $this->JobDAO = new JobDAO();
                $this->CareerDAO = new CareerDAO();
                $this->CompanyDAO = new CompanyDAO();          
            }

            public function ShowAddView()
            {
                require_once(VIEWS_PATH."job-add.php");
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
                
                
                require_once(VIEWS_PATH."job-manage.php");
            }
            

            public function Add($title, $description, $publicationDate, $expirationDate, $workLoad, $salary, $requeriments)
            {
                try{
                    $offer = new Offer($title, $description, $publicationDate, $expirationDate, $workLoad, $salary, $requeriments);
                    $this->JobOfferDAO->Add($offer);
                    $this->ShowAddMesaggeView("Registro de oferta laboral exitoso");
                    $this->ShowManageView();
                }
                catch(Exception $ex){
                    $this->ShowAddMesaggeView("Error al cargar esta oferta laboral");
                }
            }

        
            public function Delete($id)
            {
                
                $this->JobOffferDAO->deleteOffer($id);
                $this->ShowManageView();
            }

            public function Update($id, $title, $description, $publicationDate, $expirationDate, $workLoad, $salary, $requeriments)
            {
                
                $this->JobOfferDAO->updateOffer($id, $title, $description, $publicationDate, $expirationDate, $workLoad, $salary, $requeriments);
                $this->ShowManageView();
            } 

            public function JobList()
            {
                $jobList = $this->JobOfferDAO->GetAll(); 
                require_once(VIEWS_PATH."job-list.php");
            }

        }     
?>