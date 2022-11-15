<?php 

/**
 * 
 */
class user extends DB
{
	
	function __construct(DB $conn)
	{
		$this->conn = $conn->conn;

	}

	public function login_users($username, $password) {
		$sql = "SELECT * FROM `users` WHERE `username`= :username AND `password` = :password";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue('username', $username);
		$stmt->bindValue('password', $password);
		$stmt->execute();


		return $stmt;
	}

	public function register($requests)
	{
		$sql = "INSERT INTO `users`(`fullname`, `username`, `email`, `password`) VALUES (:fullname, :username, :email, :password)";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue('fullname', $requests['fullname']);
		$stmt->bindValue('username', $requests['username']);
		$stmt->bindValue('email', $requests['email']);
		$stmt->bindValue('password', $requests['password']);
		$stmt->execute();

		return $stmt;
	}


}

?>
