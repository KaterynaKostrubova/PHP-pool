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


if ($argc != 4 || (trim($argv[2]) != "*" &&
	trim($argv[2]) != "/" &&
	trim($argv[2]) != "+" &&
	trim($argv[2]) != "-" &&
	trim($argv[2]) != "%"))
{
	echo "Incorrect Parameters\n";
} else {
	if (trim($argv[2]) == "*") {
		ft_mul($argv[1], $argv[3]);
	}
	else if (trim($argv[2]) == "/"){
		ft_div($argv[1], $argv[3]);
	}
	if (trim($argv[2]) == "+"){
		ft_add($argv[1], $argv[3]);
	}
	else if (trim($argv[2]) == "-"){
		ft_sub($argv[1], $argv[3]);
	}
	else if (trim($argv[2]) == "%"){
		ft_mod($argv[1], $argv[3]);
	}
}
?>