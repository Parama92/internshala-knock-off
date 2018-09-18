<?php
    /**
     * A class to handle database interactions pertaining to the storing and receiving of information about internships.
    */
    class Internship {

        /**
         * A method to obtain all internships posted by all employers.
        *
        * @return array Returns an array of all database entrie obtained. 
        */

        public static function getAll () {
            return App::get('database')->runQuery('SELECT intrid, field, org, description, interns, skills, location, start, duration, stipend, posted, apply FROM `internships`i
            INNER JOIN employers e ON i.empid = e.id
            INNER JOIN tech USING (techid)');
        }

        /**
         * A method to obtain all information about a particular internship.
        *
        * @param int $intrid The id of the intership for which details are to be fetched.
        *
        * @return array|string Returns all corresponding database entries or an error string.
        */

        public static function getDetails ($intrid) {
            $details = App::get('database')->runQuery('SELECT intrid, field, org, description, interns, skills, location, start, duration, stipend, posted, apply FROM `internships`i
            INNER JOIN employers e ON i.empid = e.id
            INNER JOIN tech USING (techid)
            WHERE intrid = ?', array($intrid));
            return $details;
        }

        /**
         * A method to add an new internship to the internships table.
        * 
        * @param array $details An associative array with all the details about the new internship that are to be stored.
        *
        * @return void
        */

        public static function postInternship ($details) {
            extract($details);
            App::get('database')->runQuery('INSERT INTO internships(empid, techid, description, interns, skills, location, start, duration, stipend, apply) VALUES (?,?,?,?,?,?,?,?,?,?)', array($empid, $techid, $description, $interns, $skills, $location, $start, $duration, $stipend, $apply));
        }

        /**
         * A method to obtain all internships a student has applied to.
        *
        * @param int $stuid The id of the student whose applications are to be fetched.
        *
        * @return array An array of all datbase entries fetched.
        */

        public static function getInternshipsAppliedTo ($stuid) {
            return App::get('database')->runQuery('SELECT org, field FROM employers RIGHT JOIN internships ON employers.id = internships.empid LEFT JOIN tech USING (techid) WHERE intrid IN (SELECT intrid FROM applications WHERE stuid = ?)', array($stuid));
        }
    }

?>