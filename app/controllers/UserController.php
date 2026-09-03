<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
 * 
 * Automatically generated via CLI.
 */
class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function showUsers()
    {
      $this->call->database();
      $this->call->model('UserModel');
      $data['users'] = $this->UserModel->all();
      $this->call->view('users', $data);
    }
}