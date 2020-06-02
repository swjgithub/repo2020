<?php
/**
 * 数据库连接类的创建
 */
class Conn
{
	private $host;
	private $username;
	private $password;
	private $charset;
	private $dbname;
	public function __contruct($host,$username,$password,$dbname,$charset='utf8'){
		$this->host=$host;
		$this->username=$username;
		$this->password=$password;
		$this->dbname=$dbname;
		$this->charset=$charset;
	}
	public function getConn(){
		$connId=mysqli_connect($this->host,$this->username,$this->password);
		mysqli_select_db($connId,$this->dbname);
		mysqli_query($connId,'set names '.$this->charset);
		return $connId;
	}
}
