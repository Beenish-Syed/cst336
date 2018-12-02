function move()
{
    var xCat=Math.floor(Math.random()*401);
    var yCat=Math.floor(Math.random()*201);
    var xDog=Math.floor(Math.random()*411);
    var yDog=Math.floor(Math.random()*201);
    /*alert('xCat= '+xCat);
    alert('xDog= '+xDog);*/
    document.getElementById('cat').style.left=xCat+'px';
    document.getElementById('cat').style.top=yCat+'px';
    document.getElementById('dog').style.left=xDog+'px';
    document.getElementById('dog').style.top=yDog+'px';
}