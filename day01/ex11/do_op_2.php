#!/usr/bin/php
<?php 

function ft_add($a, $b)
{
	echo $a + $b . "\n";
}

function ft_sub($a, $b)
{
	echo $a - $b . "\n";
}

function ft_mul($a, $b)
{
	echo $a * $b . "\n";
}

function ft_div($a, $b)
{
	echo $a / $b . "\n";
}

function ft_mod($a, $b)
{
	echo $a % $b . "\n";
}

if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	return(0);
} else {
	$exp = trim($argv[1]);
	if (strpos($exp, "*"))
	{
		$arr = explode("*", $exp);
		$operand = "*";
	}
	else if (strpos($exp, "/"))
	{
		$arr = explode("/", $exp);
		$operand = "/";
	}
	else if (strpos($exp, "+"))
	{
		$arr = explode("+", $exp);
		$operand = "+";
	}
	else if (strpos($exp, "-"))
	{
		$arr = explode("-", $exp);
		$operand = "-";
	}
	else if (strpos($exp, "%"))
	{
		$arr = explode("%", $exp);
		$operand = "%";
	}
}

$a = trim($arr[0]);
$b = trim($arr[1]);

if (!(is_numeric($a)) || !(is_numeric($b)))
{
	echo "Syntax Error\n";
	return(0);
}

if ($operand == "*")
	ft_mul(trim($arr[0]), trim($arr[1]));
else if ($operand == "/")
	ft_div(trim($arr[0]), trim($arr[1]));
else if ($operand == "+")
	ft_add(trim($arr[0]), trim($arr[1]));
else if ($operand == "-")
	ft_sub(trim($arr[0]), trim($arr[1]));
else if ($operand == "%")
	ft_mod(trim($arr[0]), trim($arr[1]));

?>