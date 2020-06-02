
<?php
/**
 * __autoload()
 */
function __autoload($classname){
	require_once $classname.'.php';
}

$obj1=new My1();
$obj2=new My2();
print_r($obj1);
echo "<hr>";
print_r($obj2);

