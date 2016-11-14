<?php 

$foo = false;

if($foo && $bar)
{
	echo "faux";
}else{

	echo "vrai";

}


if($bar && $foo)
{
	echo "faux";
}else{

	echo "vrai";

}