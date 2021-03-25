<!DOCTYPE html>
<html>
<head>
	<title>Hej</title>
</head>
<body>
    <?php
        require 'vendor/autoload.php';
        $connection = new MongoDB\Client("mongodb://localhost:27017");
        $db = $connection->Dota2015->Sample;
        $mongoId = "60008628c2bc544a88239012";


        //var_dump($result);
        $print = $db->findOne(['_id'=> new MongoDB\BSON\ObjectId("$mongoId")]);
        echo '<pre>' , var_dump($print) , '</pre>';

        //$query = array('match_id' =>2001400694);
        



    ?>
</body>
</html>