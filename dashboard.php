<?php

    require_once './core/setup.php';

    // check to see if user is logged in. If not, redirect to index page and prompt login
    if (!isset($_SESSION['email'])) {
        header('location: index.php?action=login');
    }
    // check to see if form has been submitted to post an internship
    if(isset($_POST['submit']) && $_POST['submit'] == 'submitted') {
        $techid = $_POST['techid'];
        $description = $_POST['description'];
        $interns = $_POST['interns'];
        $skills = $_POST['skills'];
        $location = $_POST['location'];
        $start = validateDate($_POST['start']);
        $duration = $_POST['duration'];
        $stipend = (strlen($_POST['stipend']) !== 0) ? $_POST['stipend'].' '.$_POST['stipend-rate'] : NULL;
        $apply = validateDate($_POST['apply']);
        
        // TODO: Validation of user input
        
        App::get('user')->postInternship(compact('techid','description','interns','skills','location','start','duration','stipend','apply'));
    }
    // if an employer is logged in, provide employer specific view
    if ($_SESSION['type'] == 'employer') {
        $nav = isset($_GET['nav']) ? $_GET['nav'] : 'app';
        if ($nav == 'app') {
            try {
                $apps = App::get('user')->getApplications();
            }
            catch (Exception $e){
                $error = $e->getMessage();
            }
        }
        else if ($nav == 'post') {
            $techs = App::get('database')->runQuery('SELECT techid, field FROM tech');
        }
    }
    // if a student is logged in, provide student specific view
    else if ($_SESSION['type'] == 'student') {
        $stuApps = App::get('user')->getApplications();
    }

    require_once 'views/dashboard.view.php';

    // a function to validate date

    function validateDate ($date) {
        if (strlen($date) == 0) {
            return NULL;
        }
        else {
            $dateArr = explode('-',$date);
            return checkdate($dateArr[1], $dateArr[2], $dateArr[0]) ? $date : NULL;
        }
    }
?>