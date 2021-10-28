<?php
    namespace DAO;
    

    
    use Models\Career;

    class CareerDAO 
    {
        private $CareerList = array();
        
    
        public function __construct()
        {
           
        }
        
       
    
        public function GetAll()
        {
            $this->RetrieveData();
    
            return $this->CareerList;
        }

        

        private function RetrieveData()
        {
            $this->CareerList = array();
    
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
                
                  $jsonContent = file_get_contents("https://utn-students-api.herokuapp.com/api/Career", false, $ctx);
                  
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
 
        