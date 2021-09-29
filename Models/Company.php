<?php
    namespace Models;

    class Company{
         private $companyId;
         private $nameCompany;
         private $password;

         /**
          * Get the value of companyId
          */ 
         public function getCompanyId()
         {
                  return $this->companyId;
         }

         /**
          * Set the value of companyId
          *
          * @return  self
          */ 
         public function setCompanyId($companyId)
         {
                  $this->companyId = $companyId;

                  return $this;
         }

         /**
          * Get the value of nameCompany
          */ 
         public function getnameCompany()
         {
                  return $this->nameCompany;
         }

         /**
          * Set the value of nameCompany
          *
          * @return  self
          */ 
         public function setnameCompany($nameCompany)
         {
                  $this->nameCompany = $nameCompany;

                  return $this;
         }

         /**
          * Get the value of password
          */ 
         public function getPassword()
         {
                  return $this->password;
         }

         /**
          * Set the value of password
          *
          * @return  self
          */ 
         public function setPassword($password)
         {
                  $this->password = $password;

                  return $this;
         }
    }
?>