<?php
    /**
     * A Class to handle the actions that a student can perform.
    */
    abstract class User {
        
        /** @var string $email A string to store the email. */
        /** @var string $type A string to store the typeof user, i.e, student or employer. */
        
        protected $email, $type;
        public function __construct ($email) {
            $this->email = $email;
        }
        public function authenticate ($password) {
            $result = App::get('database')->runQuery("SELECT id, password FROM $this->type WHERE email = ?", array($this->email));
            if (count($result) == 0) {
                return "Invalid Email";
            }

            if (!password_verify($password, $result[0]['password'])) {
                return "Invalid password";
            }
            return '';
        }
        function isRegistered () {
            $result = App::get('database')->runQuery("SELECT id FROM $this->type WHERE email = ?", array($this->email));
            if(count($result)>0) {
                return "User exists! Just login.";
            }
            return '';
        }
        public function generateHash ($password) {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            return $hash;
        }
        public function getId () {
            $result = App::get('database')->runQuery("SELECT id FROM $this->type WHERE email = ?", array($this->email));
            if (count($result) == 0) {
                throw new Exception('Invalid Email');
            }
            return $result[0]['id'];
        }
    }

?>