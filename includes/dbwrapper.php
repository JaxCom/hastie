<?php
class Database 
{
	private $dbname = "./users.db";
	private $dbtype = "sqlite";

	private $stmt = null;
	private $dbh = null;
	private $error = null;
	
	public function __construct()
	{
		try {
    		/*** connect to SQLite database ***/
    		$this->dbh = new PDO($this->dbtype . ':' . $this->dbname);
		
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function getConnection(){
		return $this->db;
	}
	
	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = null)
	{
		if (is_null($type))
		{
			switch (true) 
			{
				case is_int($value):
					$type = PDO::PARAM_INT;
				break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
				break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
				break;
				default:
					$type = PDO::PARAM_STR;
			} //switch
		} //if type null
		$this->stmt->bindValue($param, $value, $type);
	} //function bind
	public function execute()
	{
		return $this->stmt->execute();
	}
	
	public function resultSet()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function single()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function lastIndertId()  //broken?
	{
		return $this->dbh->sqlite_last_insert_rowid();
	}
	public function closeConn()
	{
		$this->dbh = null;
	}


} //class Database
?>
