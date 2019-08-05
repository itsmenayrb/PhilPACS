<?php

/**
 * This page will responsible for communicating with the Database
 */
require_once 'Config.php';

class Session extends Config {

	public function __construct() {

		$this->conn = new Config();

	}

	public function login($username, $password) {
		try {
			$stmt = $this->conn->runQuery("SELECT * FROM accountstbl WHERE username=:username LIMIT 1");
			$stmt->execute(array(":username" => $username));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($stmt->rowCount() == 1) {
				if (password_verify($password, $row['password'])) {
					echo "success";
					$_SESSION['username'] = $row['username'];
					$_SESSION['accountID'] = $row['accountID'];
				} else {
					echo "incorrect";
				}
			} else {
				echo "incorrect";
			}
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function checkPassword($id, $password) {
		try {
			$stmt = $this->conn->runQuery("SELECT * FROM accountstbl WHERE accountID=:accountID");
			$stmt->execute(array(":accountID" => $id));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if (password_verify($password, $row['password'])) {
					echo "success";
			} else {
				echo "incorrect";
			}
		} catch (PDOException $e) {
			echo "Connection Error: " . $e->getMessage();
		}
	}

}