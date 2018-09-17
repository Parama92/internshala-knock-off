<?php
    $type = $_GET['type'];

    // for the post request to process the form data
    if (isset($_POST['fname'], $_POST['lname'], $_POST['password'])) {

        require_once './core/setup.php';

        $first = $_POST['fname'];
        $last = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if ($type == 'employer') {
            $orgName = $_POST['org-name'];
            $phone = $_POST['phone'];

            // TODO: Validation of form inputs
            
            $user = new Employer($email);
            $error = $user->createUser($password, $first, $last, $orgName, $phone);
        }
        else {
            $user = new Student($email);
            $error = $user->createUser($password, $first, $last);
        }
        if (strlen($error)>0) {
            require_once 'views/register.view.php';
        }
        else {
            $_SESSION['type'] = $type;
            $_SESSION['email'] = $email;
            header('location: index.php');
        }
    }
    // for the first get request to dispay the form
    else {
        if ($type!== 'student' && $type!== 'employer') {
            throw new Exception("Unidentified $type asking to be registered!");
        }
        require_once 'views/register.view.php';
    }
    
?>