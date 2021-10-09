<?php
    namespace Controllers;

    use DAO\UserDAO;
    use DAO\StudentsDAO;
    use Models\User;
    use Models\Students;

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
                $userAux = $this->UserDAO->verifExistenciaUser($email);
               
                if(!empty($userAux)){
                    
                   $studentAux = $this->StudentsDAO->BuscarStudentByEmail($userAux->getEmail());
                    
                    if(!empty($studentAux) && ($userAux->getPassword() == $password))
                    {
                    
                        require_once(VIEWS_PATH."");
                    
                    }
                    else {
                    
                        $_SESSION["Alertmessage"] = "ERROR! USUARIO Y/O password INCORRECTOS";
                        $this->ShowLoginView();
                    }
                }
                else{
                    
                    $_SESSION["Alertmessage"] = "ERROR! EL USUARIO NO EXISTE UWU ";
                    $this->ShowLoginView();
                }
            }
        

            

        public function ShowLoginView()
        {            
            require_once(VIEWS_PATH."login.php");
        }
        
        public function ShowRegisterView()
        {
            require_once(VIEWS_PATH."register.php");
        }

    }

?>