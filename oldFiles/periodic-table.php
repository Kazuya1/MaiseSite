<?php
	$output = "";
	$cnt = 0;
	function iterateDirectory($layer,$path,$names){
		global $output;
		global $cnt;
		if($layer<4){
		    $layerInfo = scandir("LIB/".$path);
		    array_splice($layerInfo, 0, 2);
			for($i=0; $i<count($layerInfo); $i++){
				if(is_dir("LIB/".$path."/".$layerInfo[$i])){
					$newName = array();
					for($j=0;$j<count($names);$j++) $newName[$j] = $names[$j];
					if($layer==1){
						if($layerInfo[$i]=="01") array_push($newName,"Bulk");
						else if($layerInfo[$i]=="02") array_push($newName,"Nano");
					}else if($layer==2){
						array_push($newName,"".((int)$layerInfo[$i])." Components");
					}else{
						if($layerInfo[$i]==1) array_push($newName,"1 Layer");
						else if($layerInfo[$i]==2) array_push($newName,"2 Layers");
					}
					iterateDirectory($layer+1,$path."/".$layerInfo[$i],$newName);
				}
			}
		}else if($layer==4){
			$output.="<div class='testDiv' id='Dcond".$cnt."'><li class='condition' id='Lcond".$cnt."'>".$names[0].'-'.$names[1].'-'.$names[2]."</li><input type='checkbox' class='1checks' id='cond".$cnt."'><div class='imgDiv' id='imgcond".$cnt."'></div></div>";
			$cnt++;
		}
	}
	$selectedEles =  $_GET['input'];
	if($selectedEles!="" && is_dir("LIB/".$selectedEles)){
		iterateDirectory(1,$selectedEles,array());
	}
	echo $output;
?>