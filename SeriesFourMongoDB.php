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
    $db = $connection->Dota2015->Sample;

    $duration = (int)$_POST['var1'];
    $lobby_type = (int)$_POST['var2'];
    $radiant_win = $_POST['var3'] === 'true'? true: false;
    // Start performance loop
    $time_start = microtime(true);


    // Search in mongoDB
    $result = $db->findOne(array('duration' => $duration, 'lobby_type' => $lobby_type, 'radiant_win' => $radiant_win));

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