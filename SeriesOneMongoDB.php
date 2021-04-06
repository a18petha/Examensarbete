<!DOCTYPE html>
<html>
<meta charset="utf-8">

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

    require 'vendor/autoload.php';
    $connection = new MongoDB\Client("mongodb://localhost:27017");
    $time_start = microtime_float();
    $db = $connection->Dota2015->Sample;
    $mongodbArray = [];
    $match_idArray = [];

    $result = $db->find(
        [],
        [
            'limit' => 5,
            'skip' => 10000
        ]

    );

    foreach ($result as $document) {
        array_push($mongodbArray, $document['_id']);
        array_push($match_idArray, $document['match_id']);
    }
    $time_end = microtime_float();

    $time = $time_end - $time_start;

    var_dump($time);
    ?>

    <p id=test></p>
    <p id=arraytwo></p>

    <script>
        let test = <?php echo json_encode($mongodbArray); ?>;
        let array = <?php echo json_encode($match_idArray); ?>;
        let fixedarray = [];
        for (i = 0; i < test.length; i++) {
            let newstr;
            test[i] = JSON.stringify(test[i]);
            newstr = test[i].replace('{"$oid":"', '"');
            newstr = newstr.replace('"}', '"');
            fixedarray.push(newstr);
        }


        document.getElementById("arraytwo").innerHTML += array;
        document.getElementById("test").innerHTML = fixedarray;
    </script>
</body>

</html>