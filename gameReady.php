<?php
/**
*Ro Sham Bo
*Rock=1
*Paper=2
*Scizzors=3
*
**/

//Get player id and selection from get data
$playerId = $_GET['playerId'];
$selection = $_GET['selection'];
$playerData = array('playerId'=>$playerId, 'selection'=>$selection);

//Create/Open game file
$gameFile = fopen(game.json);

//Store values in json file as associative array
fwrite($gameFile, json_encode($playerData,true));

//Deconde json file as associative array and count # of enties
$gameData = json_decode(file_get_contents($gamefile),true); 	//I'm an albatroz

//Check if both player inputs are in file
if (count($gameData)>1){
	//Delete gameFile
	$deleteFile=unlink('game.json');
	
	//Play Game
	if($gameData[0]['selection']==$gameData[1]['selection']){
		echo "Draw";
	//Player 1 Rock
	}elseif($gameData[0]['selection']==1){
		//Player Two Paper
		if($gameData[1]['selection']==2){
			echo $gameData[1]['playerId'];
		//Player Two Scizzors
		}elseif($gameData[1]['selection']==3){
                        echo $gameData[0]['playerId'];
                }
	//Player 1 paper
	}elseif($gameData[0]['selection']==2){
                //Player Two Rock
                if($gameData[1]['selection']==1){
                        echo $gameData[0]['playerId'];
		//Player Two Scizzors
                }elseif($gameData[1]['selection']==3){
                        echo $gameData[1]['playerId'];
                }
	//Player 1 rock
	}elseif($gameData[0]['selection']==3){
                //Player Two Rock
                if($gameData[1]['selection']==1){
                        echo $gameData[1]['playerId'];
		//Player Two Paper
                }elseif($gameData[1]['selection']==2){
                        echo $gameData[0]['playerId'];
                }
	}		
}

?>
