
<?php
include("connection/connect.php"); // connection to db
error_reporting(0);
session_start();
$beer = $_POST['search'];
include_once 'product-action.php'; //including controller

?>

<?php
include("header.php");
?>

                        </ul>
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->
        </header>

            <!-- end:Inner page hero -->
            <div class="breadcrumb">
                <div class="container">

                </div>
            </div>
            <div class="container m-t-30">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                         <div class="widget widget-cart">
                                <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                 Your Shopping Cart
                              </h3>


                                    <div class="clearfix"></div>
                                </div>
                                <div class="order-row bg-white">
                                    <div class="widget-body">


	<?php

$item_total = 0;

foreach ($_SESSION["cart_item"] as $item)  // fetch items define current into session ID
{
?>

                                        <div class="title-row">
										<?php echo $item["title"]; ?><a href="beers.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>" >
										<i class="fa fa-trash pull-right"></i></a>
										</div>

                                        <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                 <input type="text" class="form-control b-r-0" value=<?php echo "Rwf ".$item["price"]; ?> readonly id="exampleSelect1">

                                            </div>
                                            <div class="col-xs-4">
                                               <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> </div>

									  </div>

	<?php
$item_total += ($item["price"]*$item["quantity"]); // calculating current price into cart
}
?>



                                    </div>
                                </div>

                                <!-- end:Order row -->

                                <div class="widget-body">
                                    <div class="price-wrap text-xs-center">
                                        <p>TOTAL</p>
                                        <h3 class="value"><strong><?php echo "Rwf ".$item_total; ?></strong></h3>
                                        <p>Free Shipping</p>
                                        <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check"  class="btn theme-btn btn-lg">Checkout</a>
                                    </div>
                                </div>




                            </div>
                    </div>

                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">

                        <!-- end:Widget menu -->
                        <div class="menu-widget" id="2">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                              Search for <b><?php echo "$beer"; ?></b> <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                              <i class="fa fa-angle-right pull-right"></i>
                              <i class="fa fa-angle-down pull-right"></i>
                              </a>
                           </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="collapse in" id="popular2">
						<?php  // display values and item of beverage/beers
									$stmt = $db->prepare("select * from beers where title like '%$beer%'or slogan like'%$beer%'");
									$stmt->execute();
									$products = $stmt->get_result();
									if (!empty($products))
									{
									foreach($products as $product)
										{



													 ?>
                                <div class="beverage-item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
										<form method="post" action='beers.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                            <div class="rest-logo pull-left">
                                                <a class="counter-logo pull-left" href="#"><?php echo '<img src="admin/Res_img/beers/'.$product['img'].'" alt="beverage logo">'; ?></a>
                                            </div>
                                            <!-- end:Logo -->
                                            <div class="rest-descr">
                                                <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                <p> <?php echo $product['slogan']; ?></p>
                                            </div>
                                            <!-- end:Description -->
                                        </div>
                                        <!-- end:col -->
                                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info">
										<span class="price pull-left">RWf <?php echo $product['price']; ?></span>
										  <input class="b-r-0" type="text" name="quantity"  style="margin-left:30px;" value="1" size="2" />
										  <input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Add to cart" />
										</div>
										</form>
                                    </div>
                                    <!-- end:row -->
                                </div>
                                <!-- end:beverage item -->

								<?php
									  }
									}


								?>



                            </div>
                            <!-- end:Collapse -->
                        </div>
                        <!-- end:Widget menu -->

                    </div>
                    <!-- end:Bar -->
                    <div class="col-xs-12 col-md-12 col-lg-3">
                        <div class="sidebar-wrap">
                           <div class="widget clearfix">
                            <!-- /widget heading -->
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                  Popular tags
                               </h3>
                                     <div class="clearfix"></div>
                                 </div>
                                 <div class="widget-body">
                                     <ul class="tags">
                                         <li> <a href="#" class="tag">
                                     Byeri
                                     </a> </li>
                                         <li> <a href="#" class="tag">
                                     Urwarwa
                                     </a> </li>
                                         <li> <a href="#" class="tag">
                                     Insajya
                                     </a> </li>
                                         <li> <a href="#" class="tag">
                                     Nguvu
                                     </a> </li>
                                         <li> <a href="#" class="tag">
                                     Icyuma
                                     </a> </li>

                                     </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- end:Right Sidebar -->
                </div>
                <!-- end:row -->
            </div>
            <?php
            include("footer.php");
            ?>
