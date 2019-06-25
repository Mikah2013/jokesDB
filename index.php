<?php
//complete code for index.php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
//session_start();
include_once "models/Page_Data.class.php";
include_once "models/Author_as_User.class.php";
include_once "database/database.php";
$author = new Author_User();
$pageData = new Page_Data();
$pageData->title = "Jokes Database";
$pageData->addCSS("css/jokes.css");

if ( $author->isLoggedIn() === FALSE) {
echo $email = isset($_SESSION['email']);

$pageData->content = include_once "views/navigation.php";
    $navigationIsClicked = isset( $_GET['page'] );
    if ( $navigationIsClicked ) {
        //prepare to load corresponding controller
        $contrl = $_GET['page'];
    } else {
        //prepare to load default controller
        $contrl = "jokelist";
    }
$pageData->content .=include_once "controllers/$contrl.php";
} else {
    $pageData->content = include_once "views/admin/admin-navigation.php";
    
    $navigationIsClicked = isset( $_GET['page'] );
    if ( $navigationIsClicked ) {
        //prepare to load corresponding controller
        $contrl = $_GET['page'];
    } else {
        //prepare to load default controller
        $contrl = "admin-jokes";
    }
    //load the controller
    $pageData->content .= include_once "controllers/$contrl.php";
}
$page = include_once "views/page.php";
echo $page;