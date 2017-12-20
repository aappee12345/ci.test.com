<ul class="nav nav-list">
                    <li class="">
                        <a href="<?php echo base_url();?>admin.php/Main/index">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text"> 后台首页 </span>
                        </a>
                    </li>
                    <?php if (isset($act) && ($act=='peizhi' || $act=='log' || $act=='func' || $act=='levelup' || $act=='mbgl')):?>
                    <li class="active">
                    <?php else:?>
                    <li class="">
                    <?php endif;?>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text"> 基本信息 </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <?php if (isset($act) && $act=='peizhi'):?>
                            <li class="active">
                            <?php else:?>
                            <li class="">
                            <?php endif;?>
                                <a href="<?php echo site_url('Net/index/1');?>">
                                    <i class="menu-icon fa fa-caret-right"></i>

                                    网站配置
                                    <!-- <b class="arrow fa fa-angle-down"></b> -->
                                </a>

                                <b class="arrow"></b>

                            </li>

                            <?php if (isset($act) && $act=='log'):?>
                            <li class="active">
                            <?php else:?>
                            <li class="">
                            <?php endif;?>
                                <a href="<?php echo site_url('Log/index');?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    日志管理
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <?php if (isset($act) && $act=='arealist'):?>
                            <li class="active">
                            <?php else:?>
                            <li class="">
                            <?php endif;?>
                                <a href="<?php echo site_url('Area/index');?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    地区管理
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <?php if (isset($act) && $act=='levelup'): ?>
                            <li class="active">
                            <?php else: ?>
                            <li>
                            <?php endif; ?>
                                <a href="<?php echo site_url('Net/levelUp');?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    在线升级
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <?php if (isset($act) && $act=='mbgl'): ?>
                            <li class="active">
                            <?php else: ?>
                            <li>
                            <?php endif; ?>
                                <a href="<?php echo site_url('Muban/index');?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    模板管理
                                </a>
                                <b class="arrow"></b>
                            </li>
                            
                            <!--
                            <li class="">
                                <a href="elements.html">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    功能管理
                                </a>
                                <b class="arrow"></b>
                            </li>
                            -->
                        </ul>
                    </li>
                    <!-- active open -->
                    <?php if (isset($act) && ($act=='catelist' || $act=='addcate' || $act=='updatecate')):?>
                    <li class="active">
                    <?php else:?>
                    <li>
                    <?php endif;?>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text"> 栏目管理 </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <?php if (isset($act) && $act=='catelist'):?>
                            <li class="active">
                            <?php else:?>
                            <li>
                            <?php endif;?>
                                <a href="<?php echo site_url('Category/index');?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    栏目列表
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <?php if (isset($act) && ($act=='addcate'||$act=='updatecate')):?>
                            <li class="active">
                            <?php else:?>
                            <li>
                            <?php endif;?>
                                <a href="<?php echo site_url('Category/add');?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    添加栏目
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    <?php if (isset($act) && ($act=='articlelist' || $act=='addarticle' || $act=='updatearticle')):?>
                    <li class="active">
                    <?php else:?>
                    <li>
                    <?php endif;?>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list-alt"></i>
                            <span class="menu-text"> 内容管理 </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <?php if (isset($act) && ($act=='articlelist')):?>
                            <li class="active">
                            <?php else:?>
                            <li>
                            <?php endif;?>
                                <a href="<?php echo site_url(array('Article','index','0'));?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    文章列表
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <?php if (isset($act) && ($act=='addarticle' || $act=='updatearticle')):?>
                            <li class="active">
                            <?php else:?>
                            <li>
                            <?php endif;?>
                                <a href="<?php echo site_url(array('Article','add','0'));?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    添加文章
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <?php if (isset($act) && ($act=='adlist' || $act=='addad' || $act=='updatead' || $act=='guanggaolist' || $act=='addguanggao' || $act=='updateguanggao')): ?>
                        <li class="active">
                    <?php else: ?>
                        <li>
                    <?php endif; ?>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-picture-o"></i>
                            <span class="menu-text"> 广告位管理 </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <?php if (isset($act) && ($act=='adlist' || $act=='updatead' || $act=='guanggaolist' || $act=='addguanggao' || $act=='updateguanggao')): ?>
                            <li class="active">
                            <?php else: ?>
                            <li>
                            <?php endif; ?>
                                <a href="<?php echo site_url('Ad/index');?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    广告位列表
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <?php if (isset($act) && $act=='addad'): ?>
                            <li class="active">
                            <?php else: ?>
                            <li>
                            <?php endif; ?>
                                <a href="<?php echo site_url('Ad/add');?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    添加广告位
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    <?php if (isset($act) && ($act=='linktypelist' || $act=='addlinktype' || $act=='updatelinktype' || $act=='linklist' || $act=='addlink' || $act=='updatelink')): ?>
                    <li class="active">
                    <?php else: ?>
                    <li>
                    <?php endif; ?>
                    
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-tags"></i>
                            <span class="menu-text">友情链接管理</span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <?php if (isset($act) && ($act=='linktypelist' || $act=='updatelinktype' || $act=='linklist' || $act=='addlink' || $act=='updatelink')): ?>
                            <li class="active">
                            <?php else: ?>
                            <li>
                            <?php endif; ?>
                            
                                <a href="<?php echo site_url('Linktype/index');?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    链接分类列表
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <?php if (isset($act) && $act=='addlinktype'): ?>
                            <li class="active">
                            <?php else: ?>
                            <li>
                            <?php endif; ?>
                                <a href="<?php echo site_url('Linktype/add'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    新增链接分类
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    <?php if (isset($act) && ($act=='commonlist' || $act=='addcommon' || $act=='updatecommon')): ?>
                    <li class="active">
                    <?php else: ?>
                    <li>
                    <?php endif; ?>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> 其他内容 </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        <ul class="submenu">
                            <?php if (isset($act) && ($act=='commonlist' || $act=='updatecommon')): ?>
                            <li class="active">
                            <?php else: ?>
                            <li>
                            <?php endif; ?>
                                <a href="<?php echo site_url('Common/index'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    列表
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <?php if (isset($act) && $act=='addcommon'): ?>
                            <li class="active">
                            <?php else: ?>
                            <li>
                            <?php endif; ?>
                                <a href="<?php echo site_url('Common/add'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    新增
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    <?php if (isset($act) && ($act=='guestlist' || $act=='updateguest')): ?>
                    <li class="active">
                    <?php else: ?>
                    <li>
                    <?php endif; ?>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-file-o"></i>
                            <span class="menu-text"> 留言管理 </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <?php if (isset($act) && ($act=='guestlist' || $act=='updateguest')): ?>
                            <li class="active">
                            <?php else: ?>
                            <li>
                            <?php endif; ?>
                                <a href="<?php echo site_url('Guestbook/index')?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    留言列表
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <?php if (isset($act) && ($act=='managerlist' || $act=='manageradd'|| $act=='managerupdate')): ?>
                    <li class="active">
                    <?php else:?>
                    <li>
                    <?php endif; ?>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text">
                                管理员管理
                            </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <?php if (isset($act) && ($act=='managerlist' || $act=='managerupdate')): ?>
                            <li class="active">
                            <?php else: ?>
                            <li>
                            <?php endif; ?>
                                <a href="<?php echo site_url('Manager/index')?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    列表
                                </a>
                                <b class="arrow"></b>
                            </li>
                            <?php if (isset($act) && $act=='manageradd'): ?>
                            <li class="active">
                            <?php else: ?>
                            <li>
                            <?php endif; ?>
                                <a href="<?php echo site_url('Manager/add');?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    新增
                                </a>
                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    <?php if (isset($act) && ($act=='rolelist' || $act=='addrole' || $act=='updaterole')): ?>
                    <li class="active">
                    <?php else: ?>
                    <li>
                    <?php endif; ?>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon glyphicon glyphicon-user"></i>
                            <span class="menu-text">
                                角色管理
                            </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                            <?php if (isset($act) && ($act=='rolelist' || $act=='updaterole')): ?>
                            <li class="active">
                            <?php else: ?>
                            <li>
                            <?php endif; ?>
                                <a href="<?php echo site_url('Role/index'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    列表
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <?php if (isset($act) && $act=='addrole'): ?>
                            <li class="active">
                            <?php else: ?>
                            <li>
                            <?php endif; ?>
                                <a href="<?php echo site_url('Role/add'); ?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    新增
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                    
                </ul><!-- /.nav-list -->
