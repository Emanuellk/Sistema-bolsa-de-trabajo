<?php
    namespace DAO;

    use \Exception as Exception;   
    use Models\User as User;    
    use DAO\Connection as Connection;
    

    class UserDAO 
    {
        private $connection;
        private $tableName = "users";

        public function Add(User $user)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (email, password, admin) VALUES (:email, :password, :admin);";
                
                $parameters["email"] = $user->getEmail();
                $parameters["password"] = $user->getPassword();
                $parameters["admin"] = $user->getAdmin();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll()
        {
            try
            {
                $userList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $user = new User();
                    
                    $user->setId($row["id"]);
                    $user->setEmail($row["email"]);
                    $user->setPassword($row["password"]);
                    $user->setAdmin($row["admin"]);

                    array_push($userList, $user);
                }

                return $userList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function SearchUserByEmail($userEmail) {
           
            try{
            
            $query = "SELECT * FROM `".$this->tableName."` WHERE email='$userEmail'";
            $this->connection = Connection::GetInstance();            
            $resultSet = $this->connection->Execute($query);
            
            $UserAux = NULL;
            
            if(!empty($resultSet[0]))
            {
                
                $UserAux = new User($resultSet[0]['id'],$resultSet[0]['email'],$resultSet[0]['password'],$resultSet[0]['admin']); 
                    
            
            }
            
             return $UserAux;           
            
            
            } 
            catch(Exception $ex)
            {
                throw $ex;
            } 
        }


        public function SearchById($id)
        {
            try{
               
                $query = "SELECT * FROM `".$this->tableName."` WHERE id='$id'";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
              

                $resultSet = $this->connection->Execute($query);
            
                $UserAux = NULL;
                
                if(!empty($resultSet[0]))
                {
                    
                    $UserAux = new User($resultSet[0]['id'],$resultSet[0]['email'],$resultSet[0]['password'],$resultSet[0]['admin']); 
                         
                    
                }
                
                 return $UserAux;           
                
                
                } 
                catch(Exception $ex)
                {
                    throw $ex;
                } 
        }

        
        function modify($admin,$password,$id){
            try
            {
                $query = "UPDATE ".$this->tableName." SET admin=:admin, password=:password where id =:id";
                
                $parameters["id"] = $id;
                $parameters["password"] = $password;
                $parameters["admin"] = $admin;  


                $this->connection = Connection::GetInstance();
                    
                $this->connection->ExecuteNonQuery($query, $parameters);
            
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
           
        } 

        
        function modifyPassword($password,$id){
            try{
                $query = "UPDATE ".$this->tableName." SET password=:password where id =:id";

                $parameters["id"] = $id;
                $parameters["password"] = $password;

                $this->connection = Connection::GetInstance();
                    
                $this->connection->ExecuteNonQuery($query, $parameters);
            }catch(Exception $ex){
                throw $ex;
            }
        }

        function deleteUser($id){
            try{
                $query = "DELETE FROM ". $this->tableName." WHERE id= :id";

                $parameters["id"] = $id;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            }
            catch(Exception $ex){
                throw $ex;
            }
         }


    }
?>