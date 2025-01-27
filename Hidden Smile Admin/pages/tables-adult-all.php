<?php
session_start();
/* include db connection file */
include("..\php\dbconn.php");
if (($_SESSION['admin']=='admin1')){
// store session in var
$admin = $_SESSION['admin'];
?>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Tables - Adults All</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/logo.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
    
    <script type="text/javascript">
    function del(iid){
      var cof=confirm("Are you sure you want to DELETE "+ iid +"?");
      if(cof==true){
        window.location ='../php/delitem0.php?iid=' + iid;
      }
    }

    function add(){
      window.location = 'add-item.php'
    }
    </script>

  <script type="text/javascript">
    function view(iid){ 
        window.location ='../pages/view-item-details.php?iid=' + iid;
    }
    </script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
          <a href="..\..\wp-admin.php" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img src="..\assets\img\favicon\logo.ico" alt="Brand Logo" style="width:70px;">
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Hidden<br>Smile</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="..\..\wp-admin.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-id-card"></i>
                <div data-i18n="Account Settings">Account Settings</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="pages-account-settings-account.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Account">Account</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- View Admin -->
            <li class="menu-item">
                  <a href="tables-admin.php?page=1&count=1" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user-check"></i>
                    <div data-i18n="View User">View Admins</div>
                  </a>
            </li>
            <!-- View Users -->
            <li class="menu-item">
                  <a href="tables-user.php?page=1&count=1" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-group"></i>
                    <div data-i18n="Tables">View Users</div>
                  </a>
            </li>
            <!-- Catergories -->
            <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Categories">Categories</div>
                  </a>
              <ul class="menu-sub">
                <li class="menu-item active open">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div data-i18n="Adults">Adults</div>
                  </a>
                  <ul class="menu-sub">
                  <li class="menu-item active">
                  <a href="tables-adult-all.php?page=1&count=1" class="menu-link">
                    <div data-i18n="Adults">All</div>
                  </a>
                  </li>
                  <li class="menu-item">
                  <a href="tables-adult-headloop.php?page=1&count=1" class="menu-link">
                    <div data-i18n="Adults">Headloop</div>
                  </a>
                  </li>
                  <li class="menu-item">
                  <a href="tables-adult-earloop.php?page=1&count=1" class="menu-link">
                    <div data-i18n="Adults">Earloop</div>
                  </a>
                  </li>
                  </ul>
                </li>
                <li class="menu-item active">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div data-i18n="Kids">Kids</div>
                  </a>
                  <ul class="menu-sub">
                  <li class="menu-item">
                  <a href="tables-kid-all.php?page=1&count=1" class="menu-link">
                    <div data-i18n="Adults">All</div>
                  </a>
                  </li>
                  <li class="menu-item">
                  <a href="tables-kid-headloop.php?page=1&count=1" class="menu-link">
                    <div data-i18n="Adults">Headloop</div>
                  </a>
                  </li>
                  <li class="menu-item">
                  <a href="tables-kid-earloop.php?page=1&count=1" class="menu-link">
                    <div data-i18n="Adults">Earloop</div>
                  </a>
                  </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="menu-item">
                  <a href="tables-orders.php?page=1&count=1" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="View User">View Orders</div>
                  </a>
            </li>
            <li class="menu-item">
                  <a href="shippingfee.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-data"></i>
                    <div data-i18n="Shipping Fee">Shipping Fee</div>
                  </a>
            </li> 
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <h6 class="m-0 me-2"> Hi, <?php echo $_SESSION['name']; ?> </h6>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/<?php echo $_SESSION['admindp']; ?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/<?php echo $_SESSION['admindp']; ?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $_SESSION['name']; ?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pages-account-settings-account.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="..\php\logoutAdmin0.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Striped Rows --> 
              <div class="card">
              
                <div class="d-flex justify-content-between">
                <h5 class="card-header justify-content-start">Users Accounts</h5>
                <div class="demo-inline-spacing">
                  <button type="button" class="btn btn-icon btn-primary" onClick="add()">
                  <span class="tf-icons bx bx-plus"></span>
                  </button>
                  <button type="button" class="btn btn-icon btn-secondary" onClick="location.reload()">
                  <span class="tf-icons bx bx-refresh"></span>
                  </button>
                </div>
                </div>
                <div class="table-responsive text-nowrap">
                <form action="" method="post">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Item Name</th>
                        <th>Item Type</th>
                        <th>Loop Type</th>
                        <th>Stock</th>
                        <th>Actions</th>
                      </tr>
                      
                    </thead>
                    
                    <tbody class="table-border-bottom-0">
                    <?php

                      if (isset($_GET["page"])) {    
                        $page  = $_GET["page"];    
                      }    
                      else {    
                      $page=1;
                      
                      }

                      $per_page_record = 20 ; 
                      $start_from = ($page-1) * $per_page_record;
                      $adjacents = "2";

                      $total_pages_sql = "SELECT COUNT(*) FROM items WHERE categories = 'Adults'";
                      $result = mysqli_query($dbconn,$total_pages_sql);
                      $total_rows = mysqli_fetch_array($result)[0];
                      $total_pages = ceil($total_rows / $per_page_record);
                      $second_last = $total_pages - 1;
                      $third_last= $total_pages - 2;
                      $last_page_rows = $second_last * $per_page_record + 1; 
                      $last_row = $total_rows - ($second_last * $per_page_record);
                      $secondlast_row = $total_rows - ($third_last * $per_page_record);

                      $sql="SELECT * FROM items WHERE categories = 'Adults' ORDER BY item_Type ASC LIMIT $start_from,$per_page_record";
                      $rs = mysqli_query($dbconn, $sql);
                      while($row_rs=mysqli_fetch_assoc($rs))
                      {
                      ?>
                      <tr>
                        <td>
                        <strong><?php echo $_GET['count']++ ?>.</strong></td>
                        </td>
                        <td> <strong><?php echo $row_rs['item_Name']; ?></strong></td>
                        <td><?php echo $row_rs['item_Type']; ?></td>
                        <td>
                        <?php echo $row_rs['loop_Type']; ?>
                        </td>
                        <?php if($row_rs['item_Status']=='Instock') {?>
                        <td><span class="badge rounded-pill bg-success">In Stock</span></td>
                        <?php } else if($row_rs['item_Status']=='Outstock') {?>
                          <td><span class="badge rounded-pill bg-danger">Out of Stock</span></td>
                        <?php } else if($row_rs['item_Status']=='Sold'){ ?>
                            <td><span class="badge rounded-pill bg-secondary">Sold Out</span></td>
                            <?php } else {?>
                              <td><span class="badge rounded-pill bg-warning">Unpublished</span></td>
                              <?php } ?>
                          <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a type="button" class="dropdown-item" href="javascript:void(0);" onClick="view('<?php echo $row_rs['item_ID'];?>')"
                                ><i class="bx bx-show me-1"></i> View</a>
                                
                              
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </form>
                </div>
              </div>    
                      <div class="demo-inline-spacing">
                        <!-- Basic Pagination -->
                        <nav aria-label="Page navigation">
                          <ul class="pagination">
                            <li class="page-item first">
                              <a class="page-link" href="?page=1&count=1"
                                ><i class="tf-icon bx bx-chevrons-left"></i
                              ></a>
                            </li>
                            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                              <a class="page-link" 
                              href="<?php if($page <= 1){ 
                                echo '#'; 
                              } 
                              else if($page < $total_pages) { 
                                echo "?page=".($page - 1). "&count=".($_GET['count'] - 40); 
                              }
                              else{
                                echo "?page=".($page - 1). "&count=".($_GET['count'] - ($per_page_record + $last_row ));
                              }?>"
                                ><i class="tf-icon bx bx-chevron-left"></i
                              ></a>
                            </li>
                            <?php
                            if ($total_pages <= 10){  	 
                              for ($counter = 1; $counter <= $total_pages; $counter++){
                              $counterrow = $counter-1;
                              if ($counter == $page) { ?>
                              <li class="page-item active">
                                <a class="page-link"><?php echo $counter ?></a></li>
                              <?php }
                              else{ ?>
                                <li class="page-item">
                                <a class="page-link" href="<?php echo"?page=".$counter. "&count=" .($counter + (19*$counterrow) )?>"><?php echo $counter ?></a>
                              </li>
                              <?php }
                              }
                            } elseif ($total_pages > 10){
                              if($page <= 4) {			
                                for ($counter = 1; $counter < 8; $counter++){
                                  $counterrow = $counter - 1;		 
                                 if ($counter == $page) {?>
                                  <li class="page-item active">
                                    <a class="page-link"><?php echo $counter ?></a></li>
                                  <?php }
                                  else{ ?>
                                    <li class="page-item">
                                    <a class="page-link" href="<?php echo"?page=".$counter. "&count=".($counter + (19*$counterrow) ) ?>"><?php echo $counter ?></a>
                                    </li>
                                  <?php }
                                  } ?>
                                  <li class="page-item">
                                  <a class="page-link" href="javascript:void(0);">...</a>
                                  </li>
                                  <li class="page-item">
                                  <a class="page-link" href="<?php echo"?page=".$second_last. "&count=".($second_last + (19*($second_last-1)) ) ?>"><?php echo $second_last ?></a>
                                  </li>
                                  <li class="page-item">
                                  <a class="page-link" href="<?php echo"?page=".$total_pages. "&count=".($total_pages + (19*($total_pages-1)) ) ?>"><?php echo $total_pages ?></a>
                                  </li>
                            <?php }
                               elseif($page > 4 && $page < $total_pages - 4){ ?>
                                <li class="page-item">
                                <a class="page-link" href="?page=1&count=1">1</a>
                                </li>
                                <li class="page-item">
                                <a class="page-link" href="?page=2&count=21">2</a>
                                </li>
                                <li class="page-item">
                                <a class="page-link" href="javascript:void(0);">...</a>
                                </li>
                                <?php
                                for (
                                $counter = $page - $adjacents;
                                $counter <= $page + $adjacents;
                                $counter++
                                )
                                 {
                                  $counterrow = $counter - 1;
                                  if ($counter == $page){ ?>
                                    <li class="page-item active">
                                    <a class="page-link"><?php echo $counter ?></a></li>
                                  <?php }
                                  else{ ?>
                                    <li class="page-item">
                                    <a class="page-link" href="<?php echo"?page=".$counter. "&count=".($counter + (19*$counterrow) ) ?>"><?php echo $counter ?></a>
                                    </li>
                                  <?php }
                                  } ?>
                                  <li class="page-item">
                                  <a class="page-link" href="javascript:void(0);">...</a>
                                  </li>
                                  <li class="page-item">
                                  <a class="page-link" href="<?php echo"?page=".$second_last. "&count=".($second_last + (19*($second_last-1)) )?>"><?php echo $second_last ?></a>
                                  </li>
                                  <li class="page-item">
                                  <a class="page-link" href="<?php echo"?page=".$total_pages. "&count=".($total_pages + (19*($total_pages-1)) ) ?>"><?php echo $total_pages ?></a>
                                  </li>
                         <?php } else{ ?>
                                    <li class="page-item">
                                    <a class="page-link" href="?page=1&count=1">1</a>
                                    </li>
                                    <li class="page-item">
                                    <a class="page-link" href="?page=2&count=21">2</a>
                                    </li>
                                    <li class="page-item">
                                    <a class="page-link" href="javascript:void(0);">...</a>
                                    </li>
                                    <?php
                                    for (
                                    $counter = $total_pages - 6;
                                    $counter <= $total_pages;
                                    $counter++
                                    )            
                                    {
                                      $counterrow = $counter - 1;
                                      if($counter == $page){ ?>
                                        <li class="page-item active">
                                        <a class="page-link"><?php echo $counter ?></a></li>
                                 <?php } else{ ?>
                                        <li class="page-item">
                                        <a class="page-link" href="<?php echo"?page=".$counter. "&count=".($counter + (19*$counterrow) ) ?>"><?php echo $counter ?></a>
                                        </li>
                                <?php }
                                    } ?>
                            <?php } ?>
                      <?php  } ?>
                            <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
                              <a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1) . "&count=".$_GET['count']; } ?>"
                                ><i class="tf-icon bx bx-chevron-right"></i
                              ></a>
                            </li>
                            <li class="page-item last">
                              <a class="page-link" href="?page=<?php echo $total_pages. "&count=".$last_page_rows; ?>"
                                ><i class="tf-icon bx bx-chevrons-right"></i
                              ></a>
                            </li>
                          </ul>
                        </nav>
                        <!--/ Basic Pagination -->
                      </div>
              <!--/ Responsive Table -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  <!--, made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>-->
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
  </body>
</html>
<?php
}
else if(isset($_SESSION['admin'])){
  
	// store session in var
	$admin = $_SESSION['admin'];
?>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Tables - Adults All</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/logo.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
    
    <script type="text/javascript">
    function del(iid){
      var cof=confirm("Are you sure you want to DELETE "+ iid +"?");
      if(cof==true){
        window.location ='../php/delitem0.php?iid=' + iid;
      }
    }

    function add(){
      window.location = 'add-item.php'
    }
    </script>

  <script type="text/javascript">
    function view(iid){ 
        window.location ='../pages/view-item-details.php?iid=' + iid;
    }
    </script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
          <a href="..\..\wp-admin.php" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img src="..\assets\img\favicon\logo.ico" alt="Brand Logo" style="width:70px;">
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Hidden<br>Smile</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="..\..\wp-admin.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-id-card"></i>
                <div data-i18n="Account Settings">Account Settings</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="pages-account-settings-account.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Account">Account</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- View Users -->
            <li class="menu-item">
                  <a href="tables-user.php?page=1&count=1" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-group"></i>
                    <div data-i18n="Tables">View Users</div>
                  </a>
            </li>
            <!-- Catergories -->
            <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Categories">Categories</div>
                  </a>
              <ul class="menu-sub">
                <li class="menu-item active open">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div data-i18n="Adults">Adults</div>
                  </a>
                  <ul class="menu-sub">
                  <li class="menu-item active">
                  <a href="tables-adult-all.php?page=1&count=1" class="menu-link">
                    <div data-i18n="Adults">All</div>
                  </a>
                  </li>
                  <li class="menu-item">
                  <a href="tables-adult-headloop.php?page=1&count=1" class="menu-link">
                    <div data-i18n="Adults">Headloop</div>
                  </a>
                  </li>
                  <li class="menu-item">
                  <a href="tables-adult-earloop.php?page=1&count=1" class="menu-link">
                    <div data-i18n="Adults">Earloop</div>
                  </a>
                  </li>
                  </ul>
                </li>
                <li class="menu-item active">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div data-i18n="Kids">Kids</div>
                  </a>
                  <ul class="menu-sub">
                  <li class="menu-item">
                  <a href="tables-kid-all.php?page=1&count=1" class="menu-link">
                    <div data-i18n="Adults">All</div>
                  </a>
                  </li>
                  <li class="menu-item">
                  <a href="tables-kid-headloop.php?page=1&count=1" class="menu-link">
                    <div data-i18n="Adults">Headloop</div>
                  </a>
                  </li>
                  <li class="menu-item">
                  <a href="tables-kid-earloop.php?page=1&count=1" class="menu-link">
                    <div data-i18n="Adults">Earloop</div>
                  </a>
                  </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="menu-item">
                  <a href="tables-orders.php?page=1&count=1" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="View User">View Orders</div>
                  </a>
            </li>
            <li class="menu-item">
                  <a href="shippingfee.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-data"></i>
                    <div data-i18n="Shipping Fee">Shipping Fee</div>
                  </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <h6 class="m-0 me-2"> Hi, <?php echo $_SESSION['name']; ?> </h6>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/<?php echo $_SESSION['admindp']; ?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/<?php echo $_SESSION['admindp']; ?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $_SESSION['name']; ?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="pages-account-settings-account.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="..\php\logoutAdmin0.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Striped Rows --> 
              <div class="card">
              
                <div class="d-flex justify-content-between">
                <h5 class="card-header justify-content-start">Users Accounts</h5>
                <div class="demo-inline-spacing">
                  <button type="button" class="btn btn-icon btn-primary" onClick="add()">
                  <span class="tf-icons bx bx-plus"></span>
                  </button>
                  <button type="button" class="btn btn-icon btn-secondary" onClick="location.reload()">
                  <span class="tf-icons bx bx-refresh"></span>
                  </button>
                </div>
                </div>
                <div class="table-responsive text-nowrap">
                <form action="" method="post">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Item Name</th>
                        <th>Item Type</th>
                        <th>Loop Type</th>
                        <th>Stock</th>
                        <th>Actions</th>
                      </tr>
                      
                    </thead>
                    
                    <tbody class="table-border-bottom-0">
                    <?php

                      if (isset($_GET["page"])) {    
                        $page  = $_GET["page"];    
                      }    
                      else {    
                      $page=1;
                      
                      }

                      $per_page_record = 20 ; 
                      $start_from = ($page-1) * $per_page_record;
                      $adjacents = "2";

                      $total_pages_sql = "SELECT COUNT(*) FROM items WHERE categories = 'Adults'";
                      $result = mysqli_query($dbconn,$total_pages_sql);
                      $total_rows = mysqli_fetch_array($result)[0];
                      $total_pages = ceil($total_rows / $per_page_record);
                      $second_last = $total_pages - 1;
                      $third_last= $total_pages - 2;
                      $last_page_rows = $second_last * $per_page_record + 1; 
                      $last_row = $total_rows - ($second_last * $per_page_record);
                      $secondlast_row = $total_rows - ($third_last * $per_page_record);

                      $sql="SELECT * FROM items WHERE categories = 'Adults' ORDER BY item_Type LIMIT $start_from,$per_page_record";
                      $rs = mysqli_query($dbconn, $sql);
                      while($row_rs=mysqli_fetch_assoc($rs))
                      {
                      ?>
                      <tr>
                        <td>
                        <strong><?php echo $_GET['count']++ ?>.</strong></td>
                        </td>
                        <td> <strong><?php echo $row_rs['item_Name']; ?></strong></td>
                        <td><?php echo $row_rs['item_Type']; ?></td>
                        <td>
                        <?php echo $row_rs['loop_Type']; ?>
                        </td>
                        <?php if($row_rs['item_Status']=='Instock') {?>
                        <td><span class="badge rounded-pill bg-success">In Stock</span></td>
                        <?php } else if($row_rs['item_Status']=='Outstock') {?>
                          <td><span class="badge rounded-pill bg-danger">Out of Stock</span></td>
                        <?php } else if($row_rs['item_Status']=='Sold'){ ?>
                            <td><span class="badge rounded-pill bg-secondary">Sold Out</span></td>
                            <?php } else {?>
                              <td><span class="badge rounded-pill bg-warning">Unpublished</span></td>
                              <?php } ?>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a type="button" class="dropdown-item" href="javascript:void(0);" onClick="view('<?php echo $row_rs['item_ID'];?>')"
                                ><i class="bx bx-show me-1"></i> View</a>
                                
                              
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </form>
                </div>
              </div>    
                      <div class="demo-inline-spacing">
                        <!-- Basic Pagination -->
                        <nav aria-label="Page navigation">
                          <ul class="pagination">
                            <li class="page-item first">
                              <a class="page-link" href="?page=1&count=1"
                                ><i class="tf-icon bx bx-chevrons-left"></i
                              ></a>
                            </li>
                            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                              <a class="page-link" 
                              href="<?php if($page <= 1){ 
                                echo '#'; 
                              } 
                              else if($page < $total_pages) { 
                                echo "?page=".($page - 1). "&count=".($_GET['count'] - 40); 
                              }
                              else{
                                echo "?page=".($page - 1). "&count=".($_GET['count'] - ($per_page_record + $last_row ));
                              }?>"
                                ><i class="tf-icon bx bx-chevron-left"></i
                              ></a>
                            </li>
                            <?php
                            if ($total_pages <= 10){  	 
                              for ($counter = 1; $counter <= $total_pages; $counter++){
                              $counterrow = $counter-1;
                              if ($counter == $page) { ?>
                              <li class="page-item active">
                                <a class="page-link"><?php echo $counter ?></a></li>
                              <?php }
                              else{ ?>
                                <li class="page-item">
                                <a class="page-link" href="<?php echo"?page=".$counter. "&count=" .($counter + (19*$counterrow) )?>"><?php echo $counter ?></a>
                              </li>
                              <?php }
                              }
                            } elseif ($total_pages > 10){
                              if($page <= 4) {			
                                for ($counter = 1; $counter < 8; $counter++){
                                  $counterrow = $counter - 1;		 
                                 if ($counter == $page) {?>
                                  <li class="page-item active">
                                    <a class="page-link"><?php echo $counter ?></a></li>
                                  <?php }
                                  else{ ?>
                                    <li class="page-item">
                                    <a class="page-link" href="<?php echo"?page=".$counter. "&count=".($counter + (19*$counterrow) ) ?>"><?php echo $counter ?></a>
                                    </li>
                                  <?php }
                                  } ?>
                                  <li class="page-item">
                                  <a class="page-link" href="javascript:void(0);">...</a>
                                  </li>
                                  <li class="page-item">
                                  <a class="page-link" href="<?php echo"?page=".$second_last. "&count=".($second_last + (19*($second_last-1)) ) ?>"><?php echo $second_last ?></a>
                                  </li>
                                  <li class="page-item">
                                  <a class="page-link" href="<?php echo"?page=".$total_pages. "&count=".($total_pages + (19*($total_pages-1)) ) ?>"><?php echo $total_pages ?></a>
                                  </li>
                            <?php }
                               elseif($page > 4 && $page < $total_pages - 4){ ?>
                                <li class="page-item">
                                <a class="page-link" href="?page=1&count=1">1</a>
                                </li>
                                <li class="page-item">
                                <a class="page-link" href="?page=2&count=21">2</a>
                                </li>
                                <li class="page-item">
                                <a class="page-link" href="javascript:void(0);">...</a>
                                </li>
                                <?php
                                for (
                                $counter = $page - $adjacents;
                                $counter <= $page + $adjacents;
                                $counter++
                                )
                                 {
                                  $counterrow = $counter - 1;
                                  if ($counter == $page){ ?>
                                    <li class="page-item active">
                                    <a class="page-link"><?php echo $counter ?></a></li>
                                  <?php }
                                  else{ ?>
                                    <li class="page-item">
                                    <a class="page-link" href="<?php echo"?page=".$counter. "&count=".($counter + (19*$counterrow) ) ?>"><?php echo $counter ?></a>
                                    </li>
                                  <?php }
                                  } ?>
                                  <li class="page-item">
                                  <a class="page-link" href="javascript:void(0);">...</a>
                                  </li>
                                  <li class="page-item">
                                  <a class="page-link" href="<?php echo"?page=".$second_last. "&count=".($second_last + (19*($second_last-1)) )?>"><?php echo $second_last ?></a>
                                  </li>
                                  <li class="page-item">
                                  <a class="page-link" href="<?php echo"?page=".$total_pages. "&count=".($total_pages + (19*($total_pages-1)) ) ?>"><?php echo $total_pages ?></a>
                                  </li>
                         <?php } else{ ?>
                                    <li class="page-item">
                                    <a class="page-link" href="?page=1&count=1">1</a>
                                    </li>
                                    <li class="page-item">
                                    <a class="page-link" href="?page=2&count=21">2</a>
                                    </li>
                                    <li class="page-item">
                                    <a class="page-link" href="javascript:void(0);">...</a>
                                    </li>
                                    <?php
                                    for (
                                    $counter = $total_pages - 6;
                                    $counter <= $total_pages;
                                    $counter++
                                    )            
                                    {
                                      $counterrow = $counter - 1;
                                      if($counter == $page){ ?>
                                        <li class="page-item active">
                                        <a class="page-link"><?php echo $counter ?></a></li>
                                 <?php } else{ ?>
                                        <li class="page-item">
                                        <a class="page-link" href="<?php echo"?page=".$counter. "&count=".($counter + (19*$counterrow) ) ?>"><?php echo $counter ?></a>
                                        </li>
                                <?php }
                                    } ?>
                            <?php } ?>
                      <?php  } ?>
                            <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
                              <a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1) . "&count=".$_GET['count']; } ?>"
                                ><i class="tf-icon bx bx-chevron-right"></i
                              ></a>
                            </li>
                            <li class="page-item last">
                              <a class="page-link" href="?page=<?php echo $total_pages. "&count=".$last_page_rows; ?>"
                                ><i class="tf-icon bx bx-chevrons-right"></i
                              ></a>
                            </li>
                          </ul>
                        </nav>
                        <!--/ Basic Pagination -->
                      </div>
              <!--/ Responsive Table -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  <!-- , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a> -->
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
  </body>
</html>
<?php
}
else{
  header("Location: auth-login-basic.php");
}

