<?php
include ('config/Config.php');
if(isset($_POST['limit'])){
	$limit = $_POST['limit'];
}else{
	$limit =2;
}
$page   = ""; 
if(isset($_POST['page_no'])){
	$page = $_POST['page_no'];
}else{
	$page = 1;
}
$ofset = ($page-1)*$limit;
$sql    = "select * from user limit $ofset,$limit ";
$result = mysqli_query($con,$sql) or die("No data found");
$output = "";
if(mysqli_num_rows($result)>0){
	$output = "<table class='table table-striped'>
				<tr>
				<th>ENO</th>
				<th>EMPName</th>
				<th>Country</th>
				<th>Salary</th>";
		foreach($result as $data){
			$output .="<tr><td>{$data['id']}</td><td>{$data['name']}</td><td>{$data['country']}</td><td width='100px'>{$data['salary']}</td>";
		}
	$output .= '</table>';
	$sql_total = "select * from user";
	$records   = mysqli_query($con,$sql_total) or die("No data found");
	$total_records = mysqli_num_rows($records);
	$total_page = ceil($total_records/$limit);
	$output .='<div id="pagination">';
	for($i=1 ; $i<= $total_page ; $i++){
		if($i == $page){
			$class_name = "active";
		}else{
			$class_name = "";	
		}
	$output .="<a href='' id='{$i}' class='{$class_name}'>{$i}</a>";
	}
	$output .='</div>';
	echo $output;
}else{
	echo "No record found";
}
?>
