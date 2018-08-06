<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- CSS -->
    <?= $this->Html->css('AdminLTE.min.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('ionicons.min.css') ?>
    <?= $this->Html->css('skin-blue.min.css') ?>
    <?= $this->Html->css('common.css') ?>
    <?= $this->Html->css('main.css') ?>
    <!-- JS -->
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('adminlte.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('common.js') ?>
    <?= $this->Html->script('/layer/dist/layer.js') ?>
    <?= $this->Html->script('jquery.cookie.js') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

       <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a asp-controller="Home" asp-action="About" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Erp</b>Demo</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the messages -->
                                    <ul class="menu">
                                        <li>
                                            <!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <!-- User Image -->
                                                    <img src="../../../webroot/img/avatar3.png" class="img-circle" alt="User Image">
                                                </div>
                                                <!-- Message title and timestamp -->
                                                <h4>
                                                    Develop Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <!-- The message -->
                                                <p>This is a ERP Demo</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                    </ul>
                                    <!-- /.menu -->
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- /.messages-menu -->
                        <!-- Notifications Menu -->
                        <li class="dropdown notifications-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- Inner Menu: contains the notifications -->
                                    <ul class="menu">
                                        <li>
                                            <!-- start notification -->
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> Have a nice day
                                            </a>
                                        </li>
                                        <!-- end notification -->
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks Menu -->
                        <li class="dropdown tasks-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- Inner menu: contains the tasks -->
                                    <ul class="menu">
                                        <li>
                                            <!-- Task item -->
                                            <a href="#">
                                                <!-- Task title and progress text -->
                                                <h3>
                                                    Design some functions
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <!-- The progress bar -->
                                                <div class="progress xs">
                                                    <!-- Change the css width attribute to simulate progress -->
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                                         aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="../../../webroot/img/avatar3.png" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">Admin</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="../../../webroot/img/avatar3.png" class="img-circle" alt="User Image">

                                    <p>
                                        Admin - Erp Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                   <!-- <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Followers</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Sales</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Friends</a>
                                            </div>
                                        </div> -->
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <?= $this->Html->link('Profile', ['controller' => 'Pages', 'action' => 'display', 'about_us'], ['class' => 'btn btn-default btn-flat']);?>
                                    </div>
                                    <div class="pull-right">
                                        <?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout', 'login'], ['class' => 'btn btn-default btn-flat']);?>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->

                        <li class="dropdown messages-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-gears"></i>
                            </a>
                            <ul class="dropdown-menu pull-right" style="width:100%">
                                <li> <?= $this->Html->link('<i class="fa fa-user"></i>'.__('Profile', true), ['controller' => 'Pages', 'action' => 'display', 'about_us'], ['escape' => false]); ?> </li>
                                <!-- <li><a href="javascript:void();"><i class="fa fa-inbox"></i>Inbox</a></li>
                                    <li><a href="javascript:void();"><i class="fa fa-paint-brush"></i>Options</a></li> -->
                                <li class="divider"></li>
                                <li> <?= $this->Html->link('<i class="ace-icon fa fa-power-off"></i>'.__('Logout', true), ['controller' => 'Users', 'action' => 'logout', 'login'], ['escape' => false]); ?> </li>
                               
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../../../webroot/img/avatar3.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Admin</p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
            
                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="treeview" id="Administration">
                        <a href="#">
                            <i class="fa fa-server"></i>
                            <span>Administration</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li> <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__('Notices', true), ['controller' => 'Notices', 'action' => 'index'], ['escape' => false]); ?> </li>
                        </ul>
                    </li>
                    <li class="treeview" id="Business">
			<a href="#">
                            <i class="fa fa-briefcase"></i> <span>Business</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
			</a>
			<ul class="treeview-menu">
                            <li> <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Categories', true), ['controller' => 'Categories', 'action' => 'index'], ['escape' => false]); ?> </li>
                            <li> <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Products', true), ['controller' => 'Products', 'action' => 'index'], ['escape' => false]); ?> </li>
                            <li> <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Orders', true), ['controller' => 'Orders', 'action' => 'index'], ['escape' => false]); ?> </li>
                            <li> <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Stocks', true), ['controller' => 'Stocks', 'action' => 'index'], ['escape' => false]); ?> </li>
			</ul>
                    </li>
                    
                    <li class="treeview" id="Sales">
                        <a href="#">
                            <i class="fa fa-bar-chart"></i>
                            <span>Sales</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li> <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__(' Reports', true), ['controller' => 'Sales', 'action' => 'index'], ['escape' => false]); ?> </li>
                        </ul>
                    </li>
                    <li class="treeview" id="HR">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>HR</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                           <li> <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__('Employees', true), ['controller' => 'Pages', 'action' => 'display', 'comming'], ['escape' => false]); ?> </li>
                        </ul>
                    </li>
                    <li class="treeview" id="Finance">
                        <a href="#">
                            <i class="fa fa-university"></i>
                            <span>Finance</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                           <li> <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__('Invoices', true), ['controller' => 'Pages', 'action' => 'display', 'comming'], ['escape' => false]); ?> </li>
                        </ul>
                    </li>
                    <li class="treeview" id="Tools">
                        <a href="#">
                            <i class="fa fa-gear"></i>
                            <span>Tools</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                           <li> <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__('System Options', true), ['controller' => 'Pages', 'action' => 'display', 'comming'], ['escape' => false]); ?> </li>
                           <li> <?= $this->Html->link('<i class="fa fa-circle-o"></i>'.__('Data Process', true), ['controller' => 'Pages', 'action' => 'display', 'comming'], ['escape' => false]); ?> </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content container-fluid">

                <?= $this->fetch('content') ?>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Version 2.1
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2018 <a href="#">ErpDemo</a>.</strong> Gordon Duan.
        </footer>

        <!-- Control Sidebar -->
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>

    <script>
        $(function () {
            $('.sidebar-menu li').each(function (i) {
                $(this).click(function () {
                    var page = $(this).attr("id");
                    if (page != null) {
                        $.cookie("page", page, { path: "/" });
                    }
                })
            });
        });
        $("#" + $.cookie("page")).addClass("active menu-open");
    </script>

</body>
</html>

