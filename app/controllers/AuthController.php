<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function login()
    {
        if ($this->session->userdata('authenticated')) {
            redirect('products');
        }

        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim((string) $this->request->post('username'));
            $password = (string) $this->request->post('password');
            $configured_username = (string) (getenv('AUTH_USERNAME') ?: '');
            $configured_hash = (string) (getenv('AUTH_PASSWORD_HASH') ?: '');

            $valid_password = $configured_hash !== ''
                ? password_verify($password, $configured_hash)
                : hash_equals((string) (getenv('AUTH_PASSWORD') ?: ''), $password);

            if ($configured_username !== '' && hash_equals($configured_username, $username) && $valid_password) {
                $this->session->set_userdata('authenticated', true);
                $this->session->set_userdata('auth_username', $username);
                redirect('products');
            }

            $error = 'Invalid username or password.';
        }

        $this->call->view('auth/login', ['error' => $error]);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}