<?php
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


    

?>