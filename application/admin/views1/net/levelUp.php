            </div>
            <div class="main-content">
                <div class="breadcrumbs" id="breadcrumbs">
                    <script type="text/javascript">
                        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                    </script>

                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="<?php echo site_url('/Main/index'); ?>">首页</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('/Net/levelup');?>">基本信息</a>
                        </li>
                        <li class="active">在线升级</li>
                    </ul>
                </div>
                <div class="page-content">
                    <div class="ace-settings-container" id="ace-settings-container">
                        <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                            <i class="ace-icon fa fa-cog bigger-150"></i>
                        </div>
                        <div class="ace-settings-box clearfix" id="ace-settings-box">
                            <div class="pull-left width-50">
                                <!-- #section:settings.skins -->
                                <div class="ace-settings-item">
                                    <div class="pull-left">
                                        <select id="skin-colorpicker" class="hide">
                                            <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                            <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                            <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                            <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                        </select>
                                    </div>
                                    <span>&nbsp; 选择皮肤</span>
                                </div>
                                <div class="ace-settings-item">
                                    <label class="lbl" for="ace-settings-hover"> <!-- Submenu on Hover --></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="page-content-area">
                        <div class="page-header">
                            <h1>
                                在线升级
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                </small>
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">
        <style>
            .inputs{display:none;width:40px;}
        </style>
        <form class="form-horizontal" action="<?php echo site_url('/Manager/batchDelManager'); ?>" method="post">
            <div class="row">
                <div class="col-xs-12">
                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <tr>
                            <th class="center" width="50%">我的版本号</th>
                            <th class="center">我的更新时间</th>
                        </tr>
                        <tr>
                            <td class="center"><?php echo $config['name'].$config['version'];?></td>
                            <td class="center"><?php echo $config['update'];?></td>
                        </tr>
                    </table>
					<br>
                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <tr>
                            <th class="left" width="10%">可升级版本列表</th>
                            <th class="left" width="70%">更新日志</th>
                            <th class="left" width="10%">更新时间</th>
                            <th class="left" width="10%">操作</th>
                        </tr>
                        <?php foreach ($uplist as $up):?>
                        <tr>
                            <?php if ($up['b_banben']>$config['version']):?>
                            <td class="left"><?php echo $up['b_banben'];?></td>
                            <td class="left"><?php echo strip_tags($up['update_log'],'<br/>');?></td>
                            <td class="left"><?php echo date('Y-m-d',$up['updated_at']);?></td>
                            <td class="left"><a href="<?php echo site_url(array('net','levelUp',$up['b_banben']));?>" onclick="update()">升级</a></td>
                            <?php else:?>
                            <!--已升级-->
                            <td class="left"><?php echo $up['b_banben'];?></td>
                            <td class="left"><?php echo strip_tags($up['update_log'],'<br/>');?></td>
                            <td class="left"><?php echo date('Y-m-d',$up['updated_at']);?></td>
                            <td class="left"><a href="javascript:void(0);" style="color:#ccc;">已升级</a></td>
                            <?php endif;?>
                        </tr>
                        <?php endforeach;?>
                        
                    </table>
                    <div class="clear">
                        <input type="submit" class="btn-danger btn" style="float:left;margin:20px 0;padding:0;" value="删除选中"/>
                    </div>
                </div>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.bk{display:none;position:absolute;left:0;top:0;width:100%;height: 100%;background: rgba(0,0,0,0.6) url(/assets/images/uping.gif) no-repeat center center;z-index:10;}
</style>
<div class="bk"></div>
<script>
    function update()
    {
        $(".bk").show();
    }
</script>