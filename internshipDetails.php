<?php

    require_once './core/setup.php';
    
    // check to see if intrid is passed in url
    if (isset($_GET['intrid'])) {
        $intrid = (int)$_GET['intrid'];

        $error = is_int($intrid)? '' : 'Invalid internship';

        $details = Internship::getDetails($intrid);
        
        $hasPosted = (isset($_SESSION['type']) && $_SESSION['type'] == 'student') ? App::get('user')->hasPosted($intrid) : 0;
        
        if (count($details) == 0) {
            $error = 'Invalid internship';
        }
        else {
            $details = $details[0];
        }
    }
    else {
        $_SESSION['error'] = 'Invalid internship';
        header('location: index.php');
    }
    

    require_once './views/internshipDetails.view.php';

?>