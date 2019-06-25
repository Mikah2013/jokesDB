<?php
//complete code for models/Author_as_User.class.php
class Author_User {

    //declare a new method, a constructor
    public function __construct(){
        //start a session
        session_start();
    }

    private $loggedIn = false;

    public function isLoggedIn(){
        $sessionIsSet = isset( $_SESSION['logged_in'] );
        $email = isset( $_SESSION['email'] );
        if ( $sessionIsSet ) {
            $out = $_SESSION['logged_in'];
            $out .= $_SESSION['email'];
        } else {
            $out = false;
        }
        return $out;
    }

    public function login () {
        $_SESSION['logged_in'] = true;
    }

    public function logout () {
        $_SESSION['logged_in'] = false;
        $this->destroySession();
    }

    private function destroySession() {
    $_SESSION=array();
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');
        session_destroy();
    }
}