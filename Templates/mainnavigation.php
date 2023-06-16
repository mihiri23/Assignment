<nav class="main_nav">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="main_nav_content d-flex flex-row">

                    <!-- Categories Menu -->

                    <div class="cat_menu_container">
                        <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                            <div class="cat_burger"><span></span><span></span><span></span></div>
                            <div class="cat_menu_text">categories</div>
                        </div>

                        <ul class="cat_menu">
                            <?php while ($row1 = $rcat1->fetch(PDO::FETCH_BOTH)) { ?>
                                <li><a href="../Pages/viewcatitems.php?cat_id=<?php echo $row1['cat_id']; ?>"><?php echo $row1['cat_name']; ?> <i class="fas fa-chevron-right ml-auto"></i></a></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <!-- Main Nav Menu -->

                    <div class="main_nav_menu ml-auto">
                        <ul class="standard_dropdown main_nav_dropdown">
                            <li><a href="./index.php">Home<i class="fas fa-chevron-down"></i></a></li>

                            <li class="hassubs">
                                <a href="#">Sub Categories<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <?php while ($rowsc = $rsc->fetch(PDO::FETCH_BOTH)) { ?>	
                                        <li><a href="../pages/viewsubcatitems.php?sc_id=<?php echo $rowsc['sc_id']; ?>">
                                                   <?php echo $rowsc['sc_name']; ?>
                                                <i class="fas fa-chevron-down"></i></a></li>
                                    <?php } ?>	
                                </ul>
                            </li>
                            <li class="hassubs">
                                <a href="#">New Items<i class="fas fa-chevron-down"></i></a>
                                <ul>
                                    <?php while ($rownew = $resultnew->fetch(PDO::FETCH_BOTH)) { ?>	
                                    <li><a href="../Pages/viewitem.php?item_id=<?php echo $rownew['item_id']; ?>">
                                                   <?php echo $rownew['item_name']; ?>
                                                <i class="fas fa-chevron-down"></i></a></li>
                                    <?php } ?>	
                                </ul>
                            </li>
                            <li><a href="../pages/viewnewitems.php">All Items<i class="fas fa-chevron-down"></i></a></li>
<!--                            <li><a href="contact.php">Contact<i class="fas fa-chevron-down"></i></a></li>-->
                        </ul>
                    </div>

                    <!-- Menu Trigger -->

                    <div class="menu_trigger_container ml-auto">
                        <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                            <div class="menu_burger">
                                <div class="menu_trigger_text">menu</div>
                                <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>