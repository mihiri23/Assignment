<div class="top_bar">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-row">
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>+94 776100441 </div>
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:sundeshgarden@gmail.com">Deshapriyatradecenter@gmail.com</a></div>
                <div class="top_bar_content ml-auto">
                    <div class="top_bar_menu">
                        <ul class="standard_dropdown top_bar_dropdown">
                            <li>
                                <a href="#">English<i class="fas fa-chevron-down"></i></a>

                            </li>

                        </ul>
                    </div>
                    <div class="top_bar_user">
                        <div class="user_icon"><img src="images/user.svg" alt=""></div>
                        <?php if($noc){ 
                            $rowcus=$_SESSION['rowcus'];
                            $cus_id=$rowcus['cus_id'];
                            ?>
                                <div><a href="../Pages/profile.php?cus_id=<?php echo $cus_id?>">
                             <?php echo $rowcus['cus_name']; ?>
                            </a></div>
                        <div><a href="../Controllers/Controllers.php?action=signout">Sign Out</a></div>
                        <?php }else{ ?>
                        <div><a href="../Pages/signup.php">Sign Up</a></div>
                        <div><a href="../Pages/signup.php">Sign in</a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>		
</div>

