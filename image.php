<?php
	$map = array("Bulk"=>"01","Nano"=>"02","8 Components"=>"008","30 Components"=>"030","51 Components"=>"051","1 Layer"=>"1","2 Layers"=>"2");
	$output="";
	$elements=str_replace("_","",$_GET["eles"]);
	$condTextParts=explode("-",$_GET["condText"]);	
	$path="LIB/".$elements."/".$map[$condTextParts[0]]."/".$map[$condTextParts[1]]."/".$map[$condTextParts[2]]."/";
	$files = scandir($path);
	array_splice($files,0,2);
	for($i=0;$i<count($files);$i++){
		if(!substr_compare($files[$i],".png",strlen($files[$i])-4,4,TRUE)){
			$output.="<img src='".$path.$files[$i]."' class='imgs' height='100px' width='100px' padding='10px' title='Click to Enlarge'>";
		}
	}
	echo $output;
?>
 