<?php
class Config
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "ws";

    public function getConnection()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
?>