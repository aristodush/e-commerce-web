<?php

session_start(); //temp session
error_reporting(0); // hide undefine index
include("connection/connect.php"); // connection
if(isset($_POST['submit'] )) //if submit btn is pressed
{
     if(empty($_POST['firstname']) ||  //fetching and find if its empty
   	    empty($_POST['lastname'])||
		empty($_POST['email']) ||
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['cpassword']))
		{
			$message = "All fields must be Required!";
		}

	elseif($_POST['password'] != $_POST['cpassword']){  //matching passwords
       	$message = "Password not match";
    }
	elseif(strlen($_POST['password']) < 6)  //cal password length
	{
		$message = "Password Must be >=6";
	}
	elseif(strlen($_POST['phone']) < 10)  //cal phone length
	{
		$message = "invalid phone number!";
	}

  	else{

      $mql = "update users set username='$_POST[uname]', f_name='$_POST[fname]', l_name='$_POST[lname]',email='$_POST[email]',phone='$_POST[phone]',password='".md5($_POST[password])."' where u_id='$_GET[user_upd]' ";
      mysqli_query($db, $mql);
  		$success = "Account Updated successfully!";
  		 header("index.php"); // redireted once updated success
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
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="#" class="active">
					  <span style="color:red;"><?php echo $message; ?></span>
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>

					</a></li>

                  </ul>
               </div>
            </div>
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">


                    <!-- WHY? -->
                    <div class="col-md-4">
                       <h4>Update your Profile</h4>
                       <p>Let us get your Updated info:</p>
                       <hr>
                       <img src="images/img/person.png" alt="" class="img-fluid">

                       <!-- end:Panel -->

                    </div>
                    <!-- /WHY? -->
                     <!-- REGISTER -->
                     <div class="col-md-8">
                        <div class="widget">
                           <div class="widget-body">
                             <?php
                             $userperson = $_SESSION["user_id"];
                             $ssql ="select * from users where u_id='$userperson'";
                                      $res=mysqli_query($db, $ssql);
                                      $newrow=mysqli_fetch_array($res);?>
							  <form action="" method="post">
                                 <div class="row">
								  <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">User-Name</label>
                                       <input class="form-control" type="text" disabled name="username" value="<?php  echo $newrow['username']; ?>" id="example-text-input" placeholder="UserName" minlength="4"  required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">First Name</label>
                                       <input class="form-control" type="text" name="firstname"  value="<?php  echo $newrow['f_name'];  ?>" id="example-text-input" placeholder="First Name" minlength="4" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Last Name</label>
                                       <input class="form-control" type="text" name="lastname" value="<?php  echo $newrow['l_name']; ?>" id="example-text-input-2" placeholder="Last Name" minlength="6" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Email address</label>
                                       <input type="email" minlength="6" required class="form-control"  value="<?php  echo $newrow['email'];  ?>"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> <small id="emailHelp" class="form-text text-muted">We"ll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Phone number</label>
                                       <input class="form-control" minlength="6" required type="text"  value="<?php  echo $newrow['phone'];  ?>"  name="phone" id="example-tel-input-3" placeholder="Phone"> <small class="form-text text-muted">We"ll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Password</label>
                                       <input type="password" minlength="6" required class="form-control"  value="<?php  echo $newrow['password'];  ?>" name="password" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Repeat password</label>
                                       <input type="password" minlength="6" required class="form-control" name="cpassword" id="exampleInputPassword2" placeholder="Password">
                                    </div>
									 <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">Delivery Address</label>
                                       <textarea class="form-control"  placeholder="<?php  echo $newrow['address'];  ?> "required id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div>

                                 </div>

                                 <div class="row">
                                    <div class="col-sm-4" >
                                       <p> <input type="submit" value="Update Profile" name="submit" class="btn theme-btn"> </p>
                                    </div>
                                 </div>
                              </form>

						   </div>
                           <!-- end: Widget -->
                        </div>
                        <!-- /REGISTER -->
                     </div>

                  </div>
               </div>
            </section>
            <?php
            include("footer.php");
            ?>
