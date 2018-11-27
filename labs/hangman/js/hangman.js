
//variables
var selectedWord="";
var selectedHint="";
var board=[];
var remainingGuesses=6;
var words = [{word:"snake", hint:"it's a reptile"},
            {word:"monkey", hint:"its a mammal"},
            {word:"beetle", hint:"it's an insect"}];
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

//listeners
window.onload = startGame();



//functions
function startGame()
{
    
    pickWord();
    initBoard();
    updateBoard();
    createLetters();
    showHint();
    
}

//picks a random word for the game from words array
function pickWord()
{
    var randomInt = Math.floor(Math.random()*words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

function initBoard()
{
    for (var letter in selectedWord)
    {
        board.push("_");
    }
}

function updateBoard()
{
    
    $("#word").empty();
    
    for(var i=0; i<board.length; i++)
    {
        $("#word").append(board[i] + " ");
    }
    
    $("#word").append("<br/>");
    //$("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
    /*for (var letter of board)
    {
        document.getElementById("word").innerHTML += letter + " ";
    }*/
}
//function to create letters in the letters div
function createLetters()
{
    for (var letter of alphabet)
    {
        $("#letters").append("<button class='letter' class= 'btn btn-success' id='" + letter + "'>" + letter +"</button>");
    }
    $(".letter").click(function()
                        {
                            checkLetter($(this).attr("id"));
                            disableButton($(this));
                            //console.log($(this).attr("id"));
                        }
    );
}

//show hint
//display hint on button click button
function showHint()
{
    $("#hint").append("<button class='hnt' class='btn btn-regular'> Hint </button>");
    $(".hnt").click(function()
                {
                    document.getElementById("hint").innerHTML=selectedHint;
                    remainingGuesses-=1;
                    updateMan();
                    remainingGuesses+=1;
                })
    //btn.prop("disable", true);
}


//checks to see if the selected letter is in the selected word
function checkLetter(letter)
{
    //console.log(letter);
    var positions = new Array();
    
    for (var i=0; i<selectedWord.length; i++)
    {   
        //console.log(selectedWord[i]);
        //console.log(selectedWord);
        if (letter == selectedWord[i])
        {
            positions.push(i);
        }
    }
    //console.log("the selected letter length in word is: "+positions.length);
    if (positions.length>=1)
    {
        updateWord(positions, letter);
        //check to see if this is a winning guess
        if(!board.includes('_'))
        {
            endGame(true);
        }
    }
    else
    {
        remainingGuesses-=1;
        updateMan();
    }
    if(remainingGuesses<=0)
    {
        endGame(false);
    }
}

//update the current word then calls for a board update
function updateWord(positions, letter)
{
    for(var pos of positions)
    {
        board[pos]=letter;
    }
    //checking
    for(var i=0; i<board.length; i++)
    
    {console.log(board[i]);}
    updateBoard();
}

//updates the hangman
function updateMan()
{
    $("#hangImg").attr("src", "img/stick_"+(6-remainingGuesses)+".png");
}

//ends the game by hiding game divs and displaying the win or loss divs
function endGame(win)
{
    $("#letters").hide();
    if(win)
    {
        $('#won').show();
    }
    else
    {
        $('#lost').show();
    }
    
    $(".replayBtn").on("click", function(){location.reload();});
}

//disables buttons
function disableButton()
{
    btn.prop("disabled", true);
    btn.attr("class","btn btn-danger");
}
