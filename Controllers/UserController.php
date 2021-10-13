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

        public function login($email = "", $password = "") {               
                $userAux = $this->UserDAO->SearchUserByEmail($email);
               
                if(!empty($userAux)){
                    
                    $studentAux = $this->StudentsDAO->SearchStudentByEmail($userAux->getEmail());
                    
                    if($userAux->getPassword() == $password && $userAux->getAdmin() == 1)
                    {                        
                        require_once(VIEWS_PATH."login.php");                    
                    }
                    elseif($userAux->getPassword() == $password)
                    
                    {
                        require_once(VIEWS_PATH."company-add.php");
                    }
                    else
                    {                    
                        
                        $this->ShowLoginView("ERROR! USUARIO Y/O password INCORRECTOS");
                        
                    }
                }
                else{                                        
                    $this->ShowLoginView("ERROR! EL USUARIO NO EXISTE UWU ");
                }
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
            }      

             public function ShowLoginView($message = "")
             {   
                     
                 require_once(VIEWS_PATH."login.php");
             }
        
    }

?>