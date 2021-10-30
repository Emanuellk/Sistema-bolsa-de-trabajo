<?php
    namespace DAO;
    
    use \Exception as Exception;
    use Models\userXOffer;

    class userXOfferDAO{
        private $connection;
        private $tablename = "userxoffers";

        public function Add($userXOffer){
            try{
                $query = "INSERT INTO ". $this->tablename. "(idUser, idOffer) VALUES (:idUser, :idOffer);";
                $parameters["idUser"] = $userXOffer->getIdUser();
                $parameters["idOffer"] = $userXOffer->getIdOffer();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query,$parameters);
            }catch(Exception $ex){
                throw $ex;
            }
        }

        public function GetAll()
        {
            try
            {
                $list = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach($resultSet as $row)
                {                
                    $userXOffer = new UserXOffer($row["id"],$row["idUser"],$row["idOffer"]);

                    array_push($list, $userXOffer);
                }

                return $list;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }


    }
    
?>
        


