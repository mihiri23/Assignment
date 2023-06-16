<?php
include '../common/dbconnection.php';
include '../model/scmodel.php';
$cat_id=$_GET['q'];

$obsc=new subCategory();
$resultsc=$obsc->displaySCPerCat($cat_id)
?>
<select name="sc_id" id="sc_id" 
        class="form-control" onchange="displayItem(document.getElementById('cat_id').value,this.value)">
      <option value="">Select Sub Category</option>
    <?php while($rowsc=$resultsc->fetch(PDO::FETCH_BOTH)){ ?>
               <option value="<?php echo $rowsc['sc_id']; ?>">
                   <?php echo $rowsc['sc_name']; ?>
               </option>
    <?php } ?>                                
</select>


