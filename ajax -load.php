<?php
include ('config/Config.php');
$sql    = "select * from user";
$result = mysqli_query($con,$sql) or die("Connection error");
$output = "";
if(mysqli_num_rows($result)>0){
	$output = "<table class='table table-striped'>
				<tr>
				<th>ENO</th>
				<th>EMPName</th>
				<th>country</th>
				<th>Salary</th>";
		foreach($result as $data){
			$output .="<tr><td>000{$data['id']}</td><td>{$data['name']}</td><td>{$data['country']}</td><td width='100px'>{$data['salary']}</td>";
		}
	$output .= "</table>";
	echo $output;
}else{
	echo"<h2 style='justify-content:center;display : flex;'>No Search result </h2>";
}
?>