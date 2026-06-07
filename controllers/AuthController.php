<?php
declare(strict_types=1);
require_once __DIR__ . '/../models/UsuarioRepository.php';

class AuthController {

    public function mostrarLogin(string $error = ''): void {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function procesarLogin(): void {
        if (isset($_SESSION['bloqueo_hasta']) && time() < $_SESSION['bloqueo_hasta']) {
            $this->mostrarLogin('Demasiados intentos. Intenta más tarde.');
            return;
        }

        if (isset($_SESSION['bloqueo_hasta']) && time() >= $_SESSION['bloqueo_hasta']) {
            $_SESSION['intentos']      = 0;
            $_SESSION['bloqueo_hasta'] = null;
        }

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($username === '' || $password === '') {
            $this->mostrarLogin('Completa usuario y contraseña.');
            return;
        }

        $repo    = new UsuarioRepository();
        $usuario = $repo->buscarPorUsername($username);

        if ($usuario === null || !$usuario->verificarPassword($password)) {
            $_SESSION['intentos'] = ($_SESSION['intentos'] ?? 0) + 1;

            if ($_SESSION['intentos'] >= 3) {
                $_SESSION['bloqueo_hasta'] = time() + 60;
                $this->mostrarLogin('Demasiados intentos. Intenta más tarde.');
                return;
            }

            $restantes = 3 - $_SESSION['intentos'];
            $this->mostrarLogin("Usuario o contraseña incorrectos. Intentos restantes: {$restantes}.");
            return;
        }

        $repo->registrarAcceso($usuario->getId());

        $_SESSION['intentos']      = 0;
        $_SESSION['bloqueo_hasta'] = null;
        $_SESSION['usuario'] = [
            'id'            => $usuario->getId(),
            'username'      => $usuario->getUsername(),
            'nombre'        => $usuario->getNombreCompleto(),
            'rol'           => $usuario->getRol(),
            'tienda'        => $usuario->getTienda(),
            'ultimo_acceso' => date('d/m/Y H:i'),
        ];

        header('Location: index.php?accion=catalogo');
        exit;
    }

    public function logout(): void {
        $_SESSION = [];
        session_destroy();
        header('Location: index.php?accion=login');
        exit;
    }
}