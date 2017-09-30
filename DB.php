<?php
class DB{
	var $query;
	var $con;
	function __construct($db_name){
		$this->con=mysqli_connect('localhost','root','',$db_name) or die(mysqli_error($con));
	}
	function execute($query){
		$this->query=$query;
		$result=mysqli_query($this->con,$query) or die(mysqli_error($con));
		return $result;
	}
	function getRow($query,$cols){
		$result=execute($query);
		$data=false;
		if($row=mysqli_fetch_array($result)){
			$i=0;
			while($i<$cols){
				$data[$i]=$row[$i];
				$i++;
			}
		}
		return $data;
	}
	function getColumn($query){
		$result=execute($query);
		$data=false;
		$i=0;
		while($row=mysqli_fetch_array($result)){
			$data[$i]=$row[0];
			$i++;
		}
		return $data;
	}
	function count($query){
		$result=execute($query);
		$i=0;
		while($row=mysqli_fetch_array($result)){
			$i++;
		}
		return $i;
	}
	function getTable($query,$cols){
		$result=execute($query);
		$counter=0;
		$data=false;
		while($row=mysqli_fetch_array($result)){
			for($j=0;$j<$cols;$j++){
				$data[$counter][$j]=$row[$j];
			}
			$counter++;
		}
		return $data;
	}
	function printTable($query,$table,$border){
	  $table=getTable($query,$cols);
	  $columns=getColumns($table);
	  $cols=count($columns);
	  $rows=count($table);
	  echo "<table border='$border'><tr>";
	  for($i=0;$i<$cols;$i++){
	  	echo "<th>".$columns[$i]."</th>";
	  }
	  echo "</tr>";
	  for($i=0;$i<$rows;$i++){
	  	echo "<tr>";
	  	for($j=0;$j<$cols;$j++){
	  		echo "<td>".$table[$i][$j]."</td>";
	  	}
	  	echo "</tr>";
	  }
	  echo "</table>";
	}
	function getColumns($table){
	$query="show columns from $table";
	$con=mysqli_connect('localhost','root','','cinema');
	$result=mysqli_query($con,$query) or die(mysqli_error($con));
	$data=false;
	while($row=mysqli_fetch_array($result)){
		$data=$row['Field'];
	}
	return $data;
}
}
?>