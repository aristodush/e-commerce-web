
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
            <!-- top Links -->
            <div class="top-links">
                <div class="container">
                    <ul class="row links">

                        <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="counters.php">Choose counter</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick Your favorite beverage</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay online</a></li>
                    </ul>
                </div>
            </div>
            <!-- end:Top links -->
            <!-- start: Inner page hero -->
            <div class="inner-page-hero bg-image" data-image-src="images/img/res.jpeg">
                <div class="container"> </div>
                <!-- end:Container -->
            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">


                    </div>
                </div>
            </div>
            <!-- //results show -->
            <section class="counters-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">


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
                                 <!-- end:Widget -->
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                            <div class="bg-gray counter-entry">
                                <div class="row">
								<?php $ress= mysqli_query($db,"select * from counter");
									      while($rows=mysqli_fetch_array($ress))
										  {


													 echo' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
															<div class="entry-logo">
																<a class="img-fluid" href="beers.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="beverage logo"></a>
															</div>
															<!-- end:Logo -->
															<div class="entry-dscr">
																<h5><a href="beers.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].' <a href="#">...</a></span>
																<ul class="list-inline">
																	<li class="list-inline-item"><i class="fa fa-check"></i> Min Rwf 500</li>
																	<li class="list-inline-item"><i class="fa fa-motorcycle"></i> 30 min</li>
																</ul>
															</div>
															<!-- end:Entry description -->
														</div>

														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
																<div class="right-content bg-white">
																	<div class="right-review">
																		<div class="rating-block"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
																		<p> 245 Reviews</p> <a href="beers.php?res_id='.$rows['rs_id'].'" class="btn theme-btn-dash">View Menu</a> </div>
																</div>
																<!-- end:right info -->
															</div>';
										  }


						?>

                                </div>
                                <!--end:row -->
                            </div>



                            </div>



                        </div>
                    </div>
                </div>
            </section>
            <?php
						include("footer.php");
						?>
