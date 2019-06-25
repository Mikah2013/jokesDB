//complete code for js/editor.js

function checkJoketext (event) {
    var joketext = document.querySelector("input[name='joketext']");
    var warning = document.querySelector("form #joketext-warning");
    var submission = document.querySelector("form #editor-message");
    //if joketext is empty...
    if (joketext.value === "") {
        //preventDefault, ie don't submit the form
        event.preventDefault();
        //display a warning
        warning.innerHTML = "*You must write a Joke for the before saving";

    }
}

function init(){
    var editorForm = document.querySelector("form#editor");
    var joketext = document.querySelector("input[name='joketext']");
    joketext.required = false;
    editorForm.addEventListener("submit", checkJoketext, false);
}

document.addEventListener("DOMContentLoaded", init, false);