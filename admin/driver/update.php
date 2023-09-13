<?php require 'dealer.php'; ?>
<?php 
$response = array();
$action = new Action();
// error_reporting(0);
if(isset($_POST['table']) and $_POST['table']=='admin'){


	$sql = "SELECT * from admin where ad_id=?";
	$param = array($_POST['id']);
	$res = $action->selectRow($sql,$param);
?>
<input type="hidden" name="updateBarista"  value="<?= $res['ad_id'];?>">
<div class="form-group">
	<label for="exampleInputUsername1">Names</label>
	<input type="text" required name="names" class="form-control" id="exampleInputUsername1"
		placeholder="Names" value="<?= $res['ad_name'];?>">
</div>
<div class="form-group">
	<label for="exampleInputEmail1">Email address</label>
	<input type="email" required name="email" class="form-control" id="exampleInputEmail1"
		placeholder="Email" value="<?= $res['ad_email'];?>">
</div>
<div class="form-group">
	<label for="exampleInputPassword1">Phone</label>
	<input type="text" required name="phone" class="form-control" id="exampleInputPassword1"
		placeholder="+25072.../+25078..." value="<?= $res['ad_phone'];?>">
</div>

<div class="form-group">
		<label for="exampleInputUsername1">Type</label>

		<select name="type" required class="form-control form-control-sm"
			id="exampleFormControlSelect3">

			<option value="">Select Type</option>
			<option value="Administrator" <?= $res['ad_type']=='Administrator'?'selected':''; ?>>Administrator</option>
			<option value="Barista" <?= $res['ad_type']=='Barista'?'selected':''; ?>>Barista</option>
			<option value="Chef" <?= $res['ad_type']=='Chef'?'selected':''; ?>>Chef</option>
		</select>
	</div>
<?php
}
if(isset($_POST['table']) and $_POST['table']=='tables'){
	$sql = "SELECT * from tables where tab_id=?";
	$param = array($_POST['id']);
	$res = $action->selectRow($sql,$param);
?>
<input type="hidden" name="updateTable"  value="<?= $res['tab_id'];?>">
<div class="form-group">
	<label for="exampleInputUsername1">Name</label>
	<input type="text" required name="name" class="form-control" id="exampleInputUsername1"
		placeholder="Name" value="<?= $res['tab_name'];?>">
</div>
<?php
}
if(isset($_POST['table']) and $_POST['table']=='category'){
	$sql = "SELECT * from category where cat_id=?";
	$param = array($_POST['id']);
	$res = $action->selectRow($sql,$param);
?>
<input type="hidden" name="updateCategory"  value="<?= $res['cat_id'];?>">
<div class="form-group">
	<label for="exampleInputUsername1">Name</label>
	<input type="text" required name="name" class="form-control" id="exampleInputUsername1"
		placeholder="Name" value="<?= $res['cat_name'];?>">
</div>
<div class="form-group">
	<label for="exampleInputUsername1">Icon</label>
	<input type="text" required name="icon" class="form-control" id="exampleInputUsername1"
		placeholder="Icon" value="<?= $res['cat_icon'];?>">
</div>
<div class="form-group">
		<label for="exampleInputUsername1">Type</label>

		<select name="type" required class="form-control form-control-sm"
			id="exampleFormControlSelect3">

			<option value="">Select Type</option>
			<option value="Barista" <?= $res['cat_type']=='Barista'?'selected':''; ?>>Barista</option>
			<option value="Chef" <?= $res['cat_type']=='Chef'?'selected':''; ?>>Chef</option>
		</select>
	</div>
<?php
}
if(isset($_POST['table']) and $_POST['table']=='menu'){
	$sql = "SELECT * from menu where men_id=?";
	$param = array($_POST['id']);
	$res = $action->selectRow($sql,$param);
?>
<input type="hidden" name="updateMenu"  value="<?= $res['men_id'];?>"><div class="form-group">
	<label for="exampleInputUsername1">Menu Name</label>
	<input required name="name" value="<?= $res['men_name'];?>" type="text" class="form-control" id="exampleInputUsername1" placeholder="Menu Name">
	</div>
	<div class="form-group">
	<label for="exampleInputcategory">Menu Category</label>
	<select name="category" required class="form-control form-control-sm" id="exampleFormControlSelect3">
		<option value="">Select Category</option>
	<?php
		$sql = "SELECT * from category";
		$param = array();
		$datas = $action->selectRows($sql,$param);
		foreach ($datas as $key => $data) {
		?>
		<option value="<?= $data['cat_id'];?>" <?= $res['men_category']==$data['cat_id']?'selected':''; ?>><?= $data['cat_name'];?></option>
	<?php } ?>
	</select>
	</div>
	<div class="form-group">
	<label for="exampleInputPrice">Menu Price</label>
	<input type="text" name="price" value="<?= $res['men_price'];?>" class="form-control" id="exampleInputPrice" placeholder="Menu Price">
	</div>
	<div class="form-group">
	<label for="exampleInputPrice">Menu Image</label>
	<input type="file" name="image" class="form-control" id="exampleInputPrice" placeholder="Menu Price">
	</div>
	<div class="form-group">
	<label for="exampleInputDetails">Menu Details</label>
	<textarea name="details" class="form-control" id="exampleTextarea1" rows="4" spellcheck="false"><?= $res['men_details'];?></textarea>
	</div>   
<?php
}
?>