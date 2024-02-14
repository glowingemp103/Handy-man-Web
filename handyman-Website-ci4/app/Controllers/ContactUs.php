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
        // print_r($_POST);
        // die;
        $email = \Config\Services::email();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'required|numeric',
            'service' => 'required',
            'message' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON(['error' => $validation->getErrors()]);
        }

        $name = $this->request->getPost('name');
        $emailAddress = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $subject = $this->request->getPost('service');
        $message = $this->request->getPost('message');

        $email->setTo('info@homfixers.com');
        $email->setFrom($emailAddress, $name);
        $email->setSubject($subject);
        $email->setMessage("Name: $name\nEmail: $emailAddress\nPhone: $phone\nMessage: $message");

        if ($email->send()) {
            log_message('info', 'Email sent successfully.');
            return $this->response->setJSON(['message' => 'Email sent successfully']);
        } else {
            log_message('error', 'Email send failed: ' . $email->printDebugger());
            return $this->response->setJSON(['error' => 'Email sending failed']);
        }
    }
}
