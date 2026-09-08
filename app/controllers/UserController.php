<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
 * 
 * Automatically generated via CLI.
 */
class UserController extends Controller
{
   public function showUsers() {
        $data['users'] = $this->UserModel->all();
        $this->call->view('users', $data);
    }
}