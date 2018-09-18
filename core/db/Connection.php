<?php
    /**
     * Handles connection to database
     */
    class Connection {
        /**
         * Tries to establish a connection with the database. If any error is encountered, it is handled with suitable error messages.
        *
        * @param string $config An associative array containing the database name, host, password and username information for establishing databse connection.
        *
        * @return void
        */
        public static function make ($config) {
            try {
                return $pdo = new PDO(
                    $config['connection'].';dbname='.$config['dbname'],
                    $config['username'],
                    $config['password'],
                    $config['options']
                );
            }
            catch(PDOException $e) {
                return $e->getMessage();
            }
        }
    }

?>