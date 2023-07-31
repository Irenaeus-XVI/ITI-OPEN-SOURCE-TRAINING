<?php

//1
$text = "ehab" . PHP_EOL . "tarek";
echo nl2br($text) . "<br> <br> <br>";
?>

<?php
//3
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
?>

<?php
//4
// Indexed array with values
$indexedArray = array(
    1 => 45,
    0 => 12,
    3 => 25,
    2 => 10
);

//sort by key 
echo "sort by key";
ksort($indexedArray);
echo "<pre>";
print_r($indexedArray);
echo "</pre>";

// sum of the array 
$sum = array_sum($indexedArray);
echo "SUM = $sum <br> ";

// avg of the array 
$avg = $sum / count($indexedArray);
echo "AVERAGE  = $avg <br> <br>";

// "Sorted (highest to lowest):<pre>"
echo "Sorted (highest to lowest):<pre>";
rsort($indexedArray);
print_r($indexedArray);
?>


<?php

//5-  Write a PHP script to sort the following associative array :

$arr = array("Sara"=>"31","John"=>"41","Walaa"=>"39","Ramy"=>"40");
//a) ascending order sort by value

echo " ascending order sort by value";

asort($arr);

print_r($arr);

//b) ascending order sort by Key

echo " ascending order sort by Key";

ksort($arr);
print_r($arr);



//c) descending order sorting by Value

echo "descending order sorting by Value";

arsort($arr);
print_r($arr);

//d) descending order sorting by Key  

echo "descending order sorting by Key  ";
krsort($arr);
print_r($arr);
?>
