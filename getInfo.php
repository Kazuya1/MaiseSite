<?php
	require("dbconfig.php");
	$output="";
	try{
		$conn = new PDO("sqlite:".$name);
		$cnt=0;
		foreach ($conn->query("select dataset,descriptor,architecture from info where id=".str_replace('_','',$_GET["input"])) as $row){
			$architecture = $row["architecture"];
			if($architecture=="1"){
				$architecture="1 Layer";
			}else{
				$architecture="2 Layers";
			}
			$output.="<div class='testDiv' id='Dcond".$cnt."'><li class='condition' id='Lcond".$cnt."'>".$row["dataset"].'-'.$row["descriptor"].'-'.$architecture."</li><input type='checkbox' class='1checks' id='cond".$cnt."'><div class='imgDiv' id='imgcond".$cnt."'></div></div>";
			$cnt++;
		}		
		echo $output;
	}catch(PDOException $e){
		echo "Connection failed: ".$e->getMessage();
	}
?>	