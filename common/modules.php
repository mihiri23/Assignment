<div class="col-md-3 col-sm-4" style="background:linear-gradient(#ffffff,lightgray,#ffffff)" >
                        
                        
                        <ul style="list-style: none">
                            <!-- Item -->
                            <?php if($userInfo['role_id']!=2){ ?>
                            <li><h4><a href="../view/item.php"><i class="glyphicon glyphicon-gift"></i>
                                        Item</a></h4></li>
                            <?php } ?>
                                         <div class="clearfix">&nbsp;</div>
                                        <!-- Raw Item -->
                            <?php if($userInfo['role_id']!=2){ ?>
                            <li><h4><a href="../view/viewallraw.php"><i class="glyphicon glyphicon-gift"></i>
                                        Raw Materials</a></h4></li>
                            <?php } ?>
                                         <div class="clearfix">&nbsp;</div>
                                     <!-- Customer -->
                   <?php if($userInfo['role_id']!=2){ ?>
                                     <li><h4><a href="../view/cusfirst.php"><i class="glyphicon glyphicon-user"></i>
                   Customer</a></h4></li>
                            <?php } ?> 
                    <div class="clearfix">&nbsp;</div>
                              <!-- Order -->       
                                    <?php if($userInfo['role_id']!=2){ ?>
       <li><h4><a href="../view/order.php">
               <i class="glyphicon glyphicon-shopping-cart"></i>
                                    Order</a></h4></li>
                            <?php } ?> 
                                     <div class="clearfix">&nbsp;</div>
                      
                   <!-- Stock-->
                            <?php if($userInfo['role_id']!=2){ ?>
       <li><h4><a href="../view/stock.php">
               <i class="glyphicon glyphicon-oil"></i>
                                  Item Stock</a></h4></li>
                            <?php } ?> 
                                   <div class="clearfix">&nbsp;</div>
                                   <!--Raw Stock-->
                            <?php if($userInfo['role_id']!=2){ ?>
       <li><h4><a href="../view/rawstock.php">
               <i class="glyphicon glyphicon-oil"></i>
                                  Raw Stock</a></h4></li>
                            <?php } ?> 
                                     <div class="clearfix">&nbsp;</div>
                                   <!--Production-->
                            <?php if($userInfo['role_id']!=2){ ?>
                                   <li><h4><a href="../view/addproductionstock.php">
               <i class="glyphicon glyphicon-file"></i>
                                  Production Details</a></h4></li>
                            <?php } ?> 
                                   <div class="clearfix">&nbsp;</div>
                                   <!--New Production-->
                            <?php if($userInfo['role_id']!=2){ ?>
                                   <li><h4><a href="../view/stock.php">
               <i class="glyphicon glyphicon-apple"></i>
                                  New Production</a></h4></li>
                            <?php } ?> 
                                   <div class="clearfix">&nbsp;</div>
                                   <!-- Notification-->
                            <?php if($userInfo['role_id']!=4){ ?>
       <li><h4><a href="../view/notification.php">
               <i class="glyphicon glyphicon-new-window"></i>
                                    Notification</a></h4></li>
                            <?php } ?> 
                                     <div class="clearfix">&nbsp;</div>
                                     <!-- User-->
                            <?php if($userInfo['role_id']==2 || $userInfo['role_id']==1 ){ ?>
       <li><h4><a href="../view/user.php">
               <i class="glyphicon glyphicon-stats"></i>
                                    User</a></h4></li>
                            <?php } ?> 
                                     <div class="clearfix">&nbsp;</div>
                                    
                                    <!-- Backup-->
                            <?php if($userInfo['role_id']==2 || $userInfo['role_id']==1 ){ ?>
       <li><h4><a href="../view/backup.php">
               <i class="glyphicon glyphicon-barcode"></i>
                                    Back Ups</a></h4></li>
                            <?php } ?> 
                                     <div class="clearfix">&nbsp;</div>
                                    <!-- Reports-->
                            <?php  if($userInfo['role_id']==2 || $userInfo['role_id']==1 ){ ?>
       <li><h4><a href="../view/report.php">
               <i class="glyphicon glyphicon-certificate"></i>
                                    Reports</a></h4></li>
                            <?php } ?> 
                                    
                                    
                        </ul>
                        
                    
                    </div>