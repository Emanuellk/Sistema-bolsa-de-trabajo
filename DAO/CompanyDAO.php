<?php
    namespace DAO;

    use DAO\ICompanyDAO as ICompanyDAO;    
    use Models\Company as Company;
    use \Exception as Exception;

    class CompanyDAO implements ICompanyDAO
    {
        private $connection;
        private $tablename = "companys";

        public function Add(Company $company){
            try{
                $query = "INSERT INTO".$this->tableName."(id, nameCompany, description, createDate, email) VALUES (:id, :nameCompany, :description, :createDate, :email);";
                $parameters["nameCompany"] = $company->getNameCompany();
                $parameters["email"] = $company->getEmail();
                $parameters["createDate"] = $company->getCreateDate();
                $parameters["id"] = $company->getIdCompany();
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

                $query = "SELECT * FROM".$this->tableName;
                $this->connection = Connection::GetInstance();
                $resultSet = $this->Connection->Excute($query);
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
    }
?>
