<?php
include ('config/Config.php');
$search_val = $_POST['search'];
$sql    = "select * from user where name like '%$search_val%' or country like '%$search_val%' or salary like '%$search_val%' ";
$result = mysqli_query($con,$sql) or die("No data found");
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