<?php
namespace Models;

class Career{
       
       private $id;
       private $description;        
       private $active;
       public function __construct( $id = '', $description = '', $active = '') {
           
           $this->id = $id;
           $this->description = $description;            
           $this->active = $active;
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
        */
       public function setId($id): self
       {
              $this->id = $id;

              return $this;
       }

       /**
        * Get the value of description
        */
       public function getDescription()
       {
              return $this->description;
       }

       /**
        * Set the value of description
        */
       public function setDescription($description): self
       {
              $this->description = $description;

              return $this;
       }

       /**
        * Get the value of active
        */
       public function getActive()
       {
              return $this->active;
       }

       /**
        * Set the value of active
        */
       public function setActive($active): self
       {
              $this->active = $active;

              return $this;
       }
}

?>