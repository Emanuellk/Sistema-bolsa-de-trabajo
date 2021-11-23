<?php
    namespace DAO\JSON;
    

    
    use Models\Career;

    class CareerDAO 
    {
        private $CareerList = array();
        private $fileName;
        
    
        public function __construct()
        {
            $this->fileName = dirname(__DIR__).'/../Data/careers.json';
        }
        
       
    
        public function GetAll()
        {
            $this->RetrieveData();
    
            return $this->CareerList;
        }

        

        private function RetrieveData()
        {
            $this->CareerList = array();
    
            if(file_exists($this->fileName))
            {
                $jsonContent = file_get_contents($this->fileName);
    
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                  
                foreach($arrayToDecode as $valuesArray)
                {
                    $Career = new Career();
                    
                    $Career->setId($valuesArray["careerId"]);
                    $Career->setDescription($valuesArray["description"]);
                    $Career->setActive($valuesArray["active"]);
                    array_push($this->CareerList, $Career);
                    
                }
            }
                   
                    
        }

               
                
            //}
         
        
        public function SearchCareerById($id){
           
            $CareerAux = new Career();
            $CareerAux = null;
            $this->RetrieveData();

            foreach($this->CareerList as $value)
            {
                if($id == $value->getId())
                {
                    $CareerAux = $value;
                }
            }
            return $CareerAux;
                    
            
                    
        }
        
        
    }
?>