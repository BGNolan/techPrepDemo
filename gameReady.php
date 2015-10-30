<?php
/**
*Ro Sham Bo
*Rock=1
*Paper=2
*Scissors=3
*
**/

//Get player id and selection from get data
$playerId = $_GET['playerId'];
$selection = $_GET['selection'];
$playerData = array('playerId'=>$playerId, 'selection'=>$selection);
//var_dump($playerData);
//Create/Open game file
$gameFileName = "game.json";

//Store values in json file as associative array
if (file_exists($gameFileName) && (filesize($gameFileName)) > 0) {
	$gameData = json_decode(file_get_contents($gameFileName), true);
	$gameFile = fopen("game.json", 'w+');
	//var_dump($gameData);
	array_push($gameData, $playerData);
	fwrite($gameFile, json_encode($gameData));
} else {
	$gameFile = fopen("game.json", 'w+');
	fwrite($gameFile, json_encode(array($playerData)));
}
fclose($gameFile);
//Decode json file as associative array and count # of enties






?>
