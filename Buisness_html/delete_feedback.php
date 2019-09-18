<?php

/********************************************************************/
/*  Date	Name	Description                                 */
/*  --------------------------------------------------------------- */
/*                                                                  */
/*  9/8/2019  David Verbeck   Drops table when "delete" is pressed. */
/********************************************************************/
// Get IDs
$feedID = filter_input(INPUT_POST, 'feedID', FILTER_VALIDATE_INT);

{
$dsn = 'mysql:host=localhost;dbname=dave_buisnessdb';
            $username = 'root';
            $password = 'Pa$$w0rd';

            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                /* include('database_error.php'); */
                echo "DB Error: " . $error_message; 
                exit();
            }
            
}
// Delete the feedback from the database
if ($feedID != false) {
    $query = 'DELETE FROM contact
              WHERE feedID = :feedID';
    $statement = $db->prepare($query);
    $statement->bindValue(':feedID', $feedID);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the admin page
include('Admin.php');