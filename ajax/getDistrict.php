<?php
include '../common/dbconnection.php';
include '../model/districtmodel.php';
$pro_id=$_GET['q'];

$obdis=new district();
$resultdis=$obdis->displayDistrictsPerPro($pro_id);
?>
<select name="dis_id" id="dis_id" 
        class="form-control" onchange="displayCities(this.value)">
      <option value="">Select a District</option>
    <?php while($rowdistrict=$resultdis->fetch(PDO::FETCH_BOTH)){ ?>
               <option value="<?php echo $rowdistrict['id']; ?>">
                   <?php echo $rowdistrict['name_en']; ?>
               </option>
    <?php } ?>                                
</select>