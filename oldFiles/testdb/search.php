<?php
	require("dbconfig.php");
	try{
		$conn = new PDO("sqlite:".$name);
		$stmt = $conn->prepare("select available from search where selected=?");
		$stmt->bindParam(1, $selected);
		$inputs=explode("_",$_GET["input"]);
		for($i=0;$i<count($inputs);$i++){
			$result = array();
			$selected=$inputs[$i];
			$stmt->execute();
			while($row = $stmt->fetch()["available"]) array_push($result,$row);
			$resultArray=($i)?array_intersect($resultArray,$result):$result;
		}
		for($i=0;$i<count($inputs);$i++) array_push($resultArray,$inputs[$i]);
		echo json_encode($resultArray);
	}catch(PDOException $e){
		echo "Connection failed: ".$e->getMessage();
	}
?>	
	
