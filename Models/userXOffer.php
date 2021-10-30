<?php
namespace Models;

    class userXOffer{
        private $id;
        private $idUser;
        private $idOffer;
        
        public function __construct($id,$idUser,$idOffer){
            $this->id = $id;
            $this->idUser = $idUser;
            $this->idOffer = $idOffer;    
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
         * Get the value of idUser
         */ 
        public function getIdUser()
        {
                return $this->idUser;
        }

        /**
         * Set the value of idUser
         *
         * @return  self
         */ 
        public function setIdUser($idUser)
        {
                $this->idUser = $idUser;

                return $this;
        }

        /**
         * Get the value of idOffer
         */ 
        public function getIdOffer()
        {
                return $this->idOffer;
        }

        /**
         * Set the value of idOffer
         *
         * @return  self
         */ 
        public function setIdOffer($idOffer)
        {
                $this->idOffer = $idOffer;

                return $this;
        }
    }        
        


