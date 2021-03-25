<!DOCTYPE html>
<html>

<head>
    <title>Hej</title>
</head>

<body>
    <?php

        //require_once 'C:\xampp\htdocs\test\doc\Cassandra.php';

        $cluster = Cassandra::cluster()->build();

        $keyspace = 'dota';

        // creating session with cassandra scope by keyspace
        $session = $cluster->connect($keyspace);

        // verifying connection with database
        if(!$session) {
            echo "Error - Unable to connect to database";
        }
        $statement = new Cassandra\SimpleStatement(       // also supports prepared and batch statements
            'SELECT * FROM demo'
        );
        $future    = $session->executeAsync($statement);  // fully asynchronous and easy parallel execution
        $result    = $future->get();                      // wait for the result, with an optional timeout
        
        foreach ($result as $row) {                       // results and rows implement Iterator, Countable and ArrayAccess
            printf("The keyspace %s has a table called %s\n", $row['duration'], $row['match_id']);
        }


    //foreach($pdo->query( 'CALL GETAVGCOST();' ) as $row){
    //debug($row);
    //}
    //      $cnx = odbc_connect("DRIVER={CData ODBC Driver for Cassandra};Database=MyCassandraDB;Port=9042;Server=127.0.0.1;", "", "");


    ?>
</body>

</html>