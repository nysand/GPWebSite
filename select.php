<?php



// create a query
$query = "SELECT * FROM profile";
//send the query to the db
$result = $db->query($query);
echo '<pre>',
print_r($result->fetchAll(PDO::FETCH_OBJ)),
'</pre>';


        /* Main body */

        //connect to the DB
        $dsn = 'mysql:host=localhost;dbname=oversurgery';
        $user = 'toxic';
        $password = 'sysop2018';

        try {
            $db = new PDO($dsn, $user, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            //           echo 'Connection failed: ' . $e->getMessage();
            die('Sorry, database problem');
        }
?>