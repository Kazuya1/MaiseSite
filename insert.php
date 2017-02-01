<?php
	require("dbconfig.php");
	$filename = "data.txt";
	$handle = fopen($filename, "r");
	$contents = split("-",fread($handle, filesize($filename)));
	fclose($handle);
	$commands=array();
	foreach($contents as $combination){
		if(!empty(strlen($combination))){
			$lines=split("\n",$combination);
			$elements = split(" ",$lines[0]);
			for($i=0;$i<count($elements);$i++){
				for($j=0;$j<count($elements);$j++){
					if($i!=$j){
						array_push($commands,"insert into search Values($elements[$i],$elements[$j])");
					}
				}
			}
			$id=join("",$elements);
			for($i=1;$i<count($lines);$i++){
				if(!empty($lines[$i])){
					$parts=split(",",$lines[$i]);
					array_push($commands,"insert into info values($id,'$parts[0]','$parts[1]',$parts[2])");
				}
			}
		}
	}
	try{
		$conn = new PDO("sqlite:".$name);
		$conn->beginTransaction();
		foreach($commands as $command){
			$counter=$conn->exec($command);
		}
		$conn->commit();
		echo "success";
	}catch(PDOException $e){
		$conn->rollBack();
		echo "error";
	}
?>
