<?php
	require("dbconfig.php");
	try{
		$conn = new PDO("mysql:host=".$host.":".$port.";dbname=".$dbname,$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	    $stmt = $conn->prepare("SELECT DISTINCT available FROM combination WHERE selected=29");
	    $stmt->execute();
		$resultString = '{"people":[';
		if($row = $stmt->fetch(PDO::FETCH_ASSOC)) $resultString .= json_encode($row["available"]);
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) $resultString .= ",".json_encode($row["available"]);
		$resultString .= ']}';
		echo "$resultString";
	}catch(PDOException $e){
		echo "Connection failed: ".$e->getMessage();
	}
?>	
	
