<?php
//complete code for views/signin-form-html.php

if ($loginProblem === false) {
//admin.php?page=signout&amp;id=signout"
}

if ($email === false) {
//admin.php?page=signout&amp;id=signout"
}

return "<main>
<form method='post' action='index.php?page=signin'>
<p style='color:#ff0000'>$loginProblem $email</p>
<label for='email'>Your email address</label>
<input type='text' id='email' name='email'>
<label for='password'>Your password</label>
<input type='password' id='password' name='password'>
<input type='submit' name='signin' value='Log in'>
</form>
<p>Don't have an account? <a href='index.php?page=signup'>Click here to register an account</a></p></main>
";