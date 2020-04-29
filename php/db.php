<?php class DbConnection extends PDO{

    private $conn;
    private $dns = "mysql::host=localhost;dbname=tasklist";
    private $user = "root";
    private $password = "brunopereira123";

    public function __construct() {
        try {
            $this->conn = new PDO($this->dns, $this->user, $this->password);
        }catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            $conn=null;
        }
    }

    public function insertTask($name, $status) {
        if ($status == "finalizada") {
            $this->conn->query("INSERT INTO list (name, status) VALUES ('".$name."', '".$status."')");

        }
        else {
            $this->conn->query("INSERT INTO list (name) VALUES ('".$name."')");
        }
    }

    public function selectAll() {
        return $this->conn->query("SELECT id, name, date, status FROM list");
    }
    
    public function selectAllHistory() {
        return $this->conn->query("SELECT id, name, date, status FROM history");
    }

    public function updateStatus($id, $date) {
        $this->conn->query("UPDATE list SET status = 'finalizada', date ='" .$date. "' WHERE id=".$id);
    }

    public function deleteTask($id) {
        $this->conn->query("DELETE FROM list WHERE id=".$id);
    }
    public function deleteHistoryTask($id) {
        $this->conn->query("DELETE FROM history WHERE id=".$id);
    }
    
    public function deleteHistoryAll() {
        $this->conn->query("DELETE FROM history");
    }

    public function changeStatus($id, $status) {
        if ($status == "finalizada") {
            $this->conn->query("UPDATE list SET status = 'não finalizada' WHERE id = ". $id);
        }
        else {
            $this->conn->query("UPDATE list SET status = 'finalizada' WHERE id = ".$id);
        }
    }
}
?>