<!DOCTYPE html>
<html>
<meta charset="utf-8">

<head>
    <title>Hej</title>
</head>

<body>
    <?php
    include("array.php");

    require 'vendor/autoload.php';
    $connection = new MongoDB\Client("mongodb://localhost:27017");
    $db = $connection->Dota2015->seriesfour;

    $index = (int)$_POST['var1'];
    // Start performance loop
    $time_start = microtime(true);


    // Search in mongoDB
    $result = $db->find(

        array(
            'match_id' => $match_id[$_POST['var1']]
        ),
        array(
            'projection' => array('chat' => array( '$slice' => 1))
        )
    );

    // Create PHP Object From result findings
    if(isset($result)){
        $ResultArray = iterator_to_array($result);
    }
    else {
        $ResultArray = "Failed Query There was No Match for this query";
    }
    // Get time from search
    $finalTime = (microtime(true) - $time_start);
    ?>

    <script>
        var resultArray = <?php echo json_encode($ResultArray); ?>;
        var time = <?php echo json_encode($finalTime); ?>;
        localStorage.setItem("MongoDBObject", JSON.stringify(resultArray));
        document.getElementById("MongoDBResult").innerHTML += time+ ",";
    </script>
</body>

</html>