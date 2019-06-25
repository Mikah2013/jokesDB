<?php
//complete source code for controllers/signup.php
include_once "models/Author_Table.class.php";
//is form submitted?
$createNewAuthor = isset( $_POST['new-author'] );
//if it is...
if( $createNewAuthor ) {
    //grab form input
    $newEmail = $_POST['email'];
    $newName = $_POST['name'];
    $newPassword = $_POST['password'];
    $authorTable = new Author_Table($db);
    try {
        //try to create a new author
        $authorTable->saveAuthor(  $newEmail, $newName, $newPassword );
        //tell author how it went
        $authorFormMessage = "New author created for $newEmail!";
    } catch ( Exception $e ) {
        //if operation failed, tell author what went wrong
        $authorFormMessage = $e->getMessage();
    }
}

$newSignUpForm = include_once "views/signup-form-html.php";
return $newSignUpForm;