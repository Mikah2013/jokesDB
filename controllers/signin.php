<?php
//complete source code for controllers/signup.php
include_once "models/Author_Table.class.php";
//include_once "models/Author_as_User.class.php";
$signinFormSubmitted = isset( $_POST['signin'] );
$loginProblem = "";
//$email = "";

if( $signinFormSubmitted && $author) {    
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $authorTable = new Author_Table( $db );
    try {
        //try to login user
        //$author = new Author_User();
        $authorData = $authorTable->confirmCredentials( $email, $password );
        $author->login();
        $_SESSION['email'] = $email;
        header('location: index.php?page=admin-jokes');
        

    } catch ( Exception $e ) {

       $loginProblem = "Login Failed Your Email and Password do not match!";           
    }
    
}
$newSignInForm = include_once "views/signin-form-html.php";
return $newSignInForm;