<?php
namespace Service;
class DbManager
{
    private $link;
    public function __construct(string $hostname, string $username, string $password, string $database)
    {
        $this->link = new \MySQLi($hostname, $username, $password, $database);
        if ($this->link->connect_error) {
            trigger_error('Error: Could not make a database link (' . $this->link->connect_errno . ') ' . $this->link->connect_error);
            exit();
        }
        $this->link->set_charset("utf8");
        $this->link->query("SET SQL_MODE = ''");
    }
    public function query(string $sql)
    {
        $query = $this->link->query($sql);
        if (!$this->link->errno) {
            if ($query instanceof \mysqli_result) {
                $data = array();
                while ($row = $query->fetch_assoc()) {
                    $data[] = $row;
                }
$result = new \stdClass();
$result->num_rows = $query->num_rows;
$result->row = isset($data[0]) ? $data[0] : array();
$result->rows = $data;
$query->close();
return $result;
} else {
    return null;
}
} else {
    trigger_error('Error: ' . $this->link->error . '<br />Error No: ' . $this->link->errno . '<br />' . $sql);
}
}
public function escape(string $value)
{
    return $this->link->real_escape_string($value);
}
}