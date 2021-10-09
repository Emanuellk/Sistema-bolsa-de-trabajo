<?php
    namespace DAO;
    use Models\User;

   class UserDAO 
   {
       private $userList = array();
       private $fileName;
   
       public function __construct()
       {
           $this->fileName= dirname(__DIR__)."/data/User.json";        
       }
   
   
        public function Add(User $User)
        { 
            $this->RetrieveData();
            array_push($this->userList,$User);
            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();
            return $this->userList;
        }

        private function SaveData() {
            $arrayToEncode = array();
        
            foreach($this->userList as $user)
            {
                $valuesArray['email'] = $user->getEmail();
                $valuesArray['password'] = $user->getPassword();
                $valuesArray['admin'] = $user->getAdmin();

                array_push($arrayToEncode, $valuesArray);
            }
            $jsonContent = json_encode($arrayToEncode,JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }
    
    
        private function RetrieveData() {
            $this->userList = array();
            if(file_exists($this->fileName))
            {
                $jsonContent = file_get_contents($this->fileName);
                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
                
                foreach($arrayToDecode as $valuesArray) {
                    $user = new User($valuesArray['email'],$valuesArray['password'],$valuesArray['admin']);
                    
                    array_push($this->userList, $user);
                   
                }
            }
        }

        public function SearchUserByEmail($userEmail) {
            $UserAux = new User();
            $this->RetrieveData();
           
            foreach($this->userList as $value)
            {
                if($userEmail == $value->getEmail())
                {
                    $UserAux = $value;
                }
                
            }
            return $UserAux;  
        }
        

    }

?>