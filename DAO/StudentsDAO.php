<?php
    namespace DAO;
    

    
    use Models\Students;

    class StudentsDAO 
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
    
            //if(file_exists($this->fileName))
            //{
                //$jsonContent = file_get_contents($this->fileName);
    
                //$arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                

                $opt = array(
                    "http" => array(
                      "method" => "GET",
                      "header" => "x-api-key: 4f3bceed-50ba-4461-a910-518598664c08\r\n"
                    )
                  );
                
                  $ctx = stream_context_create($opt);
                
                  $jsonContent = file_get_contents("https://utn-students-api.herokuapp.com/api/Student", false, $ctx);
                  
                  $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                  

                foreach($arrayToDecode as $valuesArray)
                {
                    $students = new Students();
                    
                    $students->setStudentId($valuesArray["studentId"]);
                    $students->setCareerId($valuesArray["careerId"]);
                    $students->setFirstName($valuesArray["firstName"]);
                    $students->setLastName($valuesArray["lastName"]);
                    $students->setDni($valuesArray["dni"]);
                    $students->setFileNumber($valuesArray["fileNumber"]);
                    
                    $students->setGender($valuesArray["gender"]);
                    $students->setBirthDate($valuesArray["birthDate"]);
                    $students->setEmail($valuesArray["email"]);
                    $students->setPhoneNumber($valuesArray["phoneNumber"]);
                    $students->setActive($valuesArray["active"]);
                    
                    

                    array_push($this->StudentsList, $students);
                    
                }

               
                
            //}
        } 
        
        public function SearchStudentByEmail($studentEmail){
            
            $studentsAux = new Students();
            $this->RetrieveData();

            foreach($this->StudentsList as $value)
            {
                if($studentEmail == $value->getEmail())
                {
                    $studentsAux = $value;
                }
            }
            return $studentsAux;
                    
            
                    
        }
        
        
    }
?>
 
        