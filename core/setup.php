<?php

    // requires all classes
    require_once 'App.php';
    require_once 'core/db/Connection.php';
    require_once 'core/db/QueryBuilder.php';
    require_once 'User.php';
    require_once 'Employer.php';
    require_once 'Student.php';
    require_once 'Internship.php';

    App::bind('config', require 'config.php');

    $conn = Connection::make(App::get('config')['db']);

    App::bind('database', new QueryBuilder($conn));

    session_start();

    // if the session in set, create the singleton 'user' object which would handle all database interactions.
    if (isset($_SESSION['type'])) {
        $user = $_SESSION['type'] == 'employer'? new Employer($_SESSION['email']) : new Student($_SESSION['email']);
        App::bind('user', $user);
    }
    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }
    
?>