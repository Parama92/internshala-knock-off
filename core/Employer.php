<?php
    /**
     * A Class to handle the actions that an employer can perform.
    */
    class Employer extends User {
        
        public function __construct ($email) {
            parent::__construct($email);
            $this->type = 'employers';
        }

        /**
         * A method to add the details of the new employer in the database. Before that, it checks to see if employer with the same email-id exists in the database. If so, returns suitable error message.
        *
        * @param string $password A string that receives password of new user.
        *
        * @param string $first A string that receives first name of new user.
        *
        * @param string $last A string that receives last name of new user.
        *
        * @param string $orgName A string that receives the organisation name of new user.
        *
        * @param string $phone A string that receives phone number of new user.
        *
        * @return string|null Returns a string if an error occurs with the same and null otherwise. 
        */

        public function createUser ($password, $first, $last, $orgName, $phone) {
            $error = $this->isRegistered();
            if (strlen($error)>0) {
                return $error;
            }
            $hash = $this->generateHash($password);
            App::get('database')->runQuery("INSERT INTO employers(first, last, email, password, org, phone) VALUES (?,?,?,?,?,?)", array($first, $last, $this->email, $hash, $orgName, $phone));
        }

       /**
         * It evaluates the id of the employer and passes all the information to the Internship::postInternship() method to add new internship information to the internship table in the database
        *
        * @param array $details An associative array with all internship details.
        *
        * @return void
        */ 

        public function postInternship ($details) {
            $details['empid'] = $this->getId();
            Internship::postInternship($details);
        }

        /**
         * A method to fetch all applications received by the employer.
        *
        * @param void
        *
        * @return array Returns an array of database entries fetched. 
        */

        public function getApplications () {
            $data = $this->getId();
            $applications = App::get('database')->runQuery('SELECT appid, intrid, stuid, application, first, last FROM students s LEFT JOIN applications a ON s.id = a.stuid  WHERE intrid IN (SELECT intrid FROM internships WHERE empid = ?)', array($data));
            return $applications;
        }
    }

?>