<?php
    namespace Controllers;

    use DAO\CompanyDAO as CompanyDAO;
    use Models\Company as Company;

    class CompanyController
    {
        private $companyDAO;

        public function __construct()
        {
            $this->companyDAO = new CompanyDAO();
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

    }
?>