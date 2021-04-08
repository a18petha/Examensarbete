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
    for($i = 0; $i < count($match_id); $i++){
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
        $time_end = microtime_float();
        $time = $time_end - $time_start;
        array_push($timeArray, $time);

    }
    



    ?>

    <p id=test></p>

    <script>
        let test = <?php echo json_encode($timeArray); ?>;
        document.getElementById("test").innerHTML = test;
    </script>
</body>

</html>