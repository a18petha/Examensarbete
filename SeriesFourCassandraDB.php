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
    $duration = (int)$_POST['var1'];
    $lobby_type = (int)$_POST['var2'];
    $radiant_win = $_POST['var3'] === 'true' ? true : false;  

    $time_start = microtime(true);

    // Cassandra Query
    if($radiant_win == true){
        $statement = new Cassandra\SimpleStatement(
            "SELECT * FROM dota3 WHERE duration = $duration AND lobby_type = $lobby_type AND radiant_win = true "
        );
    }
    else{
        $statement = new Cassandra\SimpleStatement(
            "SELECT * FROM dota3 WHERE duration = $duration AND lobby_type = $lobby_type AND radiant_win = false "
        );
    }
    // Waiting for query to finish
    $future    = $session->executeAsync($statement);
    $result    = $future->get();
    // Getting Time Result
    if(isset($result)){
        $ResultArray = iterator_to_array($result);
    }
    else {
        $ResultArray = "Failed Query There was No Match for this query";
    }
    $finalTime = (microtime(true) - $time_start);



    //foreach ($result as $row) {                       // results and rows implement Iterator, Countable and ArrayAccess
    //    printf("%s<br>", $row['barracks_status_dire']);
    //}

    ?>

    <script>
        var resultArray = <?php echo json_encode($ResultArray); ?>;
        var time = <?php echo json_encode($finalTime); ?>;
        localStorage.setItem("CassandraDBObject", JSON.stringify(resultArray));
        document.getElementById("CassandraResult").innerHTML += time + ",";
    </script>
</body>

</html>