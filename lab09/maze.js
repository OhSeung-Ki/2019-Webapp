/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */

"use strict";
var loser = null;  // whether the user has hit a wall
var win = null;

window.onload = function() {
	var bound = $$(".boundary");
	for(var i = 0; i<bound.length; i++){
		bound[i].observe("mouseover", overBoundary);
	}
	$("end").observe("mouseover",overEnd);
	$("start").observe("click",startClick);
	document.body.observe("mousemove",overBody);
};

// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
	if(!win){
		var target = $$(".boundary");
		loser = true;
		if(loser){
			for (var i = 0; i < target.length; i++) {
				target[i].addClassName("youlose");
			}
			$("status").innerHTML = "YOU LOSE! :(";
		}
	}
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
	var target = $$(".boundary");
	loser = false;
	win = false;
	for (var i = 0; i < target.length; i++) {
		target[i].removeClassName("youlose");
	}
	$("status").innerHTML = "TRY AGAIN!";
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
	win = true;
	if(win){
		$("status").innerHTML = "YOU WIN! :)";
	}
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
	if(event.element() == document.body){
		overBoundary(event);
	}
}
