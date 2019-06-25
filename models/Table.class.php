<?php
//complete code for models/Table.class.php
class Table {
    //notice protected, not private
    protected $db;

    public function __construct ( $db ) {
        $this->db = $db;
    }

    protected function makeStatement ( $SQL, $data = NULL) {
        //create a PDOStatement object
        $statement = $this->db->prepare( $SQL );
        try{
            //use the dynamic data and run the query
            $statement->execute( $data );        
        } catch (Exception $e) {            
            $exceptionMessage = "<p>You tried to run this sql: $SQL <p>
            <p>Exception: $e</p>";
            trigger_error($exceptionMessage);
        }
        //return the PDOStatement object
        return $statement;
    }
}

