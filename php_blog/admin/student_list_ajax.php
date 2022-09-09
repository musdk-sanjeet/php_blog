<?php
include ("config/dbconf.php");

// $qry='';

// if(isset($_GET['make']) && $_GET['make']!='') {

// 	$qry.="AND vehicle.make_id='".$_GET['make']."'";
// }
// if(isset($_GET['model'])  && $_GET['model']!='') {

// 	$qry.="AND vehicle.model_id='".$_GET['model']."'";
// }

// if(isset($_GET['vehicle'])  && $_GET['vehicle']!='') {

// 	$qry.="AND vehicle.id='".$_GET['vehicle']."'";
// }




$totalVehicles = mysqli_query($con, "SELECT id FROM categories");

 $recordsFiltered = mysqli_query($con, "SELECT categories.*, id.id as id, name.name as name FROM categories LEFT JOIN make ON make.id=vehicle.make_id LEFT JOIN model ON model.id=vehicle.model_id where vehicle.download_status=1 and vehicle.status=1 $qry");

 if($_GET['length'] != -1) {
 $vehicleList = mysqli_query($con, "SELECT vehicle.*, make.make as make, model.model as model FROM vehicle LEFT JOIN make ON make.id=vehicle.make_id LEFT JOIN model ON model.id=vehicle.model_id where vehicle.download_status='1' and vehicle.status=1 $qry limit ".$_GET['start'].",".$_GET['length']."");

 } else {
 	$vehicleList = mysqli_query($con, "SELECT vehicle.*, make.make as make, model.model as model FROM vehicle LEFT JOIN make ON make.make=vehicle.make_id LEFT JOIN model ON model.model=vehicle.model_id where vehicle.download_status='1' and vehicle.status=1 $qry");
 }

$data=array();$i=$_GET['start'];
while($listData = mysqli_fetch_assoc($vehicleList)) { $i++;


	$ndata=array();
	$ndata[]=$i;
	$ndata[]=$listData['name'];
	$ndata[]=$listData['status'];
	
	
	$ndata[]='
	
	<a class="view btn btn-sm btn-danger" href="delete_vehicle_list.php?vehicle_id='.$listData['id'].'"><i class="fa fa-trash-o"></i></a>

	<a class="view btn btn-sm btn-warning" href="edit_vehicle_list.php?vehicle_id='.$listData['id'].'"><i class="fa fa-pencil-square-o"></i></a>';

	$data[]=$ndata;	

} 

echo json_encode(array("data"=>$data,"recordsTotal" => mysqli_num_rows($totalVehicles),"recordsFiltered" => mysqli_num_rows($recordsFiltered)));



?>


