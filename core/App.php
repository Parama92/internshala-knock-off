<?php 
    /**
     * A class to bind singletons like query builder and user object to the app. 
    */
    class App {
        /** @var array $registry A static associative array which stores instances of all the singletons used by the app. */
        protected static $registry = [];

        /**
         * A method to add an entry to the $registry array.
        *
        * @param string $key Receives a string value which acts as the key for an entry to the $registry array.
        *
        * @param string|object $value Receives an array or object which serves as the value corresponding to the $key.
        *
        * @return void
        */
        
        public static function bind ($key, $value) {
            static::$registry[$key] = $value;
        }

        /**
         * A method to get an entry from the $registry array and throws an error if no such key exists.
        *
        * @param string $key Receives a string value which returns the corresponding value from the $registry array.
        *
        * @return void
        */

        public static function get ($key) {
            if (! array_key_exists($key, static::$registry)) {
                throw new Exception("No $key is bound in the container");
            }
            return static::$registry[$key];
        }
    }

?>