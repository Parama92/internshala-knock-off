<?php

    require_once './core/setup.php';
    
    if (!isset($_POST['email'], $_POST['password'], $_POST['type'])) {
        header('location: index.php');
    }
    // capture user details
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    // TODO: serialize the data

    // Create and Authenticate user

    $user = ($type == 'student') ? new Student($email, $password) : (($type == 'employer') ? new Employer($email, $password) : new  Exception("Unknown user type: $type"));

    try {
        $error = $user->authenticate($password);
        if (strlen($error) == 0) {
            $_SESSION['type'] = $type;
            $_SESSION['email'] = $email;
            unset($error);
        }
        else {
            unset($type);
        }
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
    require './views/index.view.php';
?>