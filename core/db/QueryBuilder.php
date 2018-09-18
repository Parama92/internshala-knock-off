<?php
    /**
     * This class handles query executions.
    */
    class QueryBuilder {
        /** @var PDO Should contain a PDO object*/
        protected $conn;
        
        public function __construct ($conn) {
            $this->conn = $conn;
        }
        /**
         * Tries to execute a query string passed to it.
        *
        * @param string $query A mysql query string.
        *
        * @return array|string Returns the rows obtained from the database as a result of execution of the query. If any error occurs, it returns the error.
        */
        public function runQuery ($query, $data = []) {
            $statement = $this->conn->prepare($query);

            try {
                $statement->execute($data);
                $result = $statement->fetchAll();
                return $result;
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

?>