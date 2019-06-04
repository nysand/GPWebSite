 <?php

 
        
        // function selectAllWithFetch($result){
        //     // create the table
        //     //print("<table border='7'>");
            
        //     // add the rows to the table
        //     while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                
        //         //add a row
        //         //print ("<tr>");
                
        //         //print a cell
        //         //print ("$row[first_name]");
        //         //print ("<td> $row[last_name] </td>");
        //         //print ("<td>$row[gender] </td>");
        //         //print ("<td>$row[dob] </td>");
        //         //print ("<td>$row[address] </td>");
        //         //print ("<td>$row[tel_number] </td>");
        //         //print ("<td>$row[email] </td>");
        //         //            print ("<td> $row[username] </td>");
        //         //close row
        //         //print ("</tr>");
                
        //     }
            
        //     //close table
        //     //print ("</table");
            
        // }
        
        // function selectWithFetchAll($result) {
        //     print("<pre>");
        //     print_r($result->fetchAll(PDO::FETCH_ASSOC));
        //     print("</pre>");
            
            
        // }
        
        /* Main body */
        
       // print_r(PDO::getAvailableDrivers());
        
        //connect to the DB
        $dsn = 'mysql:host=localhost;dbname=oversurgery';
        $user = 'toxic';
        $password = 'sysop2018';
        
        try {
            $db = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
               die('Sorry, database problem');
        }
       
        // create a query
        //$query = "SELECT first_name FROM profile WHERE id='25'";

        $sql= "SELECT first_name FROM profile WHERE id='22'";
        $stmt = $db->query($sql); 
        $row =$stmt->fetchObject();
        echo $row->first_name;
        
        
        //send the query to the db
        //$result = $db->query($query);
        
       // selectWithFetchAll($result);
       //selectAllWithFetch($result);
        
    
    ?>