<?php
//complete code for views/joke-list-html.php
$jokesFound = isset( $jokes );
if ( $jokesFound === false ) {
    trigger_error( 'views/joke-list-html.php needs $jokes' );
}
//create a <ul> element
$jokesHTML = "<main><ul id='joke-entries'>";
//loop through all $jokes from the database
//remember each one row temporarily as $joke
//$entry will be a StdClass object with id, joketext and date_created
while ( $joke = $jokes->fetchObject() ) {
    $href = "index.php?page=jokelist&amp;id=$joke->id";

    //create an <li> for each of the jokes
    $jokesHTML .= "<li>
    <blockquote>
    <p>$joke->joketext ( by $joke->name ) Created On: $joke->date_created </p>
    </blockquote>
    </li>";
}
//end the <ul>
$jokesHTML .= "</ul></main>";
return $jokesHTML;