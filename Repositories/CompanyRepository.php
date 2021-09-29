<?php
    namespace Repositories;
    require_once "__DIR__/../Config/Autoload.php";

    use Repositories\IRepository as IRepository;
    use Models\Company as Company;

class CompanyRepository implements IRepository
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
            
            array_push($this->CompanyRepository, $company);
     
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
    
            foreach($this->CompanyRepository as $company)
            {
                $valuesArray["companyId"] = $company->getCompanyId();
                $valuesArray["nameCompany"] = $company->getNameCompany();
                $valuesArray["password"] = $company->getPassword();
    
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
    
                    $company->setCompanyId($valuesArray["companyId"]);
                    $company->setNameCompany($valuesArray["nameCompany"]);
                    $company->setPassword($valuesArray["password"]);

                    array_push($this->CompanyList, $company);
                }
            }
        }
    }
?>