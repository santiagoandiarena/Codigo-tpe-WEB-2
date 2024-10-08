<?php
require_once './app/models/usuario.model.php';
require_once './app/views/auth.view.php';

class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UsuarioModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        // Muestro el formulario de login
        return $this->view->showLogin();
    }

    public function login() {
        if (!isset($_POST['nombreUsuario']) || empty($_POST['nombreUsuario'])) {
            return $this->view->showLogin('Falta completar el Nombre de Usuario');
        }
    
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }
    
        $nombreUsuario = $_POST['nombreUsuario'];
        $password = $_POST['password'];
    
        // Verificar que el usuario está en la base de datos
        $userFromDB = $this->model->getUserByName($nombreUsuario);

        // password: 123456
        // $userFromDB->password: $2y$10$xQop0wF1YJ/dKhZcWDqHceUM96S04u73zGeJtU80a1GmM.H5H0EHC
        if(password_verify($password, $userFromDB->contraseña)){
            // Guardo en la sesión el ID del usuario
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->ID_usuario;
            $_SESSION['NAME_USER'] = $userFromDB->nombreUsuario;
            $_SESSION['LAST_ACTIVITY'] = time();
    
            // Redirijo al home
            header('Location: ' . BASE_URL);
        } else {
            return $this->view->showLogin('Datos de inicio de sesión incorrectos');

        }
    }

    public function logout() {
        session_start(); 
        session_destroy(); 
        header('Location: ' . BASE_URL);
    }


}


