<?php
    namespace Models;

    class Company extends Person{
         private $career;
         private $phoneNumber;
         private $birthdayDate;
         private $email;
         private $password;

         /**
          * Get the value of career
          */ 
         public function getCareer()
         {
                  return $this->career;
         }

         /**
          * Set the value of career
          *
          * @return  self
          */ 
         public function setCareer($career)
         {
                  $this->career = $career;

                  return $this;
         }

         /**
          * Get the value of phoneNumber
          */ 
         public function getPhoneNumber()
         {
                  return $this->phoneNumber;
         }

         /**
          * Set the value of phoneNumber
          *
          * @return  self
          */ 
         public function setPhoneNumber($phoneNumber)
         {
                  $this->phoneNumber = $phoneNumber;

                  return $this;
         }

         /**
          * Get the value of birthdayDate
          */ 
         public function getBirthdayDate()
         {
                  return $this->birthdayDate;
         }

         /**
          * Set the value of birthdayDate
          *
          * @return  self
          */ 
         public function setBirthdayDate($birthdayDate)
         {
                  $this->birthdayDate = $birthdayDate;

                  return $this;
         }

         /**
          * Get the value of email
          */ 
         public function getEmail()
         {
                  return $this->email;
         }

         /**
          * Set the value of email
          *
          * @return  self
          */ 
         public function setEmail($email)
         {
                  $this->email = $email;

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