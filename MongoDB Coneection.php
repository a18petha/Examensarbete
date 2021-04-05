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
        $mongodbArray = [];
        $match_idArray = [];

        $result = $db->find(
            [],
            [
                'limit' => 198,
                'skip' => 40491
            ]
            
        );

        foreach ($result as $document) {
            array_push($mongodbArray, $document['_id']);
            array_push($match_idArray, $document['match_id']);
        }

    ?>

<p id=test></p>
<p id=arraytwo></p>

<script>
    let test = <?php echo json_encode($mongodbArray); ?>;
    let array = <?php echo json_encode($match_idArray); ?>;
    let fixedarray = [];
    for(i = 0; i < test.length; i++ ){
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