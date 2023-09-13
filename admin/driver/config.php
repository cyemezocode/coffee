<?php 
session_start();
class Database{
	public static function connect(){
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=coffee','root','');
			return $pdo;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}
?>