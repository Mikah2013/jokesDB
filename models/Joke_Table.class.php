<?php
//complete code listing for models/Joke_Table.class.php
include_once "models/Table.class.php";
class Joke_Table extends Table {
    
    public function saveJoke ( $joketext, $author_id ) {
        $SQL = "INSERT INTO joke ( joketext, author_id ) VALUES ( ?, ? )";
        $formData = array( $joketext, $author_id );
        $entryStatement = $this->makeStatement( $SQL, $formData );
        //return the id of the saved joke
        return $this->db->lastInsertId();   
    }

    public function getAllJokes () {
        $SQL = "SELECT author.name, joke.id, joketext, author_id, joke.date_created FROM joke INNER JOIN author ON author_id = author.id ORDER BY joke.date_created DESC";
        $statement = $this->makeStatement($SQL);
        return $statement;
    }

    public function getAllMyJokes ( $author_id ) {
        $SQL = "SELECT id, joketext, author_id, date_created FROM joke WHERE author_id = ? ORDER BY date_created DESC";
        $formData = array($author_id);
        $statement = $this->makeStatement($SQL, $formData);
        return $statement;
    }

    public function getJoke( $id ) {
        $SQL = "SELECT id, joketext, date_created FROM joke WHERE id = ?";
        $data = array( $id );
        $statement = $this->makeStatement($SQL, $data);
        $model = $statement->fetchObject();
        return $model;    
    }

    public function deleteJoke ( $id ) {
        $SQL = "DELETE FROM joke WHERE id = ?";
        $data = array( $id );
        $statement = $this->makeStatement( $SQL, $data );
    }

    //declare new method
    public function updateJoke ( $id, $joketext) {
        $SQL = "UPDATE joke SET joketext = ? WHERE id = ?";
        $data = array( $joketext, $id );
        $statement = $this->makeStatement( $SQL, $data) ;
        return $statement;
    }

    public function totalJokes() {
        $SQL = "SELECT COUNT(*) FROM joke";
        $statement = $this->makeStatement($SQL);
        $row = $statement->fetch();
        return $row[0];
    }

    public function totalJokesFromAnAuthor($author_id) {
        $SQL = "SELECT COUNT(*) FROM joke WHERE author_id = ?";
        $formData = array($author_id);
        $statement = $this->makeStatement($SQL,$formData );
        $row = $statement->fetch();
        return $row[0];
    }

}