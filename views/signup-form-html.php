<?php
//complete code for views/signup-form-html.php
if( isset($authorFormMessage) === false ) {
$authorFormMessage = "";
}
return "<main><form action='index.php?page=signup' method='post'>
<label for='email'>Your email address</label>
<input name='email' id='email' type='text' required>
<label for='name'>Your name</label>
<input name='name' id='name' type='text' required>
<label for='password'>Password</label>
<input name='password' id='password' type='password' required>
<input type='submit' name='new-author' value='Register account'>
<p id='admin-form-message'>$authorFormMessage</p>
</form></main>
";