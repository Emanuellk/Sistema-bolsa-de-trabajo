<?php
    namespace DAO;
    require_once "__DIR__/../Config/Autoload.php";

    use DAO\IAdministratorDAO as IAdministratorDAO;
    use Models\Administrator as Administrator;

    class AdministratorDAO implements IAdministratorDAO
    {
        private $AdministratorList = array();
        private $fileName;
    
        public function __construct()
        {
            $this->fileName = dirname(__DIR__)."/Data/administator.json";
        }
        
        public function Add($administrator)
        {
            $this->RetrieveData();
            
            array_push($this->AdministratorDAO, $administrator);
     
            $this->SaveData();
        }
    
        public function GetAll()
        {
            $this->RetrieveData();
    
            return $this->administratorList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();
    
            foreach($this->AdministratorDAO as $administrator)
            {
                $valuesArray["emailAdmin"] = $administrator->getEmailAdmin();
                $valuesArray["passwordAdmin"] = $administrator->getPasswordAdmin();
    
                array_push($arrayToEncode, $valuesArray);
            }
    
            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData()
        {
            $this->AdministratorList = array();
    
            if(file_exists($this->fileName))
            {
                $jsonContent = file_get_contents($this->fileName);
    
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
    
                foreach($arrayToDecode as $valuesArray)
                {
                    $administrator = new Administrator();
    
                    $administrator->setEmailAdmin($valuesArray["emailAdmin"]);
                    $administrator->setPasswordAdmin($valuesArray["passwordAdmin"]);

                    array_push($this->administratorList, $administrator);
                }
            }
        }
    }
?>