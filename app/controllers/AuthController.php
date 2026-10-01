<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('UserModel');
    }

    public function login()
    {
        $data['error'] = '';

        if ($this->form_validation->submitted()) {
            $username = trim($this->io->post('username'));
            $password = $this->io->post('password');
            $user = $this->UserModel->find_by_username($username);

            if (!empty($user) && password_verify($password, $user['password'])) {
                $this->session->regenerate_on_login();
                $this->session->set_userdata([
                    'id' => $user['id'],
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'user_role' => $user['role']
                ]);
                header('Location: ' . site_url('/products'));
                exit;
            }

            $data['error'] = 'Invalid username or password.';
        }

        $this->call->view('auth/login', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        header('Location: ' . site_url('/login'));
        exit;
    }

}