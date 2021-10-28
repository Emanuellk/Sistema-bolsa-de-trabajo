<?php
    namespace Controllers;

    use DAO\JobOfferDAO as JobOfferDAO;
    use Models\Offer as Offer;

    
        class OfferController{
            private $jobOfferDAO;

            public function __construct()
            {
                $this->jobOfferDAO = new JobOfferDAO();
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
                $jobList = $this->jobOfferDAO->GetAll();
            
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