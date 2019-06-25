<?php
//complete code for admin-signout.php
if ( $author ) {
$author->logout();
header("Location: index.php");
}






