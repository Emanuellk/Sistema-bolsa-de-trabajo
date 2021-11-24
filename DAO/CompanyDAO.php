<?php
    namespace DAO;

    use \Exception as Exception;   
    use Models\Company as Company;    
    use Models\User as User;
    use DAO\Connection as Connection;

    class CompanyDAO 
    {
        private $connection;
        private $tableName = "companys";

        public function Add(Company $company){
            try{
                $query = "INSERT INTO ".$this->tableName."(nameCompany, description, createDate, email) VALUES (:nameCompany, :description, :createDate, :email);";
                $parameters["nameCompany"] = $company->getNameCompany();
                $parameters["email"] = $company->getEmail();
                $parameters["createDate"] = $company->getCreateDate();
                $parameters["description"] = $company->getDescription();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query,$parameters);
            }
            catch(Exception $ex){
                throw $ex;
            }
        }

        public function GetAll(){
            try{
                $companyList = array();

                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                foreach($resultSet as $row)
                {

                    $company = new Company();
                    $company->setNameCompany($row["nameCompany"]);
                    $company->setEmail($row["email"]);
                    $company->setCreateDate($row["createDate"]);
                    $company->setIdCompany($row["id"]);
                    $company->setDescription($row["description"]);
                    
                    array_push($companyList,$company);
                }

                return $companyList;
            }catch(Exception $ex){
                throw $ex;
            }
        }


        public function SearchCompanyByEmail($companyEmail) {
           
           
            try{
            
                $query = "SELECT * FROM `".$this->tableName."` WHERE email='$companyEmail'";
                $this->connection = Connection::GetInstance();            
                $resultSet = $this->connection->Execute($query);
                
                $CompanyAux = NULL;
                
                if(!empty($resultSet[0]))
                {
                    
                   $CompanyAux = new Company($resultSet[0]['id'],$resultSet[0]['nameCompany'],$resultSet[0]['email'],$resultSet[0]['createDate']); 
                        
                }
                
                 return $CompanyAux;           
                
                
                } 
                catch(Exception $ex)
                {
                    throw $ex;
                } 
        }
        


        public function SearchById($id) {

            try{
                $query = "SELECT * FROM `".$this->tableName."` WHERE id='$id'";
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);

                $CompanyAux = NULL;
                
                if(!empty($resultSet[0]))
                {        
                    $CompanyAux = new Company($resultSet[0]['id'],$resultSet[0]['nameCompany'],$resultSet[0]['email'],$resultSet[0]['createDate'],$resultSet[0]['description']);       
                }
                
                return $CompanyAux;

            }catch(Exception $ex){
                throw $ex;
            }
        }

        function createCompany($name,$email,$date,$description)
        {
            $company = new Company();
            
            $company->setNameCompany($name);
            $company->setEmail($email);
            $company->setCreateDate($date);
            $company->setDescription($description);
            return $company;
        }

        

        function deleteCompany($id){
            try{
                $query = "DELETE FROM `". $this->tableName."` WHERE id= :id";

                $parameters["id"] = $id;

                $this->connection = Connection::GetInstance();
                
                $this->connection->ExecuteNonQuery($query, $parameters);

            }
            catch(Exception $ex){
                throw $ex;
            }
         }
        

        function updateCompany($name,$email,$date,$description,$id){
            try
            {
                $query = "UPDATE ".$this->tableName." SET nameCompany=:nameCompany,email=:email,createDate=:createDate,description=:description where id =:id";
                
                $parameters["id"] = $id;
                $parameters["nameCompany"] = $name;
                $parameters["email"] = $email;
                $parameters["createDate"] = $date;
                $parameters["description"] = $description;
                
                $this->connection = Connection::GetInstance();
                    
                $this->connection->ExecuteNonQuery($query, $parameters);
            
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
           
        }   
    }
?>
