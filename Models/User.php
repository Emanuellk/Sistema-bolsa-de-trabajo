<?php
    namespace Models; 
    
    class user {
        private $id;
        private $email;
        private $password;        
        private $admin;
        
        public function __construct($id = "",$email = '', $password = '', $admin = 0) {
            $this->id = $id;
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

        

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
    }

?>