<?php
    namespace DAO;
    

    
    use Models\Job;

    class jobDAO 
    {
        private $jobList = array();
        
    
        public function __construct()
        {
            
        }       
       
    
        public function GetAll()
        {
            $this->RetrieveData();
    
            return $this->jobList;
        }

       
        private function RetrieveData()
        {
            $this->jobList = array();
    
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
                
                  $jsonContent = file_get_contents("https://utn-students-api.herokuapp.com/api/JobPosition/", false, $ctx);
                  
                  $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                  

                foreach($arrayToDecode as $valuesArray)
                {
                    $job = new Job();
                    
                    $job->setJobId($valuesArray["jobPositionId"]);
                    $job->setCareerId($valuesArray["carrerId"]);
                    $job->setDescription($valuesArray["description"]);           
                    
                    

                    array_push($this->jobList, $job);
                    
                }

               
                
            //}
        } 
        
        public function SearchById($id){
            
            $jobAux = new Job();
            $jobAux = null;
            $this->RetrieveData();

            foreach($this->jobList as $value)
            {
                if($id == $value->getId())
                {
                    $jobAux = $value;
                }
            }
            return $jobAux;
                    
            
                    
        }
        
        
    }
?>
 
        