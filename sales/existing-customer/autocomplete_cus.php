<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
    include '../../include/connection.php';
 //***********************************************************************************************//
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM customer_details WHERE full_name LIKE ?";
    
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
                    $cus_info = array($row["full_name"],$row["address"],$row["phone_no"],$row["remarks"],$row["cus_id"]);
                    echo json_encode($cus_info);
                    //echo $row["address"];
                    //echo $row["id"];
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($con);
?>