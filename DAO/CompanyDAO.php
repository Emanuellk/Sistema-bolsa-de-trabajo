<?php
    namespace DAO;
    

    use DAO\ICompanyDAO as ICompanyDAO;
    use Models\Company as Company;

    class CompanyDAO implements ICompanyDAO
    {
        private $CompanyList = array();
        private $fileName;
    
        public function __construct()
        {
            $this->fileName = dirname(__DIR__).'/Data/company.json';
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
                $valuesArray["id"] = $company->getIdCompany();

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
                    $company->setIdCompany($valuesArray["id"]);


                    array_push($this->CompanyList, $company);
                }
            }
        }

        //----------Logica para actualizar y eliminar compañias----------

        public function getCompanys(){          

            $jsonContent = file_get_contents($this->fileName);
            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
            return $arrayToDecode;
        }

        function putJson($companys)
        {
            file_put_contents(__DIR__ . '/Data/company.json', json_encode($companys, JSON_PRETTY_PRINT));
        }

        function getCompanyById($id){
            $this->RetrieveData();
            foreach($this->CompanyList as $company){
                if($company->getIdCompany() == $id){
                    return $company;
                }
            }
            return null;
        }
        
        function createCompany($name,$email,$date)
        {
            $company = new Company();

            $company->setIdCompany(rand(1000000, 2000000));
            $company->setNameCompany($name);
            $company->setEmail($email);
            $company->setCreateDate($date);
            
            return $company;
        }

        function updateCompany($name,$email,$date,$id){
            $this->RetrieveData();
            
            foreach($this->CompanyList as $company){
                if($company->getIdCompany() == $id){
                    
                    $company->setNameCompany($name);
                    $company->setEmail($email);
                    $company->setCreateDate($date);
                }
            }

            
            $this->SaveData();
        }
        
        function deleteCompany($id)
        {
            $this->RetrieveData();
            $NewList = array();
            foreach ($this->CompanyList as $company) {
                if ($company->getIdCompany() != $id) {
                   
                    array_push($NewList, $company);

                    
                   
                }
            }
            $this->CompanyList = $NewList;
            $this->SaveData();
        }

     
    }
?>
