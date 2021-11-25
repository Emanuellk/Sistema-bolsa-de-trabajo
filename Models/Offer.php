<?php
namespace Models;

    class Offer {
        private $id;
        private $idCompany;
        private $idJobPosition;
        private $title;
        private $description;
        private $publicationDate;
        private $expirationDate;
        private $workLoad;
        private $salary;
        private $requirements;
        private $image;
        
        public function __construct($id = '',$idCompany = '',$idJobPosition = '',  $title = '', $description = '', $publicationDate = '', $expirationDate = '', $workLoad = '', $salary= '', $requirements = '',$image = '') {
                $this->id = $id;
                $this->idCompany = $idCompany; 
                $this->idJobPosition= $idJobPosition;
                $this->title = $title;
                $this->description = $description;
                $this->publicationDate=$publicationDate;
                $this->expirationDate=$expirationDate;
                $this->workLoad=$workLoad;
                $this->salary=$salary;
                $this->requirements=$requirements;
                $this->image=$image;
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

        /**
         * Get the value of idCompany
         */ 
        public function getIdCompany()
        {
                return $this->idCompany;
        }

        /**
         * Set the value of idCompany
         *
         * @return  self
         */ 
        public function setIdCompany($idCompany)
        {
                $this->idCompany = $idCompany;

                return $this;
        }

        /**
         * Get the value of idJobPosition
         */ 
        public function getIdJobPosition()
        {
                return $this->idJobPosition;
        }

        /**
         * Set the value of idJobPosition
         *
         * @return  self
         */ 
        public function setIdJobPosition($idJobPosition)
        {
                $this->idJobPosition = $idJobPosition;

                return $this;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

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
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of publicationDate
         */ 
        public function getPublicationDate()
        {
                return $this->publicationDate;
        }

        /**
         * Set the value of publicationDate
         *
         * @return  self
         */ 
        public function setPublicationDate($publicationDate)
        {
                $this->publicationDate = $publicationDate;

                return $this;
        }

        /**
         * Get the value of expirationDate
         */ 
        public function getExpirationDate()
        {
                return $this->expirationDate;
        }

        /**
         * Set the value of expirationDate
         *
         * @return  self
         */ 
        public function setExpirationDate($expirationDate)
        {
                $this->expirationDate = $expirationDate;

                return $this;
        }

        /**
         * Get the value of workLoad
         */ 
        public function getWorkLoad()
        {
                return $this->workLoad;
        }

        /**
         * Set the value of workLoad
         *
         * @return  self
         */ 
        public function setWorkLoad($workLoad)
        {
                $this->workLoad = $workLoad;

                return $this;
        }

        /**
         * Get the value of salary
         */ 
        public function getSalary()
        {
                return $this->salary;
        }

        /**
         * Set the value of salary
         *
         * @return  self
         */ 
        public function setSalary($salary)
        {
                $this->salary = $salary;

                return $this;
        }

        /**
         * Get the value of requirements
         */ 
        public function getRequirements()
        {
                return $this->requirements;
        }

        /**
         * Set the value of requirements
         *
         * @return  self
         */ 
        public function setRequirements($requirements)
        {
                $this->requirements = $requirements;

                return $this;
        }

        /**
         * Get the value of image
         */ 
        public function getImage()
        {
                return $this->image;
        }

        /**
         * Set the value of image
         *
         * @return  self
         */ 
        public function setImage($image)
        {
                $this->image = $image;

                return $this;
        }
    }

?>