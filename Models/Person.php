<?php
    namespace Models;

    class Person{
         private $name;
         private $lastName;
         private $dni;

         /**
          * Get the value of name
          */ 
         public function getName()
         {
                  return $this->name;
         }

         /**
          * Set the value of name
          *
          * @return  self
          */ 
         public function setName($name)
         {
                  $this->name = $name;

                  return $this;
         }

         /**
          * Get the value of lastName
          */ 
         public function getLastName()
         {
                  return $this->lastName;
         }

         /**
          * Set the value of lastName
          *
          * @return  self
          */ 
         public function setLastName($lastName)
         {
                  $this->lastName = $lastName;

                  return $this;
         }

         /**
          * Get the value of dni
          */ 
         public function getDni()
         {
                  return $this->dni;
         }

         /**
          * Set the value of dni
          *
          * @return  self
          */ 
         public function setDni($dni)
         {
                  $this->dni = $dni;

                  return $this;
         }
    }
?>