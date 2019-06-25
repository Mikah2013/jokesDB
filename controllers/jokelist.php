<?php
//complete code for controllers/jokelist.php
include_once "models/Joke_Table.class.php";
$jokeTable = new Joke_Table( $db );
//$jokes is the PDOStatement returned from getAllJokes
$jokes = $jokeTable->getAllJokes();

$jokelistOutput = include_once "views/joke-list-html.php";
return $jokelistOutput;