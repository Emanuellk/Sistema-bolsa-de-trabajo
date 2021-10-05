<?php
    namespace Models;

    class Administrator{
        private $emailAdmin;
        private $passwordAdmin;
        
        /**
         * Get the value of emailAdmin
         */ 
        public function getEmailAdmin()
        {
                return $this->emailAdmin;
        }

        /**
         * Set the value of emailAdmin
         *
         * @return  self
         */ 
        public function setEmailAdmin($emailAdmin)
        {
                $this->emailAdmin = $emailAdmin;

                return $this;
        }

        /**
         * Get the value of passwordAdmin
         */ 
        public function getPasswordAdmin()
        {
                return $this->passwordAdmin;
        }

        /**
         * Set the value of passwordAdmin
         *
         * @return  self
         */ 
        public function setPasswordAdmin($passwordAdmin)
        {
                $this->passwordAdmin = $passwordAdmin;

                return $this;
        }
    }

?>