<!DOCTYPE html>
<html>

<head>
    <title>Hej</title>
</head>

<body>
    <?php


    include("array.php");
    $cluster = Cassandra::cluster()->build();
    $keyspace = 'keyspace2';
    // creating session with cassandra scope by keyspace
    $session = $cluster->connect($keyspace);

    // verifying connection with database
    if (!$session) {
        echo "Error - Unable to connect to database";
    }
    $placeholder = $_POST['var1'];

    

    
        $time_start = microtime(true);

        // Cassandra Query
        $statement = new Cassandra\SimpleStatement(       
            "SELECT * FROM dota1 WHERE match_id = $match_id[$placeholder] "
        );
        // Waiting for query to finish
        $future    = $session->executeAsync($statement);
        $result    = $future->get();
        // Getting Time Result
        $ResultArray = iterator_to_array($result);
        $finalTime = (microtime(true) - $time_start);
        
    

    //foreach ($result as $row) {                       // results and rows implement Iterator, Countable and ArrayAccess
    //    printf("%s<br>", $row['barracks_status_dire']);
    //}

    ?>

    <script>
        var resultArray = <?php echo json_encode($ResultArray); ?>;
        var time = <?php echo json_encode($finalTime); ?>;
        localStorage.setItem("CassandraDBObject", JSON.stringify(resultArray));
        document.getElementById("CassandraResult").innerHTML += time+ ",";
    </script>
</body>

</html>