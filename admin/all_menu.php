<?php
include("header.php");
?>
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">






						     <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Menu data</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>

                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
											 <th>counter</th>
                                                <th>beer-Name</th>
                                                <th>Slogan</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                               <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
											 <th>counter</th>
                                                <th>beer-Name</th>
                                                <th>Slogan</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                               <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>


                                               	<?php
												$sql="SELECT * FROM beers order by d_id desc";
												$query=mysqli_query($db,$sql);

													if(!mysqli_num_rows($query) > 0 )
														{
															echo '<td colspan="11"><center>No beer-Data!</center></td>';
														}
													else
														{
																	while($rows=mysqli_fetch_array($query))
																		{
																				$mql="select * from counter where rs_id='".$rows['rs_id']."'";
																				$newquery=mysqli_query($db,$mql);
																				$fetch=mysqli_fetch_array($newquery);


																					echo '<tr><td>'.$fetch['title'].'</td>

																								<td>'.$rows['title'].'</td>
																								<td>'.$rows['slogan'].'</td>
																								<td>$'.$rows['price'].'</td>


																								<td><div class="col-md-3 col-lg-8 m-b-10">
																								<center><img src="Res_img/beers/'.$rows['img'].'" class="img-responsive  radius" style="max-height:100px;max-width:150px;" /></center>
																								</div></td>


																									 <td><a href="delete_menu.php?menu_del='.$rows['d_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
																									 <a href="update_menu.php?menu_upd='.$rows['d_id'].'" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i></a>
																									</td></tr>';



																		}
														}


											?>






                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

















						 </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>
