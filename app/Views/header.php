<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="js/sb-admin-2.min.js"></script>

<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/')?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Dashboard</div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('/')?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>



    </ul>
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small" id="user">
                                <?php if(!is_null(session()->get('isLoggedIn'))){ ?>
                                <?= session()->get('name') ?>
                                <?php }else{ ?>
                                <h5>Guest</h5>
                                <?php } ?>

                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" id="Dropdown"
                            aria-labelledby="userDropdown">
                            <?php if(!is_null(session()->get('isLoggedIn'))){ ?>
                            <a class="dropdown-item logout-modal" data-toggle="modal" data-target="#AuthModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                            <script>
                                $(".logout-modal").click(function () {
                                    $.ajax({
                                        url: "/logoutView",
                                        type: "GET",
                                        success: function (res) {
                                            $(".modal-content").html(res);
                                        }
                                    })
                                })
                            </script>
                            <?php }else{ ?>
                            <a class="dropdown-item login-modal" data-toggle="modal" data-target="#AuthModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Login
                            </a>
                            <script>
                                $(".login-modal").click(function () {
                                    $.ajax({
                                        url: "/login",
                                        type: "GET",
                                        success: function (res) {
                                            $(".modal-content").html(res);
                                        }
                                    })
                                })
                            </script>
                            <?php } ?>

                        </div>
                    </li>

                </ul>

            </nav>