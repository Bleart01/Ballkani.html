<?php
$host = "localhost";
$dbname = "ballkani";
$username = "root";
$password = "";
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
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        
        return $this->connection;
    }
    
    public function closeConnection() {
        if ($this->connection) {
            mysqli_close($this->connection);
        }
    }

    private function bindParams($stmt, &$params) {
        $paramTypes = array_shift($params); 

        $bindParams = [$stmt, $paramTypes];
        foreach ($params as &$param) {
            $bindParams[] = &$param;
        }

        // Përdorimi i call_user_func_array në vend të operatorit ...
        call_user_func_array('mysqli_stmt_bind_param', $bindParams);
    }

    public function shtoLojtar($emri, $mbiemri, $datelindja, $nacionaliteti, $pozita) {
        $query = "INSERT INTO lojtaret (emri, mbiemri, data_lindjes, nacionaliteti, pozita) VALUES (?, ?, ?, ?, ?)";
        $params = ["sssss", $emri, $mbiemri, $datelindja, $nacionaliteti, $pozita];
        $this->executeQuery($query, $params);
    }

    public function shtoNdeshje($skuadra1, $skuadra2, $data_kompeticionit) {
        $query = "INSERT INTO ndeshjet (skuadra1, skuadra2, data_kompeticionit) VALUES (?, ?, ?)";
        $params = ["sss", $skuadra1, $skuadra2, $data_kompeticionit];
        $this->executeQuery($query, $params);
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
public function fetchData($query, $params) {
    $stmt = $this->executeQuery($query, $params);

    $result = mysqli_stmt_get_result($stmt);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    mysqli_free_result($result);
    mysqli_stmt_close($stmt);

    return $data;
}
}
?>