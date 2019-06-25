<?php
//complete code for views/admin/jokes-html.php
if( isset( $allJokes ) === false || isset( $jokesCount ) === false ) {
    trigger_error('views/admin/jokes-html.php needs $allJokes and $jokesCount');
}

$jokesAsHTML = "<main><p>You have $jokesCount submitted to the Joke Database. You are signed in as $email </p>
                <ul id='joke-entries'>";
while ( $joke = $allJokes->fetchObject() ) {
    //notice two URL variables are encoded in the href
    $href = "index.php?page=admin-editor&amp;id=$joke->id";
    $jokesAsHTML .= "<li><blockquote>
    <p>$joke->joketext <a href='$href'>Edit</a>
    <form action='index.php?page=admin-jokes' method='post'>
      <input type='hidden' name='id' value='$joke->id'>
      <input type='submit' name='action' value='Delete'>
    </form></p>
    </blockquote></li>";
}
$jokesAsHTML .= "</ul></main>";
return $jokesAsHTML;
