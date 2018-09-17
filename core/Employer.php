<?php

    class Employer extends User {
        
        public function __construct ($email) {
            parent::__construct($email);
            $this->type = 'employers';
        }
        public function createUser ($password, $first, $last, $orgName, $phone) {
            $error = $this->isRegistered();
            if (strlen($error)>0) {
                return $error;
            }
            $hash = $this->generateHash($password);
            App::get('database')->runQuery("INSERT INTO employers(first, last, email, password, org, phone) VALUES (?,?,?,?,?,?)", array($first, $last, $this->email, $hash, $orgName, $phone));
        }
        public function postInternship ($details) {
            $details['empid'] = $this->getId();
            Internship::postInternship($details);
        }
        public function getApplications () {
            $data = $this->getId();
            $applications = App::get('database')->runQuery('SELECT appid, intrid, stuid, application, first, last FROM students s LEFT JOIN applications a ON s.id = a.stuid  WHERE intrid IN (SELECT intrid FROM internships WHERE empid = ?)', array($data));
            return $applications;
        }
    }

?>