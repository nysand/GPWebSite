<?php
$servername = "localhost";
$username = "toxic";
$password = "sysop2018";
$dbname = "oversurgery";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE register (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(11) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(11) NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New table created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>