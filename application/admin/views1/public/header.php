<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title><?php echo $n_name;?>-<?php echo $title;?>-满荣网络网站后台管理系统 PHP 版本 v <?php echo $version['version'];?></title>

        <meta name="description" content="Static &amp; Dynamic Tables" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-fonts.css" /> 

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" id="main-ace-style" />

        <!--[if lte IE 9]>
            <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-part2.min.css" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
         <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" /> 

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
       <script src="<?php echo base_url();?>assets/js/ace-extra.min.js"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="<?php echo base_url();?>assets/js/html5shiv.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/respond.min.js"></script>
        <![endif]-->
        <style>
            .file,.file1,.file2 {
                position: relative;
                display: inline-block;
                background: #D0EEFF;
                border: 1px solid #99D3F5;
                border-radius: 4px;
                padding: 0px 12px;
                overflow: hidden;
                color: #1E88C7;
                text-decoration: none;
                text-indent: 0;
                line-height: 20px;
            }
            .file input,.file1 input,.file2 input {
                position: absolute;
                font-size: 100px;
                right: 0;
                top: 0;
                opacity: 0;
            }
            .file:hover,.file1:hover,.file2:hover {
                background: #AADFFD;
                border-color: #78C3F3;
                color: #004974;
                text-decoration: none;
            }
            .table-bordered#sample-table-1 th{font-size: 13px;height: 22px;line-height: 22px;background: #f5f5f5;padding:3px 8px;}
            .table-bordered#sample-table-1 td{font-size: 12px;height: 20px;line-height: 20px;}
        </style>
    </head>

    <body class="no-skin">
        <!-- #section:basics/navbar.layout -->
        <div id="navbar" class="navbar navbar-default" style="max-height:40px;">
            <script type="text/javascript">
                try{ace.settings.check('navbar' , 'fixed')}catch(e){}
            </script>

            <div class="navbar-container" id="navbar-container">
                <!-- #section:basics/sidebar.mobile.toggle -->
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <!-- /section:basics/sidebar.mobile.toggle -->
                <div class="navbar-header pull-left">
                    <!-- #section:basics/navbar.layout.brand -->
                    <a href="#" class="navbar-brand">
                        <small>
                            <i class="fa fa-leaf"></i>
                            满荣网络网站后台管理系统 PHP 版本 v <?php echo $version['version'];?>
                        </small>
                    </a>

                    <!-- /section:basics/navbar.layout.brand -->

                    <!-- #section:basics/navbar.toggle -->

                    <!-- /section:basics/navbar.toggle -->
                </div>

                <!-- #section:basics/navbar.dropdown -->
                <div class="navbar-buttons navbar-header pull-right" role="navigation" style="height:40px;">
                    <ul class="nav ace-nav">
                        

                        
                        

                        <!-- #section:basics/navbar.user_menu -->
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="<?php echo base_url();?>assets/avatars/user.jpg" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>欢迎登陆</small>
                                    <?php echo $user['ma_username'];?>
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <!-- <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-cog"></i>
                                        Settings
                                    </a>
                                </li>
                                -->
                                <li>
                                    <a href="<?php echo site_url('/Manager/personinfo');?>">
                                        <i class="ace-icon fa fa-user"></i>
                                        个人信息
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="<?php echo site_url('/Login/loginOut');?>">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        退出登陆
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- /section:basics/navbar.user_menu -->
                    </ul>
                </div>
                <div style="float:right; display:inline; color:#fff; line-height:45px; font-size:14px; padding-right:15px;" id="day_day">今天是2017年7月12日 星期三  上午 11:19:10</div>
                <div style="float:right; display:inline; line-height:45px; font-size:14px; padding-right:15px;"><a style="color:#fff;text-decoration:underline;" href="<?php echo base_url();?>" target="_blank">网站首页</a></div>
                <!-- /section:basics/navbar.dropdown -->
            </div><!-- /.navbar-container -->
        </div>

        <!-- /section:basics/navbar.layout -->
        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>

            <!-- #section:basics/sidebar -->
            <div id="sidebar" class="sidebar responsive">
                

             