<?php

    class QueryBuilder {
        protected $conn;
        public function __construct ($conn) {
            $this->conn = $conn;
        }
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