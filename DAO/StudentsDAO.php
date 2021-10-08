<?php
    namespace DAO;
    require_once "__DIR__/../Config/Autoload.php";

    use DAO\CompanyDAO as ICompanyDAO;
    use Models\Students as Students;

    class StudentsDAO implements ICompanyDAO
    {
        private $StudentsList = array();
        private $fileName;
    
        public function __construct()
        {
            $this->fileName = dirname(__DIR__)."/Data/students.json";
        }
        
        public function Add($students)
        {
            $this->RetrieveData();
            
            array_push($this->StudentsDAO, $students);
     
            $this->SaveData();
        }
    
        public function GetAll()
        {
            $this->RetrieveData();
    
            return $this->StudentsList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();
    
            foreach($this->StudentsDAO as $students)
            {
                $valuesArray["career"] = $students->geCareer();
                $valuesArray["phoneNumber"] = $students->getPhoneNumber();
                $valuesArray["birthdayDate"] = $students->getBirthdayDate();
                $valuesArray["email"] = $students->getEmail();
                $valuesArray["password"] = $students->getPassword();
                $valuesArray["name"] = $students->getName();
                $valuesArray["lastName"] = $students->getLastName();
                $valuesArray["dni"] = $students->getDni();
    
    
                array_push($arrayToEncode, $valuesArray);
            }
    
            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents($this->fileName, $jsonContent);
        }

        private function RetrieveData()
        {
            $this->StudentsList = array();
    
            if(file_exists($this->fileName))
            {
                $jsonContent = file_get_contents($this->fileName);
    
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
    
                foreach($arrayToDecode as $valuesArray)
                {
                    $students = new Students();
    
                    $students->setCareer($valuesArray["career"]);
                    $students->setPhoneNumber($valuesArray["phoneNumber"]);
                    $students->setBirthdayDate($valuesArray["birthdayDate"]);
                    $students->setEmail($valuesArray["email"]);
                    $students->setPassword($valuesArray["password"]);
                    $students->setName($valuesArray["name"]);
                    $students->setLastName($valuesArray["lastName"]);
                    $students->setDni($valuesArray["dni"]);

                    array_push($this->StudentsList, $students);
                }
            }
        }
    }
?>