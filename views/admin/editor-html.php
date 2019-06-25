<?php
//complete source code for views/admin/editor-html.php
$jokeDataFound = isset( $jokeData );
if( $jokeDataFound === false ){
//default values for an empty editor
$jokeData = new StdClass();
$jokeData->id = 0;
$jokeData->joketext = "";
$jokeData->message = "";

}

return "<main><p> You are signed in as $email.</p>
<form action='index.php?page=admin-editor' method='post' id='editor'>
   <input type='hidden' name='id' value='$jokeData->id' />
   <label for='joketext'>Type your joke here:</label>
   <textarea id='joketext' name='joketext' rows='3' cols='40' required >$jokeData->joketext</textarea>
   <p id='joketext-warning'></p>
   <input type='submit' name='action' value='Save' />
   <p id='editor-message'>$jokeData->message</p>
</form></main>";