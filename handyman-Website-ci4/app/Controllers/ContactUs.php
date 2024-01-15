<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ContactUs extends Controller
{
    public function index()
    {
        return view('contactUs');
    }

    public function sendMessage()
    {
        $email = \Config\Services::email();

        $name = $this->request->getPost('name');
        $emailAddress = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $subject = $this->request->getPost('web');
        $message = $this->request->getPost('message');

        $email->setTo('asad.sabri19@gmail.com');
        $email->setFrom($emailAddress, $name);
        $email->setSubject($subject);
        $email->setMessage("Name: $name\nEmail: $emailAddress\nPhone: $phone\nMessage: $message");

        if ($email->send()) {
            echo 'Email sent successfully!';
        } else {
            echo $email->printDebugger();
        }
    }
}
