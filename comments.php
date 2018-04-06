<head>
    <link rel="stylesheet" href="style.css">
</head>
<form action="comments.php" method="POST">
    <input type="text" name="comment" placeholder="Comment..">
    <input type="submit" value="Submit Comment">
</form>


<?php
    session_start();
    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "root";
    $db_dbname = "GuestDB";

    $conn = new mysqli($db_servername, $db_username, $db_password, $db_dbname);

    if($_REQUEST['comment'] != null) {

        // Check connection
        if ($conn->connect_error) 
            die("Connection failed: ".$conn->connect_error);

        $comment = $_REQUEST['comment'];
        $commentID = rand(2,99999);

        $sql = "INSERT INTO CommentTbl (ID, Comment)
                VALUES ($commentID, '$comment')";

        if ($conn->query($sql) === TRUE)
            echo $comment." added!";
        else 
            echo "Error: " . $sql . "<br>" . $conn->error;

        // $conn->close();
        unset($_REQUEST['comment']);
        unset($_POST["turnOver"]);
    }


    echo "<hr>";

    $sql = "SELECT * FROM CommentTbl";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
            echo "<div class='comment'>Comment: " . $row["Comment"]."</div>";
    }
    else
        echo "0 results";

    $conn->close();


?>