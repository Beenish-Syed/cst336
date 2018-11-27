window.onload=moveButton();
function moveButton()
{
    document.getElementById("gameWindow").innerHTML=<button id='tricky'>Click Me!</button>;
    $('tricky').click(function()
    {
    $('tricky').animate({right: '200px'});
    });
}