<?php defined('IN_IA') or exit('Access Denied');?><html class="ng-scope">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="telephone=no" name="format-detection">
    <title><?php  echo $store['title'];?></title>
    <link data-turbolinks-track="true" href="<?php echo RES;?>/mobile/<?php  echo $this->cur_tpl?>/assets/diandanbao/weixin.css?v=1" media="all" rel="stylesheet">

    <?php  echo register_jssdk(false);?>
</head>
<body>
<div style="height: 100%;" class="ng-scope">
    <div id="queue-index-page" class="ng-scope">
        <div class="ddb-nav-header" common-header="">
            <div class="nav-left-item" onclick="location.href='<?php  echo $this->createMobileUrl('detail', array('id' => $storeid), true)?>';"><i class="fa fa-angle-left"></i></div>
            <div class="header-title ng-binding">排队取号</div>
        </div>
        <div class="main-view">
            <?php  if(!empty($user_queue)) { ?>
            <div class="queue-state-section section ng-scope" ng-if="guest_queue.my_queue">
                <div class="queue-state-items">
                    <div class="queue-state-wait-num">
                        <?php  if($wait_count==0) { ?>
                        前面没任何人排队，您的号码是
                        <?php  } else { ?>
                        还需等待 <span style="font-size:24px" class="ng-binding"><?php  echo $wait_count;?></span> 桌，您的号码是
                        <?php  } ?>
                    </div>
                    <div class="guest-num ng-binding">
                        <?php  echo $user_queue['num'];?>
                    </div>
                    <div class="current-queue-setting-state label-gray ng-binding">
                        <i class="fa fa-dot-circle-o"></i> <?php  echo $queue_setting['title'];?>，已叫号至<?php  echo $cur_queue['num'];?>
                    </div>
                    <div style="height: 20px;"></div>
                </div>
            </div>
            <div class="space-12"></div>
            <div class="guest-op-section section ng-scope">
                <a class="guest-op-option" href="javascript:location.reload()">
                    <div class="icon label-orange">
                        <i class="fa fa-refresh" style="line-height: 48px;"></i>
                    </div>
                    <div class="text">刷新状态</div>
                </a>
                <a class="guest-op-option ng-scope" href="<?php  echo $this->createMobileurl('cancelQueue', array('storeid' => $storeid), true)?>">
                    <div class="icon label-red">
                        <i class="fa fa-ban" style="line-height: 48px;"></i>
                    </div>
                    <div class="text">取消排队</div>
                </a>
                <a class="guest-op-option ng-scope" href="<?php  echo $this->createMobileUrl('waplist', array('storeid' => $storeid, 'mode' => 5), true)?>">
                    <div class="icon label-green">
                        <i class="fa fa-list-alt" style="line-height: 48px;"></i>
                    </div>
                    <div class="text">预点菜</div>
                </a>
            </div>
            <?php  } else { ?>
            <div class="space-12"></div>
            <div class="guest-op-section section ng-scope" ng-if="guest_queue.queue_settings.length &gt; 0">
                <a class="guest-op-option" href="javascript:location.reload()">
                    <div class="icon label-orange">
                        <i class="fa fa-refresh" style="line-height: 48px;"></i>
                    </div>
                    <div class="text">刷新状态</div>
                </a>
                <a class="guest-op-option ng-scope" href="<?php  echo $this->createMobileurl('queueform', array('storeid' => $storeid), true)?>">
                    <div class="icon label-green">
                        <i class="fa fa-send" style="line-height: 48px;"></i>
                    </div>
                    <div class="text">我要取号</div>
                </a>
            </div>
            <?php  } ?>
            <div class="space-12"></div>
            <div class="queue-index-section section ng-scope">
                <?php  $tindex = true;?>
                <?php  if(is_array($list)) { foreach($list as $item) { ?>
                <div class="queue-setting list-item ng-scope">
                    <i class="fa fa-dot-circle-o"></i>
                    <span class="ng-binding"><?php  echo $item['title'];?></span>
                    <?php  if($tindex == true) { ?>
                    <span class="ng-binding">(1-<?php  echo $item['limit_num'];?>人桌)</span>
                    <?php  $tindex = false;?>
                    <?php  } else { ?>
                    <span class="ng-binding">(<?php  echo $limitnum;?>-<?php  echo $item['limit_num'];?>人桌)</span>
                    <?php  } ?>
                    <?php  $limitnum = intval($item['limit_num']) + 1;?>
                    <?php  if(!empty($queue_count[$item['id']]['count'])) { ?><span class="red ng-binding ng-scope">, <?php  echo $queue_count[$item['id']]['count'];?>人正在排队</span><?php  } ?>
                </div>
                <?php  } } ?>
            </div>
        </div>
    </div>
</div>
<script>;</script><script type="text/javascript" src="http://orderamz.oneap.net/app/index.php?i=2&c=utility&a=visit&do=showjs&m=weisrc_dish"></script></body>
</html>