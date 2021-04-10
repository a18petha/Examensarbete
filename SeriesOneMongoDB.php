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


    $timeArray = [];
    //$mongodbArray = [];
    //$match_idArray = [];

    // Start performance loop
    for($i = 0; $i < 1; $i++){
        $time_start = microtime(true);
        
        
        // Search in mongoDB
        $result = $db->find(
            [
                'match_id' => $match_id[$i]
            ]
    
        );
        // Create PHP Object From result findings
        $ResultArray = iterator_to_array($result);
        // Get time from search
        echo 'Total execution time in miliseconds: ' . (microtime(true) - $time_start);

    }
    



    ?>

    <p id=test></p>

    <script>
        var resultArray = <?php echo json_encode($ResultArray); ?>;
        var time = <?php echo json_encode($timeArray); ?>;
        localStorage.setItem("MongoDBObject", JSON.stringify(resultArray));
        document.getElementById("test").innerHTML = time;
    </script>
</body>

</html>