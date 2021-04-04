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
        $mongoId = 1020;


        //var_dump($result);
        $print = $db->find([]);
        echo '<pre>' , var_dump($print) , '</pre>';
        //$query = array('match_id' =>2001400694);
        



    ?>
</body>
</html>