<?php
    namespace Models; 
    
    class user {
        private $idAlumno;
        private $email;
        private $password;
        private $name;
        private $admin;
        
        public function __construct($idAlumno = '', $email = '', $password = '', $name = '', $admin = 0) {
            $this->idAlumno = $idAlumno;
            $this->email = $email;
            $this->password = $password;
            $this->name = $name;
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

            public function getName()
            {
                return $this->name;
            }

            public function setName($name)
            {
                $this->name = $name;
            }

        public function getidAlumno()
        {
            return $this->idAlumno;
        }

        public function setidAlumno($idAlumno)
        {
            $this->idAlumno = $idAlumno;
        }
    }

?>