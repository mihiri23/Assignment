<div class="header_main">
    <div class="container">
        <div class="row">

            <!-- Logo -->
            <div class="col-lg-2 col-sm-3 col-3 order-1">
                <div class="logo_container">
                    <div class="logo"><img src="images/tlogo.jpg" alt=""></div>
                </div>
            </div>

            <!-- Search -->
            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                <h1 style="color: brown; padding-top: 50px">Deshapriya Trade Center</h1>
               
                <div class="header_search">
                    <div class="header_search_content">
                        <div class="header_search_form_container">
                            <form action="../Pages/searchitems.php" class="header_search_form clearfix">
                                <input type="search" required="required" class="header_search_input" placeholder="Search for Items...">
                                <div class="custom_dropdown">
                                    <div class="custom_dropdown_list">
                                        <span class="custom_dropdown_placeholder clc">All Categories</span>
                                        <i class="fas fa-chevron-down"></i>
                                        <ul class="custom_list clc">
                                            <li><a class="clc" href="../Pages/searchitems.php?cat_id=0">All Categories</a></li>
                                            <?php while ($row = $rcat->fetch(PDO::FETCH_BOTH)) { ?>
                                                <li><a class="clc" href="../Pages/searchitems.php?cat_id=<?php echo $row['cat_id']; ?>"><?PHP echo $row['cat_name']; ?></a></li>
                                            <?PHP } ?>
                                        </ul>
                                    </div>
                                </div>
                                <button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wishlist -->
            <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                    <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                        <div class="wishlist_icon">
<!--                            <img src="images/heart.png" alt="">-->
                        </div>
                        <div class="wishlist_content">
                            <div class="wishlist_text">
<!--                                <a href="./viewwishlist.php">Wishlist</a>-->
                            </div>
                            <div class="wishlist_count"></div>
                        </div>
                    </div>

                    <!-- Cart -->
                    <div class="cart">
                        <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                            <div class="cart_icon">
                                <a href="./viewcart.php"><img src="images/cart.png" alt="" width="100px" height="100px"></a>
<!--                                        <div class="cart_count"><span></span></div>-->
                            </div>
                            <div class="cart_content">
                                <div class="cart_text"><a href="./viewcart.php">Cart</a></div>
                                <div class="cart_price"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

