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
    
    gameTimer = setInterval(gameloop, 50);
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
    
}