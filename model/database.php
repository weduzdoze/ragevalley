<?php

class Database {
	//initialize variables with database credentials
    private static $dsn = 'mysql:host=localhost;dbname=rageValley';
    private static $username = 'info153';
    private static $password = 'r4g3';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        //create new databse PDO object
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
	//method to delete a row from any table
	//accepts 3 parameters table,column,and id
	public static function delete($table,$column,$id){
		$db = Database::getDB();
		//delete from the given table, where the given column equals the given id
		$query = "DELETE FROM $table WHERE $column = $id ";
		//execute the delete statement
		$result = $db->exec($query);
		return $result;
	}
}
?>