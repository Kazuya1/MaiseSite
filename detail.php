<?php
	try{
		$conn = new PDO("sqlite:detail.db");
		$result = array();
		foreach ($conn->query("select * from detail") as $row){
			$result[$row["id"]] = "A: ".$row["A"].", B: ".$row["B"].", C: ".$row["C"];
		}	
		echo json_encode($result);
	}catch(PDOException $e){
		echo "Connection failed: ".$e->getMessage();
	}
?>