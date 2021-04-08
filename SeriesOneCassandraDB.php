<!DOCTYPE html>
<html>

<head>
    <title>Hej</title>
</head>

<body>
    <?php

    function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
    include("array.php");
    $cluster = Cassandra::cluster()->build();
    $keyspace = 'keyspace2';
    // creating session with cassandra scope by keyspace
    $session = $cluster->connect($keyspace);

    // verifying connection with database
    if (!$session) {
        echo "Error - Unable to connect to database";
    }


    $timeArray = [];

    for ($i = 0; $i < count($match_id); $i++){
        $time_start = microtime_float();

        // Cassandra Query
        $statement = new Cassandra\SimpleStatement(       
            "SELECT * FROM dota1 WHERE match_id = $match_id[$i] "
        );
        // Waiting for query to finish
        $future    = $session->executeAsync($statement);
        $result    = $future->get();
        // Getting Time Result
        $time_end = microtime_float();
        $time = $time_end - $time_start;
        array_push($timeArray, $time);
    }

    foreach ($result as $row) {                       // results and rows implement Iterator, Countable and ArrayAccess
        printf("%s<br>", $row['barracks_status_dire']);
    }

    ?>

    <p id=test></p>;

    <script>
        let test = <?php echo json_encode($timeArray); ?>;
        console.log(test);
        document.getElementById("test").innerHTML += test;
    </script>
</body>

</html>