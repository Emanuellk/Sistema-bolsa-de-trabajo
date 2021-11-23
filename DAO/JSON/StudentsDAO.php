<?php
    namespace DAO\JSON;
    
    use Models\Students;

    class StudentsDAO 
    {
        private $StudentsList = array();
        private $fileName;
        
    
        public function __construct(){
            $this->fileName = dirname(__DIR__).'/../Data/student.json';
        }       
       
    
        public function GetAll()
        {
            $this->RetrieveData();
    
            return $this->StudentsList;
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

               
            } 
            //}
        } 
        
        public function SearchStudentByEmail($studentEmail){
            
            $studentsAux = new Students();
            $studentsAux = null;
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