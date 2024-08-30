<?php
require_once '../App.php';
require_once '../classes/User.php';
require_once '../classes/Session.php';

$session = new Session();
$user = new User();

if ($request -> hasRequest($request ->post('submit'))){

$username = $request->post('username');
$password = $request->post('password');

$loggedInUser = $user->login($username, $password);
if ($loggedInUser) {
    $session->set('user_id', $loggedInUser['id']);
        $request -> redirect("../index.php");
} else {
    $session->set('error', 'Invalid username or password.');
    $request->redirect("../login.php");
}
}