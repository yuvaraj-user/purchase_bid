            <!-- ========== Left Sidebar Start ========== -->

          

            <div class="leftside-menu">

                <!-- Brand Logo Light -->
                <a href="../pages/landing.php" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/logo.png" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="small logo">
                    </span>
                </a>

                <!-- Brand Logo Dark -->
                <a href="../pages/landing.php" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="../global/photos/logo.png" alt="dark logo" style="width: 80px;height: 40px;">
                    </span>
                    <span class="logo-sm">
                        <img src="../assets/images/VijayRasiSeedsLogo.png" alt="small logo">
                    </span>
                </a>

                <!-- Sidebar Hover Menu Toggle Button -->
                <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
                    <i class="ri-checkbox-blank-circle-line align-middle"></i>
                </div>

                <!-- Full Sidebar Menu Close Button -->
                <div class="button-close-fullsidebar">
                    <i class="ri-close-fill align-middle"></i>
                </div>

                <!-- Sidebar -left -->
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <!-- Leftbar User -->
                    <div class="leftbar-user p-3 text-white">
                        <a href="javascript:void(0);" class="d-flex align-items-center text-reset">
                            <div class="flex-shrink-0">
                                <img src="assets/images/users/avatar-1.jpg" alt="user-image" height="42" class="rounded-circle shadow">
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <span class="fw-semibold fs-15 d-block"><?php echo $_SESSION['Name'] ?></span>
                                <span class="fs-13"><?php echo $user_data['Designation'] ?></span>
                            </div>
                            <div class="ms-auto">
                                <i class="ri-arrow-right-s-fill fs-20"></i>
                            </div>
                        </a>
                    </div>

               
                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        <li class="side-nav-title mt-1"> Main</li>

                         <li class="side-nav-item">
                            <a href="Requestbid.php" class="side-nav-link">
                                <!-- <i class="ri-dashboard-2-fill"></i> -->
                                <i class="bi bi-ui-checks-grid"></i>
                                <!-- <span class="badge bg-success float-end">9+</span> -->
                                <span>Bidding Request</span>
                            </a>
                        </li>

                          <li class="side-nav-item">
                            <a href="Bid.php" class="side-nav-link">
                                <!-- <i class="ri-dashboard-2-fill"></i> -->
                                <i class="ri-calendar-2-fill"></i>
                                <!-- <span class="badge bg-success float-end">9+</span> -->
                                <span>Live Bidding</span>
                            </a>
                        </li>


                         <li class="side-nav-item">
                            <a href="Bidding_Confirmation.php" class="side-nav-link">
                                <!-- <i class="ri-dashboard-2-fill"></i> -->
                                <i class="ri-clipboard-fill"></i>
                                <!-- <span class="badge bg-success float-end">9+</span> -->
                                <span>Bidding Confirmation</span>
                            </a>
                        </li>
                      

                    </ul>
                    <!--- End Sidemenu -->

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- ========== Left Sidebar End ========== -->