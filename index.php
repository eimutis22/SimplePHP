<html>
    <head>
        <title>SimplePHP</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>

<?php 
    require("include.php");
?>

    <div id="wrap">
        <h3>Register</h3>
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>

            <input type="submit" value="Submit">
        </form>


        <?php 
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            setcookie("username", $username, time()+3600, "/","", 0);

            $pass_hash = password_hash($password, PASSWORD_DEFAULT);
            // echo "Username: ".$username."<br>Email: ".$email."<br>Hash: ".$pass_hash;

            echo "<hr>";



            InsertIntoDB($username, $email, $pass_hash);


            $sql = "SELECT ID FROM UserTbl WHERE Email = $email";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            echo "<hr>Result: ".$result."<br>Row: ".$row;


            function InsertIntoDB($u, $e, $p){
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    // echo $username;
                    $db_servername = "localhost";
                    $db_username = "root";
                    $db_password = "root";
                    $db_dbname = "GuestDB";
                    
                    // Create connection
                    $conn = new mysqli($db_servername, $db_username, $db_password, $db_dbname);
                    // Check connection
                    if ($conn->connect_error) 
                        die("Connection failed: ".$conn->connect_error);
                    
                    
                    $sql = "INSERT INTO UserTbl (ID, Username, Email, Password)
                            VALUES (2, '$u', '$e', '$p')";
                    
                    if ($conn->query($sql) === TRUE)
                        echo $u." registered!";
                    else 
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    
                    
                    $conn->close();
                }
            }
            





            # Database
            // function dbStuff(){
            //     $db_servername = "localhost";
            // $db_username = "root";
            // $db_password = "root";

            // // Create connection
            // $conn = new mysqli($db_servername, $db_username, $db_password);
            // $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

            // if($_SERVER["REQUEST_METHOD"] == "POST") {
            //     echo "POST Start";
            //     // username and password sent from form 
                
            //     $myusername = mysqli_real_escape_string($db,$_POST['username']);
            //     $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
                
            //     // $sql = "SELECT ID FROM UserTbl WHERE Username = '$myusername' and Password = '$mypassword'";
            //     // $result = mysqli_query($db, $sql);
            //     // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            //     // $active = $row['active'];
                
            //     // $count = mysqli_num_rows($result);
                
            //     // If result matched $myusername and $mypassword, table row must be 1 row
                  
            //     // if($count == 1) {
            //     //    session_register("myusername");
            //     //    $_SESSION['login_user'] = $myusername;
                   
            //     //    header("location: welcome.php");
            //     // }
            //     // else
            //     //    $error = "Your Login Name or Password is invalid";
                


            //     # Insert into DB
            //     $sql = "INSERT INTO UserTbl (ID, Username, Email, Password)
            //             VALUES (2, $username, $email, $password)";
                
            //     mysql_select_db('GuestDB');
            //     $retval = mysql_query($sql, $conn);
                
            //     if(!$retval)
            //         die('Could not enter data: '.mysql_error());
                
                
            //     echo "Entered data successfully\n";
            //  }
            //  else
            //     echo "REQUEST_METHOD != POST <br>";

            
            // // Check connection
            // if ($conn->connect_error) 
            //     die("Connection failed: " . $conn->connect_error);
            

            // echo "Connected successfully";
            // }
            
            
        ?>

    </div>


    </body>
</html>


