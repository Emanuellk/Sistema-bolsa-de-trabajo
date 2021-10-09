<?php
    namespace DAO;
    require_once "__DIR__/../Config/Autoload.php";

    use DAO\ICompanyDAO as ICompanyDAO;
    use Models\Company as Company;

    class CompanyDAO implements ICompanyDAO
    {
        private $CompanyList = array();
        private $fileName;
    
        public function __construct()
        {
            $this->fileName = dirname(__DIR__)."/Data/company.json";
        }
        
        public function Add($company)
        {
            $this->RetrieveData();
            
            array_push($this->CompanyList, $company);
     
            $this->SaveData();
        }
    
        public function GetAll()
        {
            $this->RetrieveData();
    
            return $this->CompanyList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();
    
            foreach($this->CompanyList as $company)
            {
                $valuesArray["nameCompany"] = $company->getNameCompany();
                $valuesArray["email"] = $company->getEmail();
                $valuesArray["createDate"] = $company->getCreateDate();

                array_push($arrayToEncode, $valuesArray);
            }
    
            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData()
        {
            $this->CompanyList = array();
    
            if(file_exists($this->fileName))
            {
                $jsonContent = file_get_contents($this->fileName);
    
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
    
                foreach($arrayToDecode as $valuesArray)
                {
                    $company = new Company();

                    $company->setNameCompany($valuesArray["nameCompany"]);
                    $company->setEmail($valuesArray["email"]);
                    $company->setCreateDate($valuesArray["createDate"]);

                    array_push($this->CompanyList, $company);
                }
            }
        }
    }
?>