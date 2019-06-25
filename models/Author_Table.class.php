<?php
//complete code listing for models/Joke_Table.class.php
include_once "models/Table.class.php";
class Author_Table extends Table {
    
    public function saveAuthor (  $email, $name, $password ) {
        $this->checkEmail( $email );
        $SQL = "INSERT INTO author (  email, name, password ) VALUES ( ?, ?, MD5(?) )";
        $formData = array( $email,  $name, $password );
        $entryStatement = $this->makeStatement( $SQL, $formData );

        //return the id of the saved author
        return $this->db->lastInsertId();   
    }

    public function getAllAuthors () {
        $SQL = "SELECT id, email, name, password, date_created FROM author ORDER BY date_created DESC";
        $statement = $this->makeStatement($SQL);
        return $statement;
    }

    public function getAuthor( $id ) {
        $SQL = "SELECT id, email, name, password, date_created FROM author WHERE id = ?";
        $data = array( $id );
        $statement = $this->makeStatement($SQL, $data);
        $model = $statement->fetchObject();
        return $model;    
    }

    public function getEditingAuthor( $email ) {
        $SQL = "SELECT id, email FROM author WHERE email = ?";
        $data = array( $email  );
        $statement = $this->makeStatement($SQL, $data);
        return $statement;    
    }

    public function deleteAuthor ( $id ) {
        $SQL = "DELETE FROM author WHERE id = ?";
        $data = array( $id );
        $statement = $this->makeStatement( $SQL, $data );
    }

    
    public function updateAuthor ( $id, $email, $name, $password ) {
        $SQL = "UPDATE author SET  email = ?, name = ?, password = ? WHERE id = ?";
        $data = array(  $email, $name, $password, $id );
        $statement = $this->makeStatement( $SQL, $data) ;
        return $statement;
    }

    public function totalAuthor() {
        $SQL = "SELECT COUNT(*) FROM author";
        $statement = $this->makeStatement($SQL);
        $row = $statement->fetch();
        return $row[0];
    }

    private function checkEmail ($email) {
        $SQL = "SELECT email FROM author WHERE email = ?";
        $data = array( $email );
        $this->makeStatement( $SQL, $data );
        $statement = $this->makeStatement($SQL, $data );
        //if a user with that e-mail is found in database
        if ( $statement->rowCount() === 1 ) {
            //throw an exception > do NOT create new author
            $e = new Exception("Error: '$email' already used!");
            throw $e;
        }

    }

    public function checkCredentials ( $email, $password ){
        $SQL = "SELECT email FROM author WHERE email = ? AND password = MD5(?)";
        $data = array($email, $password);
        $statement = $this->makeStatement( $SQL, $data );
        if ( $statement->rowCount() === 1 ) {
            $out = true;
        } else {
            $loginProblem = new Exception( "login failed!" );
            throw $loginProblem;
        }
        return $out;
    }

    public function confirmCredentials ( $email, $password ){
        $SQL = "SELECT email FROM author WHERE email = ? AND password = MD5(?)";
        $data = array($email, $password);
        $statement = $this->makeStatement( $SQL, $data );
        return $statement;
    }
}