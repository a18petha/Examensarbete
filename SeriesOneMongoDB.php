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

    //$mongodbArray = [];
    //$match_idArray = [];

    // Start performance loop
    $time_start = microtime(true);


    // Search in mongoDB
    $result = $db->find(
        [
            'match_id' => $match_id[$_POST['var1']]
        ]

    );
    // Create PHP Object From result findings
    $ResultArray = iterator_to_array($result);

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