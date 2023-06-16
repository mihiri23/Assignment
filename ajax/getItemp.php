<?php
include '../common/dbconnection.php';
include '../model/itemmodel.php';
$cat_id=$_GET['q1'];
$sc_id=$_GET['q2'];
$obitem=new item();
if($cat_id!="" && $sc_id==""){
    $id=$cat_id;
    $field="cat_id";
    $status=1;
}

if($cat_id!="" && $sc_id!=""){
    $id1=$cat_id;$id2=$sc_id;
    $field1="cat_id"; $field2="sc_id";
    $status=2;
}

if($status==1){
    $result=$obitem->getItemsField1($field,$id);
            
}
if($status==2){
    $result=$obitem->getItemsField2($field1,$id1,$field2,$id2);
            
}
?>
<table class="ui celled table" id="example">
                            <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Item Id</th>
                                <th>Item Name</th>
                                <th>Category</th>                                
                                <th>Sub Category</th>
                                <th>&nbsp;</th>
                              
                                 
                            </tr>   
                            </thead>
                            <tbody>
                            <?php while($row=$result->fetch(PDO::FETCH_BOTH)){ 
                              
                               $item_id=$row['item_id'];
                               
                                $resultimage=$obitem->viewItemImage($item_id);
                                $noi=$resultimage->rowCount();
                                if($noi){
                                    $rowall=$resultimage->fetchAll();
                                    foreach($rowall as $k=>$v){
                                    $im=$v['ii_name'];
                                    }
                                    $path='../images/item_images/'.$im;
                                    
                                }else{
                                    
                                    $path="../images/Product.png";
                                }
                              $resultcb=$obitem->getItemCatBrand($item_id);
                              $rowcs=$resultcb->fetch(PDO::FETCH_BOTH);
                                ?>
                            <tr>
                                <td><img src="<?php echo $path; ?>" height="20" /></td>
                                <td><?php echo $row['item_id']; ?></td>                               
                                <td><?php echo $row['item_name'];?></td>
                                <td>
                                    <?php echo $rowcs['cat_name']; ?>
                                </td>
                                <td>
                                    <?php echo $rowcs['sc_name']; ?>
                                </td>
                                
                               
                                <td>
                                    <a href="../addproductiondetails.php?item_id=<?php echo $row['item_id']; ?>">
                                    <button type="button" 
                                            class="btn btn-sm btn-primary">Add
                                    </button>
                                    </a>
      
                                </td>
                                
                                
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
