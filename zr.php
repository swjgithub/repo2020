<?php

class Sword
{
	public function goAhead(){
		echo "冲锋:冲啊.....";
	}
}

class Soldier
{
	public $sword;  //士兵的武器
	public function __contruct(){
		$this->sword=new Sword();
	}
	public function fight(){
		$this->sword-goAhead();
	}
}

$s1=new Soldier();
$s2=new Soldier();
$s1->fight();
$s2->fight();

//////////////////////

class Sword
{
	public $length;
	public function __contruct($length){
		$this->length=$length;
	}
	public function goAhead(){
		echo "冲锋：冲啊....";
	}
}


class Soldier
{
	public $sword;
	public function __contruct($length){
		$this->sword=new Sword($length);
	}
	public function fight(){
		$this->sword->goAhead();
	}
}

$s1=new Soldier();
$s2=new Soldier();
$s1->fight();
$s2->fight();

///////////////////

class Sword
{
	public function goAhead(){
		echo "冲锋:冲啊.....";
	}
}

class Soldier
{
	public $sword;  //士兵的武器
	public function __contruct(Sword $sword){
		$this->sword=$sword;
	}
	public function fight(){
		$this->sword-goAhead();
	}
}

$s1=new Soldier();
$s2=new Soldier();
$s1->fight();
$s2->fight();