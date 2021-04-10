<!DOCTYPE html>
<html>
<meta charset="utf-8">

<head>
    <title>Hej</title>
</head>

<body>
    <?php
    //function for getting time in milisec
    function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
    include("array.php");
    
    require 'vendor/autoload.php';
    $connection = new MongoDB\Client("mongodb://localhost:27017");
    
    $db = $connection->Dota2015->Sample;


    $timeArray = [];
    //$mongodbArray = [];
    //$match_idArray = [];

    // Start performance loop
    for($i = 0; $i < 1; $i++){
        $time_start = microtime_float();
        
        
        // Search in mongoDB
        $result = $db->find(
            [
                'match_id' => $match_id[$i]
            ]
    
        );
        // Gets some content from search, prob not needed
        //foreach ($result as $document) {
        //    array_push($mongodbArray, $document['_id']);
        //    array_push($match_idArray, $document['match_id']);
        //}
        $ResultArray = iterator_to_array($result);
        // Get time from search
        $time_end = microtime_float();
        $time = $time_end - $time_start;
        array_push($timeArray, $time);
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