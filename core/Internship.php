<?php

    class Internship {
        public static function getAll () {
            return App::get('database')->runQuery('SELECT intrid, field, org, description, interns, skills, location, start, duration, stipend, posted, apply FROM `internships`i
            INNER JOIN employers e ON i.empid = e.id
            INNER JOIN tech USING (techid)');
        }
        public static function getDetails ($intrid) {
            $details = App::get('database')->runQuery('SELECT intrid, field, org, description, interns, skills, location, start, duration, stipend, posted, apply FROM `internships`i
            INNER JOIN employers e ON i.empid = e.id
            INNER JOIN tech USING (techid)
            WHERE intrid = ?', array($intrid));
            return $details;
        }
        public static function postInternship ($details) {
            extract($details);
            App::get('database')->runQuery('INSERT INTO internships(empid, techid, description, interns, skills, location, start, duration, stipend, apply) VALUES (?,?,?,?,?,?,?,?,?,?)', array($empid, $techid, $description, $interns, $skills, $location, $start, $duration, $stipend, $apply));
        }
        public static function getInternshipsAppliedTo ($stuid) {
            return App::get('database')->runQuery('SELECT org FROM employers WHERE id IN (SELECT empid FROM internships WHERE intrid IN (SELECT intrid FROM applications WHERE stuid = 2));');
        }
    }

?>