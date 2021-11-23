<?php
    namespace Controllers;

    use DAO\CompanyDAO as CompanyDAO;
    use DAO\JSON\JobDAO as JobDAO;
    use DAO\OfferDAO as OfferDAO;

    use Models\Company as Company;
    use Models\Offer as Offer;
    use Models\Job as Job;
    use \Exception as Exception;

    class CompanyController
    {
        private $companyDAO;

        public function __construct()
        {
            $this->companyDAO = new CompanyDAO();
            $this->offerDAO = new OfferDAO();
        }

        
        public function ShowAddView()
        {
            require_once(VIEWS_PATH."company-add.php");
        }
        
        public function ShowManageView()
        {
            $companyList = $this->companyDAO->GetAll();
           
            require_once(VIEWS_PATH."company-manage.php");
        }


        public function Add($nameCompany, $email, $createDate, $description)
        {
            $companyAux = $this->companyDAO->SearchNameCompany($nameCompany);

            if(empty($companyAux)){
                $company = new Company();
                $company = $this->companyDAO->createCompany($nameCompany,$email,$createDate,$description);
                $this->companyDAO->Add($company);

                $this->ShowAddMesaggeView("Registro de empresa exitoso");
            }
            else{
                $this->ShowAddMesaggeView("ERROR! Ya existe una empresa con ese nombre!");
            }
            $this->ShowAddView();
        }

        
        public function Delete($id){
            
            $this->companyDAO->deleteCompany($id);
            $this->ShowManageView();
        }


        public function Update($nameCompany, $email, $createDate,$description, $id){
            
            $this->companyDAO->updateCompany($nameCompany, $email, $createDate,$description, $id);
            $this->ShowManageView();
        }   


        public function CompanyList()
        {
            $companyList = $this->companyDAO->GetAll();
           
            require_once(VIEWS_PATH."company-list.php");
        }


        public function ShowAddMesaggeView($message = ""){
            echo "<script>alert('$message');</script>"; 
        }

        public function ShowAddViews()
            {                   
                require_once(VIEWS_PATH."offer-addCompany.php");
            }


        public function AddCompany($idCompany,$idJobPosition,$title, $description, $publicationDate, $expirationDate, $workLoad, $salary, $requirements)
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


        public function ShowManageViewCompany()
            {
                $companyList = $this->companyDAO->GetAll();
                $jobOfferList = $this->offerDAO->GetAll();
           
                require_once(VIEWS_PATH."job-manageCompany.php");
            }
         
            public function Updates( $title,$idCompany ,$idJobPosition, $publicationDate, $expirationDate, $workLoad, $salary, $requirements,$description, $id)
            {    
                $this->OfferDAO->updateOffer($title,$idCompany ,$idJobPosition, $publicationDate, $expirationDate, $workLoad, $salary, $requirements,$description, $id);
                $this->ShowManageView();
            } 

    }
?>