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
    $time_start = microtime(true);
    $placeholder = $_POST['var1'];
    
    // Cassandra Query

    $statement = new Cassandra\SimpleStatement(
        "SELECT chat FROM dota4 WHERE match_id = $match_id[$placeholder] "
    );

    // Waiting for query to finish
    $future    = $session->executeAsync($statement);
    $result    = $future->get();

    // Getting Time Result
    if (isset($result)) {
        $ResultArray = iterator_to_array($result);
    } else {
        $ResultArray = "Failed Query There was No Match for this query";
    }
    
    $finalTime = (microtime(true) - $time_start);


    ?>

    <script>
        var resultArray = <?php echo json_encode($ResultArray); ?>;
        var time = <?php echo json_encode($finalTime); ?>;
        localStorage.setItem("CassandraDBObject", JSON.stringify(resultArray));
        document.getElementById("CassandraResult").innerHTML += time + ",";
    </script>
</body>

</html>