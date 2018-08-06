<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        ErpDemo: Login
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
    <?= $this->Html->script('jquery.cookie.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="hold-transition login-page">
    <div style="position: absolute; z-index: 999; top: 20px; left: 20px; color: black; font-size: 15px; line-height: 22px;">
        UserName: <b style="font-size: 18px">admin</b> &nbsp;&nbsp;&nbsp; Password: <b style="font-size: 18px">0000</b> <br>
        Microsoft Azure based, 24hours available. Have a try! <br>
    </div>
    <div class="login-box">
        <div class="login-logo">
            <a><b>Erp</b>Demo</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <!--<div asp-validation-summary="All" class="text-danger"></div>-->
            <?= $this->Form->create() ?>
                <div class="form-group has-feedback">
                    <input name="username" type="text" class="form-control" placeholder="UserName">
                    <span class="fa fa-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <span class="fa fa-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button id="btnLogin" type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            <?= $this->Form->end() ?>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <div class="col-xs-4">
    </div>
    <div class="col-xs-4", style="text-align:center; color: black; font-size: 15px; line-height: 22px;">
        <?= $this->Flash->render() ?>
    </div>
    <div class="col-xs-4">
    </div>
<script>
    //Clear menu page cookie
    $.removeCookie("page");
</script>
</body>
</html>