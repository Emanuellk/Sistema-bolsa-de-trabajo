<?php
    namespace Controllers;
    
    use DAO\UserDAO;
    use DAO\StudentsDAO;
    use DAO\CareerDAO;
    use Models\User;
    use Models\Students;

    class UserController
    {
        private $StudentsDAO;
        private $UserDAO;
        private $CareerDAO;

        public function __construct()
        {
            $this->StudentsDAO = new StudentsDAO();
            $this->UserDAO = new UserDAO();
            $this->CareerDAO = new CareerDAO();

        }

        public function login($email = "", $password = "") {               
                $userAux = $this->UserDAO->SearchUserByEmail($email);
               
                if(!empty($userAux)){
                    
                    $studentAux = $this->StudentsDAO->SearchStudentByEmail($userAux->getEmail());
                    
                    if($userAux->getPassword() == $password && $userAux->getAdmin() == 1)
                    {    
                        $_SESSION['loggedUser'] = $userAux->getEmail();                   
                        require_once(VIEWS_PATH."navAdmin.php");                    
                    }
                    elseif($userAux->getPassword() == $password)
                    
                    {
                        $_SESSION['loggedUser'] = $userAux->getEmail();
                        require_once(VIEWS_PATH."nav.php");
                    }
                    else
                    {                    
                        
                        $this->ShowLoginView("ERROR! USUARIO Y/O password INCORRECTOS");
                        
                    }
                }
                else{                                        
                    $this->ShowLoginView("ERROR! EL USUARIO NO EXISTE UWU ");
                    require_once(VIEWS_PATH."login.php");
                }
            }
            
            public function Logout(){
                session_destroy();
                header('location: /TP_LabIV');
            }

            

            public function registerUser($email,$password) {
                
                   $User = $this->UserDAO->SearchUserByEmail($email);
                    
                    
                    if(empty($User)) {

                        $Student= $this->StudentsDAO->SearchStudentByEmail($email);
                        
                        if(!empty($Student)){
                            $newUser = new User();
                            $newUser->setEmail($email);
                            $newUser->setPassword($password);
                            $this->UserDAO->Add($newUser);
                            
                            $this->ShowLoginView("Registro de Usuario Exitoso!");
                        }
                        else{
                            
                            $this->ShowLoginView("Email incorrecto");
                        }
                    }
                    else {                        
                        $this->ShowLoginView("ERROR! Ya existe una cuenta registrada con ese email!");
                    }
                    require_once(VIEWS_PATH."login.php");
            }
       

            public function ShowLoginView($message = "")
            {   
                 echo "<script>alert('$message');</script>";
                 require_once(VIEWS_PATH."login.php");
                
            }
            public function StudentStatus()
            {   

                $Student= $this->StudentsDAO->SearchStudentByEmail($_SESSION['loggedUser']);
                $Career = $this->CareerDAO->SearchCareerById($Student->getCareerId());
                require_once(VIEWS_PATH."student-view.php");
                
            }
            public static function CheckUserLog() {
                if(!isset($_SESSION['loggedUser']))
                {
                    require_once(VIEWS_PATH."login.php");
                }

               
            }

        
    }

?>