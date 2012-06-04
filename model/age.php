<?php 
class Age{
	   public function __construct($ageID,$name) {
        $this->ageID = $ageID;
        $this->name = $name;
    }
	   
	   public static function getAges() {   
        $db = Database::getDB();
        $query = "SELECT * FROM ages
				  ORDER BY name ASC";
        $result = $db->query($query);
		$ages = array();
		
		foreach ($result as $row){ 
			$age = new Age($row['ageID'],
								 $row['name']);			
			$ages[] = $age;
		}
		return $ages;
}
	
	public function getID(){
		return $this->ageID;
	}	
	
	public function getName(){
		return $this->name;
	}
	

}

?>