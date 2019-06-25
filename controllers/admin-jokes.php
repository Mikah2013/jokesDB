<?php
//complete source code for controllers/admin/jokes.php
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
//$author = new Author_User();
//get a PDOStatement object to get access to all jokes
$allJokes = $jokeTable->getAllMyJokes($auth->id);

$jokesCount = $jokeTable->totalJokesFromAnAuthor($auth->id);

$editorSubmitted = isset( $_POST['action'] );

if ( $editorSubmitted ) {
    $buttonClicked = $_POST['action'];
    $deleteJoke = ( $buttonClicked === 'Delete' );
    //new code: get the joke id from the hidden input in editor form
    $id = $_POST['id'];

    if ( $deleteJoke ) {

        $jokeTable->deleteJoke( $id );

        header('location: index.php?page=admin-jokes');
    }
}

$jokesAsHTML = include_once "views/admin/jokes-html.php";
return $jokesAsHTML;