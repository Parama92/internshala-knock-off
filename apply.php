<?php

    require_once './core/setup.php';
    // check if user is loggen in. If not, redirect to login page
    if(!isset($_SESSION['email'])) {
        header('location: index.php?action=login');
    }
    // check if an employer is logged in. If so, redirect to login page with error message
    if(isset($_SESSION['type']) && $_SESSION['type'] == 'employer') {
        $_SESSION['error'] = 'Employers cannot apply for internships.';
        header('location: index.php');
    }
    // check if it was a post request
    if(isset($_POST['submit']) && $_POST['submit'] == 'submitted') {
        $intrid = (int)$_GET['intrid'];

        $error = is_int($intrid)? '' : 'Invalid internship';

        $application = $_POST['application'];

        // TODO: validation of form input
        $error = App::get('user')->postApplication($intrid, $application);
        if (strlen($error) == 0) {
            header('location: dashboard.php');
        }
    }
    // if intrid is not set, the previous page must be gone back to
    if (!isset($_GET['intrid'])){
        $goBack = 1;
    }
    require './views/apply.view.php';

?>