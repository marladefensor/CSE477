function hangman() {
    // Pick a random word
    var word = randomWord();
    console.log(word);

    // Make a "guess" string with underbars
    // where each letter will go. We will fill
    // this in with letters as we find them.
    var guess = '';
    for (var i = 0; i < word.length; i++) {
        guess += '_';
    }

    // The HTML for the page
    var html = '<p id="image"><img id="man" width="125" height="300" src="images/hm0.png"></p>';
    var img = 0;
    var turns = 0;

    html += '<p id="guess"></p>';
    html += '<form>';
    html += '<input type="hidden" id="word" value="' + word + '">';
    html += '<p><label for="letter">Letter: </label><input type="text" id="letter"></p>';
    html += '<p><input type="submit" id="try" value="Guess!"> <input type="submit" id="new" value="New Game"> </p>';
    html += '<p id="message">&nbsp;</p>';
    html += '</form>';

    document.getElementById("play-area").innerHTML = html;


    setGuess(guess);

    document.getElementById("new").onclick = function (event) {
        event.preventDefault();
        img = 0;
        man.src = "images/hm0.png";
        turns = 0;
        word = randomWord();
        console.log(word);
        var newGuess = "";
        for (var a = 0; a < word.length; a++) {
            newGuess += '_';
        }
        setGuess(newGuess);
        document.getElementById("word").value = word;
        message.innerHTML = "";
    }


    document.getElementById("try").onclick = function (event) {
        event.preventDefault();
        var message = document.getElementById("message");
        var man = document.getElementById("man");
        var g = document.getElementById("guess");


        // Get the letter
        var input = document.getElementById("letter").value;
        console.log(input);

        if (input === "") {
            message.innerHTML = "You must enter a letter!";
        } else if (input.length > 1) {
            message.innerHTML = "Longer than one letter!";
        } else {
            message.innerHTML = "";
            var guessing = "";
            for (var i = 0; i < word.length; i++) {
                var char = word.charAt(i);
                if (char === input) {
                    guessing += input + ' ';
                }
                else if(g.innerHTML.indexOf(char) !== -1){
                    guessing += char + ' ';
                }
                else {
                    guessing += '_ ';
                }
            }
            document.getElementById("guess").innerHTML = guessing;
            // If the letter isn't found in the word
            if (word.indexOf(input) === -1) {

                turns++;
                img++;
                // Too many wrong guesses, you lost!
                if (turns=== 6 && img === 6) {
                    message.innerHTML = "You guessed poorly!";
                    man.src = "images/hm6.png";
                    var complete = "";
                    for (var j = 0; j < word.length; j++) {
                        complete += word.charAt(j) + ' ';
                    }
                    g.innerHTML = complete;
                }
                man.src = "images/hm" + img + ".png";
            } else {
                var final = "";
                for (var k = 0; k < guessing.length; k++) {
                    if (guessing.charAt(k) !== " ") {
                        final += guessing.charAt(k);
                    }
                }
                if (final === word) {
                    message.innerHTML = "You Win!";
                }
            }
        }

    }
}


// Set the guess in the from
function setGuess(guess) {
    var g = '';
    for(var i=0; i<guess.length; i++) {
        g += guess.charAt(i) + ' ';
    }

    document.getElementById("guess").innerHTML = g;
}


function randomWord() {
    var words = ["moon","home","mega","blue","send","frog","book","hair","late",
        "club","bold","lion","sand","pong","army","baby","baby","bank","bird","bomb","book",
        "boss","bowl","cave","desk","drum","dung","ears","eyes","film","fire","foot","fork",
        "game","gate","girl","hose","junk","maze","meat","milk","mist","nail","navy","ring",
        "rock","roof","room","rope","salt","ship","shop","star","worm","zone","cloud",
        "water","chair","cords","final","uncle","tight","hydro","evily","gamer","juice",
        "table","media","world","magic","crust","toast","adult","album","apple",
        "bible","bible","brain","chair","chief","child","clock","clown","comet","cycle",
        "dress","drill","drink","earth","fruit","horse","knife","mouth","onion","pants",
        "plane","radar","rifle","robot","shoes","slave","snail","solid","spice","spoon",
        "sword","table","teeth","tiger","torch","train","water","woman","money","zebra",
        "pencil","school","hammer","window","banana","softly","bottle","tomato","prison",
        "loudly","guitar","soccer","racket","flying","smooth","purple","hunter","forest",
        "banana","bottle","bridge","button","carpet","carrot","chisel","church","church",
        "circle","circus","circus","coffee","eraser","family","finger","flower","fungus",
        "garden","gloves","grapes","guitar","hammer","insect","liquid","magnet","meteor",
        "needle","pebble","pepper","pillow","planet","pocket","potato","prison","record",
        "rocket","saddle","school","shower","sphere","spiral","square","toilet","tongue",
        "tunnel","vacuum","weapon","window","sausage","blubber","network","walking","musical",
        "penguin","teacher","website","awesome","attatch","zooming","falling","moniter",
        "captain","bonding","shaving","desktop","flipper","monster","comment","element",
        "airport","balloon","bathtub","compass","crystal","diamond","feather","freeway",
        "highway","kitchen","library","monster","perfume","printer","pyramid","rainbow",
        "stomach","torpedo","vampire","vulture"];

    return words[Math.floor(Math.random() * words.length)];
}

function guesser() {

    document.getElementById("form").onsubmit = function (event) {
        event.preventDefault();
        var y = Math.floor(Math.random() * 100) + 1;

        var x = document.getElementById("guess").value;
        console.log(x);
        var giveup = document.getElementById("giveup");
        var result = document.getElementById("result");

        if (x === "") {
            result.innerHTML = "Silly you, enter a number!";
        } else {
            if (x === y) {
                result.innerHTML = "You're a winner!";
            } else if (x < y) {
                result.innerHTML = "Too low!";
            } else {
                result.innerHTML = "Too high!";
            }


            giveup.onclick = function () {
                event.preventDefault();
                result.innerHTML = "The number was " + y + ", dood. It's not that hard.";
            }
        }
    }
}