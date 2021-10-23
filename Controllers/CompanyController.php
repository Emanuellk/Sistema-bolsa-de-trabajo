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
        
        public function ShowAddMesaggeView($message = ""){
            echo "<script>alert('$message');</script>"; 
        }

        public function ShowManageView()
        {
            $companyList = $this->companyDAO->GetAll();
           
            require_once(VIEWS_PATH."company-manage.php");
        }

        public function Add($nameCompany, $email, $createDate)
        {
            $companyAux = NULL;
            $companyAux = $this->companyDAO->SearchNameCompany($nameCompany);
            if($companyAux == NULL){
                $company = $this->companyDAO->createCompany($nameCompany,$email,$createDate);
                $this->companyDAO->Add($company);
                $this->ShowAddMesaggeView("Registro de empresa exitoso");
            }else{
                $this->ShowAddMesaggeView("ERROR! Ya existe una empresa con ese nombre!");

            }
            $this->ShowAddView();
        }


        public function Delete($id){
            
            $this->companyDAO->deleteCompany($id);
            $this->ShowManageView();
        }


        public function Update($nameCompany, $email, $createDate, $id){
            
            $this->companyDAO->updateCompany($nameCompany, $email, $createDate, $id);
            $this->ShowManageView();
        }   
        public function CompanyList()
        {
            $companyList = $this->companyDAO->GetAll();
           
            require_once(VIEWS_PATH."company-list.php");
        }


    }
?>