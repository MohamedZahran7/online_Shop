<?php
require_once '../App.php';
require_once '../classes/User.php';
require_once '../classes/Session.php';

$session = new Session();
$user = new User();

if ($request -> hasRequest($request ->post('submit'))){

    $username = $request->post('username');
    $password = $request->post('password');

    if ($user->userExists($username)) {
        $session->set('error', 'Username already exists. Please choose a different one.');
        $request->redirect("../register.php");
    } else {
        if ($user->register($username, $password)) {
            $session->set('success', 'Registration successful! Please log in.');
            $request->redirect("../login.php");
        } else {
            $session->set('error', 'Registration failed. Please try again.');
            $request->redirect("../register.php");
        }
    }
}
