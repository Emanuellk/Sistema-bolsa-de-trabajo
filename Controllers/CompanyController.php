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

        public function ShowListView()
        {
            $companyList = $this->companyDAO->GetAll();

            require_once(VIEWS_PATH."company-list.php");
        }

        public function Add($nameCompany, $email, $createDate)
        {
            $company = new Company();
            $company->setNameCompany($nameCompany);
            $company->setEmail($email);
            $company->setCreateDate($createDate);

            $this->companyDAO->Add($company);

            $this->ShowAddView();
        }
    }
?>