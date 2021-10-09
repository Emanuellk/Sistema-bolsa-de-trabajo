<?php
    namespace Controllers;

    use DAO\UserDAO;
    use DAO\StudentsDAO;
    
    
    
    class UserController
    {
        private $StudentsDAO;
        private $UserDAO;

        public function __construct()
        {
            $this->StudentsDAO = new StudentsDAO();
            $this->UserDAO = new UserDAO();
        }

        public function loguear($email = "", $password = "") {
            require_once(VIEWS_PATH."login.php");
                $userAux = $this->UserDAO->verifExistenciaUser($email);
          
                if(!empty($userAux) && ($userAux -> getPassword() == $password))
                {
                
                require_once(VIEWS_PATH."");
                
                }
                else {
                
                    $_SESSION["Alertmessage"] = "ERROR! USUARIO Y/O password INCORRECTOS";
                    $this->ShowLoginView();
                }
           
        }

            

        public function ShowLoginView()
        {            
            require_once(VIEWS_PATH."login.php");
        }
        
        public function ShowRegisterView()
        {
            require_once(VIEWS_PATH."login.php");
        }

 
    }

?>