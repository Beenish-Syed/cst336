//public variables
var monkey_01;
var gameTimer;
var output;
var numHits=0;
var notHit=0;

$(document).ready( function() {
    
    /*monkey_01 = document.getElementById('monkey_01');
    output=document.getElementById('output');
    
    gameTimer = setInterval(gameloop, 50);
    placeMonkey();
    $("#hit").text(notHit);
    $("#miss").text(numHits);*/
    $("#monkey_01").mousedown(function(){
        hitMonkey();
      
  });
    init();
});

function init()
{
    monkey_01 = document.getElementById('monkey_01');
    output=document.getElementById('output');
    
    gameTimer = setInterval(gameloop, 20);
    placeMonkey();
    $("#hit").text(notHit);
    $("#miss").text(numHits);
}

function placeMonkey()
{
    //$("p").css({"background-color": "yellow", "font-size": "200%"});

    var x= Math.floor(Math.random()*421);
    $("#monkey_01").css({"left":x+'px'});
    $("#monkey_01").css({"top":"350px"});
   // $("#monkey_01").style.top= '350px';
    
}
function gameloop()
{
    var y = parseInt(monkey_01.style.top)-10;
    if(y<-100)
    {
        notHit++;
        if(notHit==5)
        {
            //alert("You Lose!");
            $("#message").text("You lost!!");
            clearInterval(gameTimer);
           
        }
        $("#miss").text(notHit);
        //document.getElementById('miss').innerHTML = notHit;
        placeMonkey();
        
    }
    else
    {
        //monkey_01.style.top = y+'px';
        $("#monkey_01").css({"top":y+'px'});
    }
}

function hitMonkey()
{
    numHits+=1;
    if(numHits==3)
    {
        //alert("You Win!!");
        $("#message").text("You Win!");
        clearInterval(gameTimer);
    }
    $("#hit").text(numHits);
    //document.getElementById('hit').innerHTML= numHits;
    placeMonkey();
    
}