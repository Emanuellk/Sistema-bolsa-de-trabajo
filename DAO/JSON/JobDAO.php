<?php
    namespace DAO\JSON;
    

    
    use Models\Job;

    class jobDAO 
    {
        private $jobList = array();
        private $fileName;
        
    
        public function __construct()
        {
            $this->fileName = dirname(__DIR__).'/../Data/jobPositions.json';
        }       
       
    
        public function GetAll()
        {
            $this->RetrieveData();
    
            return $this->jobList;
        }

       
        private function RetrieveData()
        {
            $this->jobList = array();
    
            if(file_exists($this->fileName))
            {
                $jsonContent = file_get_contents($this->fileName);
    
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $job = new Job();
                    
                    $job->setJobPositionId($valuesArray["jobPositionId"]);
                    $job->setCareerId($valuesArray["careerId"]);
                    $job->setDescription($valuesArray["description"]);           
                    
                    

                    array_push($this->jobList, $job);
                    
                }

               
            } 
            //}
        } 
        
        public function SearchById($id){
            
            $jobAux = new Job();
            $jobAux = null;
            $this->RetrieveData();

            foreach($this->jobList as $value)
            {
                if($id == $value->getJobPositionId())
                {
                    $jobAux = $value;
                }
            }
            return $jobAux;
                    
            
                    
        }
        
        
    }
?>