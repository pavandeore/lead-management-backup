<?php
session_start();

?>
<?php if(isset($_SESSION['FULLNAME'])){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking HTML</title>
    <link rel="stylesheet" href="./styles/style.css" />

    <!-- Bootstrap files -->
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css" />
    
    <!-- jQuery files -->
    <script src="./assets/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
    
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha512-I5TkutApDjnWuX+smLIPZNhw+LhTd8WrQhdCKsxCFRSvhFx2km8ZfEpNIhF9nq04msHhOkE8BMOBj5QE07yhMA==" crossorigin="anonymous"></script>
   
    <!-- font awesome cdn links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />

    <!-- Cookie js -->
    <script src="./assets/js.cookie-2.2.1.min.js"></script>
</head>

<body>

    <div class="main-container container-fluid d-flex justify-content-center">
        <div class="row container-fluid">
            <div class="sidenav  py-2 my-2 col-12 col-sm-2  text-white">

                   <!--  THIS IS SIDE NAVIGATION -->

                    <div class="side-nav">
                        <ul>
                            <li class="dashboard pt-4">Dashboard <i class="fa fa-home"></i></li>
                            <li class="profile-click pt-4">Profile <i class="fa fa-user"></i></li>
                            <li class="pt-4"><div class="clickme">Leads <i class="fa fa-leanpub"></i></div>
                              <ul class="sub-list">
                                <li class="entry"> <i class="fa fa-chevron-right"></i> Lead Entry</li>
                                <!-- <li class="lead-history-click"> <i class="fa fa-chevron-right"></i> Lead History</li> -->
                              </ul>
                            </li>
                            <li class="employee-click pt-4">Employees <i class="fa fa-group"></i></li>
                            <li class="customer-click pt-4">Customers <i class="fa fa-group"></i></li>
                            <li class="item-master-click pt-4">Item Master <i class="fa fa-gears"></i></li>
                            <li class="pt-4"><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>

            </div>
            <div class="col-12 col-sm-10 ">

                    <!-- THIS IS UPSIDE NAVIGATION -->

                    <?php
                        include 'upsideNav.php';
                    ?>


                    <!-- THIS IS MAIN DASHBOARD WHICH WILL LOAD CONTENT ON CLICK EVENTS FROM NAVIGATION -->

                    <div class="main-dashboard">

                    </div>

            </div>
        </div>
    </div>
<?php }
else{
    header('location:login.php');
}?>
    <script src="./app.js"></script>
</body>
</html>
