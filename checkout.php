<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{


												foreach ($_SESSION["cart_item"] as $item)
												{

												$item_total += ($item["price"]*$item["quantity"]);

													if($_POST['submit'])
													{

													$SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";

														mysqli_query($db,$SQL);

														$success = "Thankyou! Your Order Placed successfully!";
														header("refresh:0;url=your_orders.php");


													}
												}
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
        <div class="page-wrapper">
            <div class="top-links">
                <div class="container">
                    <ul class="row links">

                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="counters.php">Choose counter</a></li>
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your favorite beverage</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active" ><span>3</span><a href="checkout.php">Order and Pay online</a></li>
                    </ul>
                </div>
            </div>

                <div class="container">

					   <span style="color:green;">
								<?php echo $success; ?>
										</span>

                </div>




            <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">

                    <div class="widget-body">
                        <form method="post" action="#">
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Cart Summary</h4> </div>
                                        <div class="cart-totals-fields">

                                            <table class="table">
											<tbody>



                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td> <?php echo "Rwf ".$item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping &amp; Handling</td>
                                                        <td>free shipping</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong> <?php echo "Rwf ".$item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>




                                            </table>
                                        </div>
                                    </div>
                                    <!--cart summary-->
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Payment on delivery</span>
                                                    <br> <span>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span> </label>
                                            </li>
																						<p class="text-xs-center"> <input type="submit" onclick="return confirm('Are you sure?');" name="submit"  class="btn btn-outline-success btn-block" value="Order now"> </p>

																									</form>
																								</form>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
Or Use PayPal
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="sb-pxrn98822343@business.example.com">
<input type="hidden" name="item_name_1" value="Beverage System payment">

<input type="hidden" name="amount_1" value=" <?php echo $item_total/1036.50; ?>">
<input type="submit" value="PayPal" class="btn btn-outline-success btn-block">
</form>
  </li>
                                        </ul>


																		</div>

                                </div>
                            </div>

                    </div>
                </div>
				 </form>
            </div>
						<?php
						include("footer.php");
						?>
						<?php
}
?>
