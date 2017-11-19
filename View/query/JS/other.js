$( document ).ready( function() {
$("#querylang").html("<img src='View/gif/ring-alts.gif' height='30px' width='30px' /> Fetching...");
$("#solutionlang").html("<img src='View/gif/ring-alts.gif' height='30px' width='30px' /> Fetching...");

$("#querylang").load("View/home/JS/querylang.php");
$("#solutionlang").load("View/home/JS/solutionlang.php");
});