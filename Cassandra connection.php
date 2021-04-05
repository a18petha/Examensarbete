<!DOCTYPE html>
<html>

<head>
    <title>Hej</title>
</head>

<body>
    <?php

        //require_once 'C:\xampp\htdocs\test\doc\Cassandra.php';

        $cluster = Cassandra::cluster()->build();

        $keyspace = 'keyspace2';

        // creating session with cassandra scope by keyspace
        $session = $cluster->connect($keyspace);

        // verifying connection with database
        if(!$session) {
            echo "Error - Unable to connect to database";
        }
        $statement = new Cassandra\SimpleStatement(       // also supports prepared and batch statements
            'SELECT match_id, barracks_status_dire FROM dota1 WHERE barracks_status_dire >= 100 LIMIT 200 ALLOW FILTERING;'
        );
        $future    = $session->executeAsync($statement);  // fully asynchronous and easy parallel execution
        $result    = $future->get();                      // wait for the result, with an optional timeout
        echo '<pre>' , var_dump($result) , '</pre>';
        $array = [];
        foreach ($result as $row) {                       // results and rows implement Iterator, Countable and ArrayAccess
            array_push($array, $row['match_id']);
            printf("%s<br>", $row['barracks_status_dire']);
        }
        var_dump($array);



    //foreach($pdo->query( 'CALL GETAVGCOST();' ) as $row){
    //debug($row);
    //}
    //      $cnx = odbc_connect("DRIVER={CData ODBC Driver for Cassandra};Database=MyCassandraDB;Port=9042;Server=127.0.0.1;", "", "");


    ?>

    <p id=test></p>;

    <script>
        let test = <?php echo json_encode($array); ?>;
        console.log(test);
        document.getElementById("test").innerHTML += test;
    </script>
</body>

</html>