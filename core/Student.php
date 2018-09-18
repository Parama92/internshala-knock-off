<?php
    /**
     * A Class to handle the actions that a student can perform.
    */
    class Student extends User{
        public function __construct ($email) {
            parent::__construct($email);
            $this->type = 'students';
        }
        
        /**
         * A method to add the details of the new student in the database. Before that, it checks to see if student with the same email-id exists in the database. If so, returns suitable error message.
        *
        * @param string $password A string that receives password of new user.
        *
        * @param string $first A string that receives first name of new user.
        *
        * @param string $last A string that receives last name of new user.
        *
        * @return string|null Returns a string if an error occurs with the same and null otherwise. 
        */

        public function createUser ($password, $first, $last) {
            $error = $this->isRegistered();
            if (strlen($error)>0) {
                return $error;
            }
            $hash = $this->generateHash($password);
            App::get('database')->runQuery('INSERT INTO students(first, last, email, password) VALUES (?,?,?,?)', array($first, $last, $this->email, $hash));
        }

       /**
         * It evaluates the id of the student and stores the details entered in the applications table in the database. Before that it checks to see if the student has already applied for the same internship. If so, suitable error message is generated and returned.
        *
        * @param array $intrid The id of the internship for which the student has applied.
        *
        * @return string|null Returns the error message if an error is encountered and null otherwise.
        */ 

        public function postApplication ($intrid, $application) {
            $stuid = $this->getId();
            $hasPosted = $this->hasPosted($intrid, $stuid);
            if($hasPosted) {
                return 'You have already applied for this internship!';
            }
            App::get('database')->runQuery('INSERT INTO applications (intrid, stuid, application) VALUES(?,?,?)', array($intrid, $stuid, $application));
            return '';
        }

        /**
         * A method to fetch all applications the student has applied to.
        *
        * @param void
        *
        * @return array Returns an array of database entries fetched. 
        */

        public function getApplications () {
            return Internship::getInternshipsAppliedTo($this->getId());
        }

        /**
         * A method to check if student has applied to a particular internship.
        *
        * @param int $intrid The id of a particular internship.
        *
        * @return bool Returns if any row is fetched from the database.
        */

        public function hasPosted ($intrid) {
            $stuid = $this->getId();
            $hasPosted = App::get('database')->runQuery('SELECT appid FROM applications WHERE intrid = ? AND stuid =?;', array($intrid, $stuid));
            return (count($hasPosted)> 0);
        }
    }

?>