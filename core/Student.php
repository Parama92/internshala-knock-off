<?php

    class Student extends User{
        public function __construct ($email) {
            parent::__construct($email);
            $this->type = 'students';
        }
        public function createUser ($password, $first, $last) {
            $error = $this->isRegistered();
            if (strlen($error)>0) {
                return $error;
            }
            $hash = $this->generateHash($password);
            App::get('database')->runQuery('INSERT INTO students(first, last, email, password) VALUES (?,?,?,?)', array($first, $last, $this->email, $hash));
        }
        public function postApplication ($intrid, $application) {
            $stuid = $this->getId();
            $hasPosted = $this->hasPosted($intrid, $stuid);
            if($hasPosted) {
                return 'You have already applied for this internship!';
            }
            App::get('database')->runQuery('INSERT INTO applications (intrid, stuid, application) VALUES(?,?,?)', array($intrid, $stuid, $application));
            return '';
        }
        public function getApplications () {
            return Internship::getInternshipsAppliedTo($this->getId());
        }
        public function hasPosted ($intrid) {
            $stuid = $this->getId();
            $hasPosted = App::get('database')->runQuery('SELECT appid FROM applications WHERE intrid = ? AND stuid =?;', array($intrid, $stuid));
            return (count($hasPosted)> 0);
        }
    }

?>