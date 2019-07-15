<?php


/**
 * Class DbManager
 */
class DbManager
{
    /**
     * @var MySQLi
     */
    protected $db;

    /**
     * DbManager constructor.
     * @param string $hostname
     * @param string $username
     * @param string $password
     * @param string $database
     * @throws Exception
     */
    public function __construct(string $hostname, string $username, string $password, string $database)
    {
        $this->db = new \MySQLi($hostname, $username, $password, $database);
        if ($this->db->connect_error) {
            throw new Exception($this->db->connect_error);
        }
        $this->db->set_charset("utf8");
        $this->db->query("SET SQL_MODE = ''");
    }

    /**
     * @param string $sql
     * @return object|null
     */
    public function query(string $sql): ?object
    {
        $query = $this->db->query($sql);
        if (!$this->db->errno) {
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
            trigger_error('Error: ' . $this->db->error . '<br />Error No: ' . $this->db->errno . '<br />' . $sql);
        }
    }

    /**
     * Escape value
     * @param string $value
     * @return string
     */
    public function escape(string $value): string
    {
        return $this->db->real_escape_string($value);
    }
}