<?php require 'dealer.php'; ?>
<?php 
header("Content-type:text/json");
$response = array();
$action = new Action();
// error_reporting(0);
if(isset($_POST['login'])){
	$sql = "SELECT * from admin where ad_email=? and ad_password=?";
	$param = array($_POST['email'],md5($_POST['password']));
	$res = $action->selectRow($sql,$param);
	if($res){
		$_SESSION['user'] = $res['ad_id'];
		$_SESSION['type'] = $res['ad_type'];
		$response['status'] = 'success';
		$response['url'] = './';
	}else{
		$response['status'] = 'fail';
		$response['msg'] = 'Invalid email or password';
	}
	echo json_encode($response);
}
if(isset($_POST['addBarista'])){
	$sql = "INSERT into admin set ad_name=?,ad_phone=?,ad_email=?,ad_type=?,ad_password=?";
	$param = array($_POST['names'],$_POST['phone'],$_POST['email'],$_POST['type'],md5('abc@123'));
	$res = $action->executeQuery($sql,$param);
	if($res){
		$response['status'] = 'success';
		$response['msg'] = 'User added';
	}else{
		$response['status'] = 'fail';
		$response['msg'] = 'User was not added';
	}
	echo json_encode($response);
}
if(isset($_POST['updateBarista'])){
	$sql = "UPDATE admin set ad_names=?,ad_phone=?,ad_email=?,ad_type=? where ad_id=?";
	$param = array($_POST['names'],$_POST['phone'],$_POST['email'],$_POST['type'],$_POST['updateBarista']);
	$res = $action->executeQuery($sql,$param);
	if($res){
		$response['status'] = 'success';
		$response['msg'] = 'User updated';
	}else{
		$response['status'] = 'fail';
		$response['msg'] = 'User was not updated';
	}
	echo json_encode($response);
}
if(isset($_POST['deleteData'])){
	if($_POST['table'] == 'menu'){
		$sql = "SELECT men_image from ".$_POST['table']." where ".$_POST['column']."=?";
		$param = array($_POST['id']);
		$found = $action->selectRow($sql,$param);

		if($found && file_exists('../'.$found['men_image'])){
			unlink('../'.$found['men_image']);
		}
	}
	$sql = "DELETE from ".$_POST['table']." where ".$_POST['column']."=?";
	$param = array($_POST['id']);
	$res = $action->executeQuery($sql,$param);
	if($res){
		$response['status'] = 'success';
		$response['msg'] = 'Data deleted';
	}else{
		$response['status'] = 'fail';
		$response['msg'] = 'Data not Deleted';
	}
	echo json_encode($response);
}
if(isset($_POST['addMenu'])){
	if($action->isImage($_FILES['image']['name'])){
		$filename = 'images/uploads/'.$action->isImage($_FILES['image']['name']);
		move_uploaded_file($_FILES['image']['tmp_name'],'../'.$filename);
		$sql = "INSERT into menu set men_name=?,men_category=?,men_price=?,men_image=?,men_details=?";
		$param = array($_POST['name'],$_POST['category'],$_POST['price'],$filename,$_POST['details']);
		$res = $action->executeQuery($sql,$param);
		if($res){
			$response['status'] = 'success';
			$response['msg'] = 'Menu added';
		}else{
			$response['status'] = 'fail';
			$response['msg'] = 'Menu not added';
		}
	}else{
		$response['status'] = 'fail';
		$response['msg'] = 'Invalid file type';

	}
	echo json_encode($response);
}
if(isset($_POST['updateMenu'])){
	$sql = "UPDATE menu set men_name=?,men_category=?,men_price=?,men_details=? where men_id=?";
	$param = array($_POST['name'],$_POST['category'],$_POST['price'],$_POST['details'],$_POST['updateMenu']);
	$res = $action->executeQuery($sql,$param);
	
	if(isset($_FILES['image']) and $action->isImage($_FILES['image']['name'])){
		$filename = 'images/uploads/'.$action->isImage($_FILES['image']['name']);
		move_uploaded_file($_FILES['image']['tmp_name'],'../'.$filename);
		
		$sql = "SELECT men_image from menu where men_id=?";
		$param = array($_POST['updateMenu']);
		$found = $action->selectRow($sql,$param);

		if($found && file_exists('../'.$found['men_image'])){
			unlink('../'.$found['men_image']);
		}

		$sql = "UPDATE menu set men_image=? where men_id=?";
		$param = array($filename,$_POST['updateMenu']);
		$res = $action->executeQuery($sql,$param);
	}
	if($res){
		$response['status'] = 'success';
		$response['msg'] = 'Menu updated';
	}else{
		$response['status'] = 'fail';
		$response['msg'] = 'Menu was not updated';
	}
	echo json_encode($response);
}
if(isset($_POST['addTable'])){
	$sql = "INSERT into tables set tab_name=?";
	$param = array($_POST['name']);
	$res = $action->executeQuery($sql,$param);
	if($res){
		$response['status'] = 'success';
		$response['msg'] = 'Table added';
	}else{
		$response['status'] = 'fail';
		$response['msg'] = 'Table was not added';
	}
	echo json_encode($response);
}

if(isset($_POST['updateTable'])){
	$sql = "UPDATE tables set tab_name=? where tab_id=?";
	$param = array($_POST['name'],$_POST['updateTable']);
	$res = $action->executeQuery($sql,$param);
	if($res){
		$response['status'] = 'success';
		$response['msg'] = 'Table updated';
	}else{
		$response['status'] = 'fail';
		$response['msg'] = 'Table was not updated';
	}
	echo json_encode($response);
}
if(isset($_POST['addCategory'])){
	$sql = "INSERT into category set cat_name=?,cat_icon=?,cat_type=?";
	$param = array($_POST['name'],$_POST['icon'],$_POST['type']);
	$res = $action->executeQuery($sql,$param);
	if($res){
		$response['status'] = 'success';
		$response['msg'] = 'Category added';
	}else{
		$response['status'] = 'fail';
		$response['msg'] = 'Category was not added';
	}
	echo json_encode($response);
}

if(isset($_POST['updateCategory'])){
	$sql = "UPDATE category set cat_name=?,cat_icon=?,cat_type=? where cat_id=?";
	$param = array($_POST['name'],$_POST['icon'],$_POST['type'],$_POST['updateCategory']);
	$res = $action->executeQuery($sql,$param);
	if($res){
		$response['status'] = 'success';
		$response['msg'] = 'Category updated';
	}else{
		$response['status'] = 'fail';
		$response['msg'] = 'Category was not updated';
	}
	echo json_encode($response);
}

if(isset($_POST['addToCart'])){
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart']=array();
	}
	// unset($_SESSION['cart']);
	if(isset($_SESSION['cart'])){
		$newItem = array(
			'id'=>$_POST['id'],
			'quantity'=>1
		);
		$ageExists = false;
		$index = false;
		if(!empty($_SESSION['cart'])){

		foreach ($_SESSION['cart'] as $key => $subArray) {
			if (isset($subArray['id']) && $subArray['id'] == $_POST['id']) {
				$ageExists = true;
				$index = $key;
				$value = $subArray['quantity'];
				break; // Exit the loop as soon as the age is found
			}
		}
		if ($ageExists) {
			$_SESSION['cart'][$key]['quantity']=$value+=1;
		} else {
			array_push($_SESSION['cart'],$newItem);
		}
	}else{
		array_push($_SESSION['cart'],$newItem);
	}
	}
}

if(isset($_POST['addOrder'])){
	$code = rand(11111,99999);
	
	$sql = "SELECT * from client where cli_phone=? order by cli_id desc";
	$param = array($_POST['phone']);
	$res = $action->selectRow($sql,$param);
	if(!$res){

		$sql = "INSERT into client set cli_phone=?";
		$param = array($_POST['phone']);
		$res = $action->executeQuery($sql,$param);	
	}
	$sql = "SELECT * from client where cli_phone=? order by cli_id desc";
	$param = array($_POST['phone']);
	$res = $action->selectRow($sql,$param);
	foreach ($_SESSION['cart'] as $key => $cart) {
		
		$sql = "INSERT into orders set ord_menu=?,ord_table=?,ord_client=?,ord_time=?,ord_quantity=?,ord_code=?,ord_comment=?";
		$param = array($cart['id'],$_POST['table'],$res['cli_id'],date('Y-m-d H:i'),$cart['quantity'],$code,$_POST['message']);
		$action->executeQuery($sql,$param);	
	}
	if($res){
		unset($_SESSION['cart']);
		$response['status'] = 'success';
		$response['msg'] = 'Order Sent';
		$response['url'] = 'menu.php';
	}else{
		$response['status'] = 'fail';
		$response['msg'] = 'Order not Sent';
	}
	echo json_encode($response);
}

?>