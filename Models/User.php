<?php
    namespace Models; 
    
    class user {
       
        private $email;
        private $password;        
        private $admin;
        
        public function __construct( $email = '', $password = '', $admin = 0) {
            
            $this->email = $email;
            $this->password = $password;            
            $this->admin = $admin;
        }


        public function getEmail()
        {
            return $this->email;
        }

       
        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getPassword()
        {
            return $this->password;
        }

       
        public function setPassword($password)
        {
            $this->password = $password;
        }

       
        public function getAdmin()
        {
            return $this->admin;
        }


        public function setAdmin($admin)
        {
            $this->admin = $admin;
        }

        
    }

?>