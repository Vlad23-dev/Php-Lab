<?php
	include "factorial.php";

	echo "<p>Hello World!</p>";
	echo "2 + 2 = " . (2 + 2) . "<br>";	

	$a = 10;
	echo $a . "<br>";

	$A = $a;

	if(isset($A)){
		echo $A . "<br />";
		unset($A);
		if($A){
			echo "$A<br />";
		}
		else{
			echo "Undefined<br />";
		}
	}
	else{
		echo "Undefined <br />";
	}

	$str_mass = array("num" => 'abc', "number" => "232");
	if(is_array(str_mass)){
		settype($str_mass[number], "integer");
		echo $str_mass[number];
	}

	foreach ($str_mass as $key => $value) {
		echo "$key => $value <br />";
	}

	$str_mass2 = compact('qwerty', '123', 'fhfg123');
	print_r($data);

	define("NUMBER6", 23);
	echo NUMBER6 . "<br>";

	echo "String " . __LINE__ . " in file: " . __FILE__ . "<br />";

	$num1 = "23a";
	$num2 = 23;

	if($num1 == $num2){
		echo "it's ==" . "<br />";
	}else{
		echo "error" . "<br />";
	}

	if($num1 === $num2){
		echo "error" . "<br />";	
	}else{
		echo "it's ===" . "<br />";
	}

	function do_squere(&$num4){
		$num4 *= $num4;
	}

	$num5 = 5;
	do_squere($num5);
	echo $num5;

	echo "i'm here";
	$num7 = 5;
	$fact = getFactorial($num7);	
	echo "<br> Factorial 5 is $fact <br>";
?>
