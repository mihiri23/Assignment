<?php
include '../../Apps/common/dbconnection.php';
include '../../Apps/model/productionmodel.php';
$obpro=new production();
//$item_id=$_GET['item_id'];
//$color_id=$_GET['color'];
//$size_id=$_GET['size'];
$quantity=$_POST['rqua'];
//$resultp=$obpro->viewRM($item_id, $color_id, $size_id);
//$rowp=$resultp->fetch(PDO::FETCH_BOTH);
if($quantity!=""){
//echo $Tot=$rowp['cement(50kg_bag)']
echo $Tot=2*$quantity;
}
?>
<INPUT type="text" value="<?php echo $Tot; ?>" name="cart_price" />