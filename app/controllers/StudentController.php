<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
        session_start();

        $_SESSION['student_access'] = true;

        $student = [
            'student_id' => '2026-0001',
            'name' => 'Jhonas Cabanero',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => 'A',
            'email' => 'cabanerojhoas@gmail.com'
        ];

        $this->call->view('student/index', ['student' => $student]);
    }

    public function profile()
    {
        session_start();

        $data = [
            'student_id' => '2026-0001',
            'name' => 'Jhonas Cabanero',
            'course' => 'BS Information Technology',
            'year' => '3rd Year',
            'section' => 'A',
            'email' => 'jhonas@example.com',
            'address' => 'Calapan City, Oriental Mindoro',
            'contact_number' => '09123456789',
            'skills' => 'Programming, Web Development, Database Management',
            'hobbies' => 'Coding, Gaming, Watching Movies'
        ];

        $this->call->view('student/profile', $data);
    }
}