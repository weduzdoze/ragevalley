<?php

class Database {

    private static $dsn = 'mysql:host=localhost;dbname=rageValley';
    private static $username = 'info153';
    private static $password = 'r4g3';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
	
	public static function delete($table,$column,$id){
		$db = Database::getDB();
		$query = "DELETE FROM $table WHERE $column = $id ";
		$result = $db->exec($query);
		return $result;
	}
}
?>