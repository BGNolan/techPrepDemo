<?php
$gameFileName = "game.json";
if (file_exists($gameFileName)) {
	$gameData = json_decode(file_get_contents($gameFileName), true); 	//I'm an albatroz

	if (count($gameData)>1) {
		//Delete gameFile
		$deleteFile=unlink('game.json');

		//Play Game
		?>
		<style>
			.viewingZone {
				margin:0 auto;
				margin-top:10%;
				font-size:10em;
				text-align:center;
			}
		</style>
		<div class="viewingZone">
		<?php
		if($gameData[0]["selection"]==$gameData[1]["selection"]){
			echo("Draw! no one won");

			//Player 1 Rock
		} elseif($gameData[0]['selection']==1){
			//Player Two Paper
			if($gameData[1]['selection']==2){
				echo("User " . $gameData[1]['playerId'] . " won the match with paper!");
				//Player Two Scizzors
			}elseif($gameData[1]['selection']==3){
				echo("User " . $gameData[0]['playerId'] . " won the match with rock!");
			}
			//Player 1 paper
		}elseif($gameData[0]['selection']==2){
			//Player Two Rock
			if($gameData[1]['selection']==1){
				echo("User " . $gameData[0]['playerId'] . " won the match with paper!");
				//Player Two Scizzors
			}elseif($gameData[1]['selection']==3){
				echo("User " . $gameData[1]['playerId'] . " won the match with scissors!");
			}
			//Player 1 rock
		}elseif($gameData[0]['selection']==3){
			//Player Two Rock
			if($gameData[1]['selection']==1){
				echo("User " . $gameData[1]['playerId'] . " won the match with rock!");
				//Player Two Paper
			}elseif($gameData[1]['selection']==2){
				echo("User " . $gameData[0]['playerId'] . " won the match with scissors!");
			}
		}
		?>
		</div>
		<?php
	}
}
?>
