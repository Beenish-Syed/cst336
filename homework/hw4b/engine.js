var monkey_01;
var loop=-1;
var numHits=0;

$(document).ready(
    function playGame(){
        if(loop<5)
        {
            loop++;
            monkey_01 = document.getElementById('monkey_01');
            //$("#monkey_01").show();changed by devin
            placeMonkey();
            $("#monkey_01").css({top:'0px'}).animate({top:'350px'},1000,playGame);
            if(loop==5)
            {
               // alert("you loose you missed "+loop+" monkeys!");
                $("#message").text("You lost!!");
                $("#monkey_01").stop().css({top:'0px'});
                //$("#monkey_01").hide();
            }
            $("#miss").text(loop);
            //document.getElementById('miss').innerHTML= loop;
            
        }
        
    });



function placeMonkey()
{
    //monkey_01 = document.getElementById('monkey_01');
    var x= Math.floor(Math.random()*421);
    monkey_01.style.left=x+'px';
    monkey_01.style.top= '0px';
    //$("#monkey_01").css({top:'0px'});
    
}

function hitMonkey()
{
    //changed by devin $("#monkey_01").hide();
  //  $("#monkey_01").finish();
  //$("#monkey_01").removeAttr("top");
    placeMonkey();
    
    loop--;
    numHits+=1;
    $("#hit").text(numHits);
    if(numHits==3)
    {
        //alert("You Win!!");
        $("#message").text("You Win!");
        $("#monkey_01").stop();
        $("#monkey_01").hide();
    }
    //document.getElementById('hit').innerHTML= numHits;
    
}

/*$("#monkey_01").mousedown(function(){
    placeMonkey();
    numHits+=1;
    if(numHits==3)
    {
        alert("You Win!!");
        $("#monkey_01").stop();
    }
    document.getElementById('hit').innerHTML= numHits;
    alert("Mouse down over p1!");
});*/



/*
//public variables
var monkey_01;
var gameTimer;
var output;
var numHits=0;
var notHit=0;
function init()
{
    monkey_01 = document.getElementById('monkey_01');
    output=document.getElementById('output');
    
    //gameTimer = setInterval(gameloop, 50);
   
    placeMonkey();
    document.getElementById('hit').innerHTML = notHit;
    document.getElementById('miss').innerHTML = numHits;
}

function placeMonkey()
{
    var x= Math.floor(Math.random()*421);
    monkey_01.style.left=x+'px';
    monkey_01.style.top= '350px';
    
}
/*
function gameloop()
{
   var y = parseInt(monkey_01.style.top)-10;
    if(y<-100)
    {
        notHit++;
        if(notHit==5)
        {
            alert("You Lose!");
            clearInterval(gameTimer);
           
        }
        document.getElementById('miss').innerHTML = notHit;
        placeMonkey();
        
    }
    else
    {
        monkey_01.style.top = y+'px';
    }
    //$(monkey_01).animate({bottom:'500px'});
}

function hitMonkey()
{
    numHits+=1;
    if(numHits==3)
    {
        alert("You Win!!");
        clearInterval(gameTimer);
    }
    document.getElementById('hit').innerHTML= numHits;
    placeMonkey();
    
}*/


