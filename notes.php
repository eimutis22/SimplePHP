<?php
    setcookie("name", "John Watkin", time()+3600, "/","", 0);
    session_start();

    # Constants
    define("MY_CONSTANT", "Hello world!");
    echo MY_CONSTANT; 
    echo constant("MY_CONSTANT");


    # Day
    $d = date("D");
    echo $d;


    # Arrays - For - Foreach
    # Simple
    $simpleArr = array(1,2,3,4);
    $i; 
    echo "<br>";
    for($i = 0; $i < count($simpleArr); $i++) 
        echo "Num: ".$simpleArr[$i];

    foreach($simpleArr as $x)
        echo "Foreach: ".$x;


    # Complex
    $complexArr = array(
        "One" => [1,11],
        "Two" => [2,22]
    );

    echo "<br>".$complexArr["One"][1];
    $complexArr["One"][1] = "Hey";
    echo "<br>".$complexArr["One"][1];


    # Strings
    $name = "Jimmy Smith";
    $myNameIs = 'My name $name will not be printed.';
    print($myNameIs);
    
    $myNameIs = "My name is $name!";
    print($myNameIs);

    strlen($name); # String length
    strpos($name, "Smith"); # Starting position of "Smith"

    echo "<hr>";


    # Cookies
    if(isset($_COOKIE["name"]))
        echo "Name: ".$_COOKIE["name"];
    else
        echo "Who are you?";

    echo "<hr>";



    # Sessions   
    if( isset( $_SESSION['counter'] ) ) {
       $_SESSION['counter'] += 1;
    }else {
       $_SESSION['counter'] = 1;
    }
    echo "Session: ".$_SESSION['counter']."<br>";


    # Get Platform
    echo getBrowser();
    function getBrowser(){
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $platform = "Unknown";
        
        if (preg_match('/linux/i', $u_agent)) 
            $platform = 'Linux';
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) 
            $platform = 'Mac';
        elseif (preg_match('/windows|win32/i', $u_agent))
            $platform = 'Windows';
        
        return $platform;
    }
?>