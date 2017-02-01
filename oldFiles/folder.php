<?php
function inputInCombination($inputs,$parts){
	for($i=0;$inputs[$i];$i++){
		if(!in_array($inputs[$i], $parts)){
			return 0;
		}
	}
	return 1;
}
$inputs = explode("_",$_GET["input"]);
$output = array();
$combination = scandir("LIB/");
array_splice($combination,0,2);
for($i=0;$i<count($combination);$i++){
	if(is_dir("LIB/".$combination[$i])){
		$parts = explode("_",$combination[$i]);
		if(inputInCombination($inputs,$parts)){
			for($j=0;$parts[$j];$j++){
				if(!in_array($parts[$j], $inputs) && !in_array($parts[$j], $output)){
					array_push($output,$parts[$j]);
				}
			}
		}
	}
}
echo json_encode($output);
?>