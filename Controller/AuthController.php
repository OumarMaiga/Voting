<?php 

    namespace Controller;

    use Model\Auth;
    use Model\User;

    class AuthController {
        
        private $auth;
        
        public function __construct() {
            $this->auth = new Auth;
        }

        public function login() {
            require('View/auth/login.php');
        }

        public function sign_in() {
            if((isset($_POST['login']) && $_POST['login'] != "") && (isset($_POST['password']) && $_POST['password'] != "")) {
                
                $inputs = array("login" => $_POST['login'], "password" => $_POST['password']);
                $request = $this->auth->authenticate($inputs);
                $request->execute();
                
                $previous = "javascript:history.go(-1)";
                if(isset($_SERVER['HTTP_REFERER'])) {
                    $previous = $_SERVER['HTTP_REFERER'];
                }

                if($data = $request->fetch()) {
                    
                    $_SESSION['user'] = $data;

                    header('location:index.php?action=accueil');
                    exit;
                
                } else {
                    //$url = preg_replace('/msg=*/', 'msg=login_not_found', $previous);
                    header('location:index.php?action=login&msg=login_not_found');
                    exit;
                }
            } else {
                header('location:index.php?action=login&msg=field_required');
                exit;
            }
        }
        
        public function logout() {
            session_unset();
            header('location:index.php?action=accueil&msg=logout');
            exit;
        }
        
    }