<?php
    
    $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $database = "socm";

        // Create connection
            $con = mysqli_connect($servername,$username,$password,$database)
                    or trigger_error(mysqli_error(), E_USER_ERROR);

            if (mysqli_connect_errno())
              {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                $_SESSION['error'] = "Failed to connect to MySQL. Check your internet connection.";
                session_destroy();
                exit;     
              }
    
?>