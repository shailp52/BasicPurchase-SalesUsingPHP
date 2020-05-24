﻿<?php
// Start the session
session_start();


include 'Config/config.php';
include 'Config/config1.php';
include 'Config/connect.php';
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>
   
     <meta charset="UTF-8" />
    <title>OSMS | Invoice</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
	<style type="text/css" media="print">
		@media print {
		.footer,
		#non-printable {
			display: none !important;
		}
		#printable {
			display: block;
		}
	</style>

</head>
    <!-- END  HEAD-->
    <!-- BEGIN BODY-->
<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="dashboard.php" class="navbar-brand">
                    <img src="assets/img/logo.png" alt="" height=50px width=120px/></a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">





                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                        
                            <li><a href="UserProfile.php"><i class="icon-user"></i> My Profile </a>
                            </li>
                            <?php
							if($role=="Manager")
								{
								?>
                            <li><a href="Settings.php"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <?php }?>
                            <li class="divider"></li>
                            
                            <li><a href="Execute/ExDestroySession.php"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->





        <!--PAGE CONTENT -->


            <div class="inner" style="min-height:1200px;">
                

                <hr />


<div class="widget purple">
                        
                         <div class="widget-body">
                             <div class="row-fluid">
                                 <div class="span12">
                                     <div class="text-center"> 
                                         <h2>Sales Invoice</h2>                                
                                      </div>
                                   <hr>

                                 </div>
                             </div>
                              <?php   
	$idd=$_GET['id'];
	$result = mysqli_query($link, "SELECT * FROM sales WHERE IDInvoice='$idd'");
	while($dec = mysqli_fetch_array($result))
			{ 
				$salesid=$dec['salesid']; 
				$ClientName=$dec['ClientName'];
				$PhoneNumber=$dec['PhoneNumber'];
				$SaleDate=$dec['SaleDate'];					
 }
 
  ?>
                             <div class="space20"></div>
                             <div class="row-fluid invoice-list">
                              <table class="table table-striped table-hover">
                                     <thead>
                                     <tr>
                                         
                                         <th>
                                         <div class="">
                                     <h4>OUR ADDRESS</h4>
                                     <p>
                                        Manufacturing Co. Pvt Ltd<br>
                                        Tel: 1234567890
                                     </p>
                                 </div>
                                 </th>
                                         <th class="hidden-480">
                                         <div class="">
                                     <h4>CUSTOMER ADDRESS</h4>
                                     <p>
                                         <?php echo $ClientName?> <br>
                                         Tel:  <?php echo $PhoneNumber?>
                                     </p>
                                 </div>
                                         
                                         </th>
                                         <th>
                                         
                                         <div class="">
                                     <h4>INVOICE INFO</h4>
                                       <p>
                                         Invoice Number		: <strong><?php echo $idd?></strong><br>
                                         Invoice Date		: <?php echo $SaleDate?></li>
                                        </p> 
                                     </ul>
                                 </div>
                                         
                                         </th>
                                     </tr>
                                     </thead>
                               </table>
                                 
                                 
                                 
                             </div>
                             <div class="space20"></div>
                             <div class="space20"></div>
                             <div class="row-fluid">
                                 <table class="table table-striped table-hover">
                                     <thead>
                                     <tr>
                                         <th>Serial No.</th>
                                         <th>Product</th>
                                         <th>Quantity</th>
                                         <th>Price (INR)</th>
                                         <th>Total Price (INR)</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                                     <?php  
									 $idd=$_GET['id'];
									 $No=1; 
									 $GrandTotal=0;
									 $PaidAmount=0; 
									 $Rest=0;  
										$result = mysqli_query($link, "SELECT * FROM sales WHERE IDInvoice='$idd'");
										while($product = mysqli_fetch_array($result))
											{ 
                                                
                                                $IDProduct=$product['IDProduct'];
                                                $que = mysqli_query($link, "SELECT * FROM product WHERE productid='$IDProduct'");
                                                while($dec = mysqli_fetch_array($que))
                                                { 
                                                    $product_name=$dec['product_name']; 				
                                                }


											$TotalPrice=$product['TotalPrice'];
											$GrandTotal=$GrandTotal+$TotalPrice;
											
											$AmountPaid=$product['AmountPaid'];
											$PaidAmount=$PaidAmount+$AmountPaid;
											
											$Balance=$product['Balance'];
											$Rest=$Rest+$Balance;
											?>
                                     <tr>
                                        <td><?php echo $No++?></td>
                                        <td class="hidden-480"><?php echo $product_name?></td>
                                        <td><?php echo $product['QuantitySold'];?></td>
                                        <td><?php echo $product['Price'];?> </td>
                                        <td><?php echo $product['TotalPrice'];?></td>
                                     </tr>
                              			 <?php } ?>
                                     <tr>
                                       <td>&nbsp;</td>
                                       <td>&nbsp;</td>
                                       <td class="hidden-480">&nbsp;</td>

                                       <td>&nbsp;</td>
                                       <td>&nbsp;</td>
                                       
                                     </tr>
                                     </tbody>
                                 </table>
                           </div>
                             <div class="space20"></div>
                             <div class="row-fluid">
                                 <div class="span4 invoice-block pull-right">
                                 <?php
								 $GST=($GrandTotal*18)/100;
								 ?>
                                     
                                         <p style="padding:10px; margin-bottom:5px; background:#f1f1f1"><strong>GST(18%) (INR) :</strong> <?php echo $GST ?></p>
                                         <p style="padding:10px; margin-bottom:5px; background:#f1f1f1"><strong>Grand Total(INR) :</strong><?php echo $GrandTotal ?></p>
                                    	 <p style="padding:10px; margin-bottom:5px; background:#f1f1f1"><strong>Amount Paid(INR) :</strong> <?php echo $PaidAmount ?></p>
                                         <p style="padding:10px; margin-bottom:5px; background:#f1f1f1"><strong>Balance(INR) :</strong><?php echo $Rest ?></p>
                                    
                                 </div>
                             </div>
                             <div class="space20"></div>
                             <div class="space20"></div>
                             <div class="row-fluid text-center">
                                
                                 <a class="btn btn-inverse btn-large hidden-print" onClick="javascript:window.print();">Print <i class="icon-print icon-big"></i></a>
                                 <a class="btn btn-inverse btn-large hidden-print" href="ViewInvoice.php">Back <i class="icon-backward"></i></a>
                             </div>
                         </div>
                     </div>

            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <?php
	include 'Footer.php';
	?>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
</body>
    <!-- END BODY-->
    
</html>