<?php
//complete code for controllers/admin/editor.php
//include class definition and create an object
include_once "models/Joke_Table.class.php";
include_once "models/Author_Table.class.php";
if ( $author ) {

   $email = $_SESSION['email'];

}
$authorTable = new Author_Table($db);

$editingAuthor = $authorTable->getEditingAuthor($email);

$auth = $editingAuthor->fetchObject();

//echo $auth->id, $auth->email;

$jokeTable = new Joke_Table( $db );
//was editor form submitted?
$editorSubmitted = isset( $_POST['action'] );

if ( $editorSubmitted ) {

    $buttonClicked = $_POST['action'];
    
    $save = ( $buttonClicked === 'Save' );
    $id = $_POST['id'];

    $insertNewJoke = ( $save and $id === '0' );
    //was "save" button clicked
    //$insertJoke = ( $buttonClicked === 'Save' );
    $updateJoke = ( $save and $insertNewJoke === false );

    $joketext = $_POST['joketext'];

    if ( $insertNewJoke ) {
        //save the new joke
        $savedJokeId = $jokeTable->saveJoke( $joketext,  $auth->id  );
        
    } elseif ($updateJoke) {

        $jokeTable->updateJoke( $id, $joketext );
        $savedJokeId = $id;
    }
}


$jokeRequested = isset( $_GET['id'] );
//create a new if-statement
if ( $jokeRequested ) {
    $id = $_GET['id'];
    //load model of existing joke
    $jokeData = $jokeTable->getJoke( $id );
    $jokeData->id = $id;
    $jokeData->message = "";
}

//new code below: a joke was saved or updated
$jokeSaved = isset( $savedJokeId );
if ( $jokeSaved ) {
$jokeData = $jokeTable->getJoke( $savedJokeId );
//display a confirmation message
$jokeData->message = "Joke was saved";
}

//load relevant view
$editorOutput = include_once "views/admin/editor-html.php";
return $editorOutput;