<?php
class Databaza {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $connection;

    public function __construct($host, $dbname, $username, $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    public function connect() {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    // Metodat e tjera për përdorimin e lidhjes me bazën e të dhënave...
    
    public function closeConnection() {
        if ($this->connection) {
            mysqli_close($this->connection);
        }
    }

    private function bindParams($stmt, &$params) {
        $paramTypes = str_repeat('s', count($params));
        
        // Krijoni një array të referencave për parametrat
        $bindParams = [$stmt, $paramTypes];
        foreach ($params as &$param) {
            $bindParams[] = &$param;
        }
    
        // Përdorimi i call_user_func_array në vend të operatorit ...
        call_user_func_array('mysqli_stmt_bind_param', $bindParams);
    }

    public function executeQuery($query, $params) {
        $stmt = mysqli_prepare($this->connection, $query);
        if ($stmt === false) {
            die("Error in prepare statement: " . mysqli_error($this->connection));
        }
    
        if (!empty($params)) {
            $this->bindParams($stmt, $params);
        }
    
        mysqli_stmt_execute($stmt);
    
        return $stmt;
}
}
?>