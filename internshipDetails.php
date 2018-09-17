<?php

    require_once './core/setup.php';
    
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
        $error = 'Invalid internship';
    }
    

    require_once './views/internshipDetails.view.php';

?>