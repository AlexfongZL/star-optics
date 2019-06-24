<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
    include '../include/connection.php';
 //***********************************************************************************************//
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM inventory WHERE prod_id LIKE ?";

    if($stmt = mysqli_prepare($con, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["term"] . '%';

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p class='search-result-inv' value='". $row["prod_id"] . "' style='color:black;padding:10px 10px;text-decoration:none;display:block'>" . $row["prod_id"] . "</p>";
                }
            }
            /*else{
                echo "<p>No matches found</p>";
            }*/
        } else{
            echo "ERROR: Could not execute sql. " . mysqli_error($con);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($con);
?>