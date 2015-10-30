<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Inconsolata:400,700' rel='stylesheet' type='text/css'>
	<script src="js/jquery-2.1.4.js"></script>
	<script src="js/velocity.min.js"></script>
	<script>
	//$(".hand").velocity();

	$(document).ready(function() {
		var gameState = "start";
		if (gameState == "start") {
			$(".leftReadyHand, .leftFire").velocity({
				paddingRight: "5%",
				paddingBottom: ".5%"
			}, {
				duration: 1000,
				easing: "easeInOutSine",
				loop: true
			}).velocity("reverse");

			$(".rightReadyHand, .rightFire").velocity({
				paddingLeft: "5%",
				paddingTop: ".5%"
			}, {
				duration: 1000,
				easing: "easeInOutSine",
				loop: true
			}).velocity("reverse");
		}


		$(".handChoice").hover(function() {
      $( this ).velocity({scale:1.15},{duration:100});
    }, function() {
			$( this ).velocity({scale:1},{duration:100});
		});


		$(".handChoice").click(function() {
			var choice = $(this).attr("data-val");
			$(".handChoice").filter(function(index) {
				return $(this).attr("data-val") != choice;
			}).velocity({
					scale:0
				},
				{

				});
			$('.notificationBox').val("You chose:" + choice);
				console.log(choice);
			if (choice == "rock") {
				choice = 1;
			} else if (choice == "scissor") {
				choice = 2;
			} else if (choice == "paper") {
				choice = 3;
			}
			var moveRequest = $.ajax({
				url:'gameReady.php',
				data: {selection:choice, playerId:1},
				type:'GET'
			});
			moveRequest.done(function(msg) {
			});
		});


		$(".startButton").click(function() {
			gameState = "introAnimation";
			console.log(gameState);
			if (gameState == "introAnimation") {
				$(".titleHeader").velocity({marginTop:".1em",marginBottom:".9em"},{duration:800});
				$(".controls").velocity({
						scale:0,
						marginTop:"100%",

					},
				  {
						duration:800,
						display:"none",
						complete: function() {
							$(".rightReadyHand_Holder").velocity(
								{
									marginRight: "25.5%",
									rotateZ:"20deg"
								},
								{
									duration: 1100
								}
						);
							$(".leftReadyHand_Holder").velocity({
								marginLeft: "25.5%",
								rotateZ:"-20deg"
							},
							{
								duration: 1100,
								complete: function() {
									$(".leftReadyHand_Holder, .rightReadyHand_Holder").velocity({
										marginTop:"80%"
									},
									{
										duration: 1000,
										display:"none",
										complete: function() {
											$(".handChoiceHolder").velocity(
												{
													marginTop:"0%"
												},
												{
													duration:800
												}


											);
										}
									});
								}
							}
						);

					}
				});
			}
		});







	});



	</script>
	<style>
	* {
		margin:0;
		padding:0;
		font-family: 'Inconsolata' ;
	}
	body {

	}
	.titleHeader {
		margin-top:1em;
		font-size:8em;
		display:block;
		text-align:center;
		font-family: 'Inconsolata' ;
		font-weight:bold;
	}
	.controls {
		margin:0 auto;
		float:left;
		display:inline;
		width:50%;
		margin-left:5%;
		margi-right:5%;
		text-align: center;
		margin-top:10%;
	}
	.option {
		display: block;
		font-size:5em;
		cursor: pointer;
		padding-top:.5em;
		padding-bottom:.5em;
	}

	.leftReadyHand_Holder {
		float:left;
		width:20%;
		position: relative;
	}

	.rightReadyHand_Holder {
		float:right;
		width:20%;
		position: relative;

	}

	.leftReadyHand {
		width:100%;
		-webkit-transform: rotate(90deg) scaleX(-1);
		-moz-transform: rotate(90deg) scaleX(-1);
		-ms-transform: rotate(90deg) scaleX(-1);
		-o-transform: rotate(90deg) scaleX(-1);
		transform: rotate(90deg) scaleX(-1);
		filter: FlipH;
		-ms-filter: "FlipH";
		position: relative;
		z-index: 2;
	}
	.rightReadyHand {
		width:100%;
		-webkit-transform: rotate(270deg);
		-moz-transform: rotate(270deg);
		-ms-transform: rotate(270deg);
		-o-transform: rotate(270deg);
		transform: rotate(270deg);
		position: relative;
		z-index: 2;
	}


	.fistFire {
		bottom:64%;
		width:100%;
		position: absolute;
		z-index: 1;
	}
	.leftFire {
		left:40%;
	}
	.rightFire {
		right:40%;
	}

	.handChoiceHolder {
		margin: 0 auto;
		margin-top: 100%;
		min-width:min-content;
		display:table;
		-webkit-transform: rotate(90deg);
		-moz-transform: rotate(90deg);
		-ms-transform: rotate(90deg);
		-o-transform: rotate(90deg);
		transform: rotate(90deg);

	}
	.handChoiceHolder > h1 {
		webkit-transform: rotate(-90deg);
		-moz-transform: rotate(-90deg);
		-ms-transform: rotate(-90deg);
		-o-transform: rotate(-90deg);
		transform: rotate(-90deg);
		position: relative;
		right:50%;
		top:10%;

	}
	.handChoice {
		float:left;
		clear:left;
		cursor:pointer;
		width:80%;
	}
	.notificationBox {
		display: block;
	}
	</style>
	<script>

	</script>
</head>

<body>
	<div class="titleHeader">
		Ro-Sham-Bo
		<div class="notificationBox">
		</div>
	</div>
	<div class="leftReadyHand_Holder">
		<img class="fistFire leftFire" src="img/fire.gif">
		<img class="hand leftReadyHand" src="img/fist.png">
	</div>
	<div class="controls">
		<div class="option startButton">Start</div>
		<div class="option"> </div>
		<div class="option"> </div>
	</div>
	<div class="rightReadyHand_Holder">
		<img class="fistFire rightFire" src="img/fire.gif">
		<img class="hand rightReadyHand" src="img/fist.png">
	</div>
	<div class="handChoiceHolder">
			<img data-val="rock" class="handChoice" src="img/rockHand.png">
			<img data-val="scissor" class="handChoice" src="img/scissorHand.png">
			<img data-val="paper" class="handChoice" src="img/paperHand.png">
	</div>



</body>
</html>
