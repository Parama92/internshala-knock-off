<?php

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

    if (isset($_SESSION['type'])) {
        $user = $_SESSION['type'] == 'employer'? new Employer($_SESSION['email']) : new Student($_SESSION['email']);
        App::bind('user', $user);
    }
    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }
    // $employer = new Employer('Parama','Kar','parama_kar@infosys.com', 'Parama@123', 'Infosys', '9739095531');
    // $student = new Student('Parama','Kar','parama_kar@infosys.com', 'Parama@123');
  
    // print_r($employer);
    // print_r($student);
    
?>