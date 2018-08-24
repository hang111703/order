<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <title><?php  echo $store['title'];?></title>
    <link rel="stylesheet" type="text/css" href="<?php  echo $this->cur_mobile_path?>/css/api.css"/>
    <link rel="stylesheet" type="text/css" href="<?php  echo $this->cur_mobile_path?>/css/common.css?v=7"/>
    <link rel="stylesheet" type="text/css" href="<?php  echo $this->cur_mobile_path?>/css/goods-two.css?v=10"/>
    <link rel="stylesheet" type="text/css" href="<?php  echo $this->cur_mobile_path?>/css/fakeLoader.css">
    <link rel="stylesheet" href="<?php  echo $this->cur_mobile_path?>/css/weui.min.css">
    <link rel="stylesheet" href="<?php  echo $this->cur_mobile_path?>/css/open-popupx.css?v=3">
    <script src="<?php  echo $this->cur_mobile_path?>/script/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="<?php  echo $this->cur_mobile_path?>/mvalidate/validate.css" />
    <script type="text/javascript" src="<?php  echo $this->cur_mobile_path?>/mvalidate/jquery-mvalidate.js" ></script>
    <style>
        .top-btn2 {
            position: fixed;
            right: 5px;
            top: 105px;
            width: auto;
            height: auto;
            z-index: 8998;

        }

        .top-btn2 a {
            line-height: 30px;
            background: rgba(0, 0, 0, .63);
            border-radius: 20px;
            padding-right: 10px;
            padding-left: 10px;
            color: #fff;
            overflow: hidden;
            text-align: center;
            font-size: 12px;
        }
        .rest{
            position: fixed;bottom: 0;left: 0;right: 0;z-index: 3;line-height: 60px;font-size: 20px;background-color: rgba(0, 0, 0, .7);color: #ccc;text-align: center
        }
        .text-icon {
            color: #fff;
        }

        .top-btn3 {
            position: fixed;
            right: 30px;
            /*bottom: 95px;*/
            top: 150px;
            width: 40px;
            height: auto;
            z-index: 8998;
            line-height: 15px;
            /*background: #4cd964;*/
            background: #FE4F4E;
            opacity: 0.83;
            border-radius: 1000px;
            padding: 5px 5px 5px 5px;
            color: #fff;
            overflow: hidden;
            text-align: center;
            font-size: 12px;
        }

        .ziyou-tc {
            background: #FFFFFF;
        }

        .ziyou {
            z-index: 9999;
            position: absolute;
            background-image: url("<?php  echo $this->cur_mobile_path?>/image/x.png");
            background-size: 45px 45px;
            /*设定TRBL*/
            right: 15px;
            top: 15px;
            width: 45px;
            height: 45px;
        }
    </style>
</head>
<body>
<div class="fakeloader"></div>
<?php  include $this->template($this->cur_tpl.'/_pop');?>
<div class="top-btn2">
    <?php  if($mode==1 || ($intelligents && $store['is_intelligent']==1)) { ?>
    <?php  if($is_add_order==1) { ?>
    <a href="<?php  echo $this->createMobileUrl('waplist', array('mode' => 1, 'storeid' => $storeid, 'tablesid' => $tablesid, 'append' => 1), true)?>">
        <i class="text-icon">我要加单</i>
    </a>
    <?php  } ?>
    <?php  if($mode==1) { ?>
    <?php  if($store['is_operator2']==1) { ?>
    <a href="<?php  echo $this->createMobileUrl('SendOperatorNotice', array('storeid' => $storeid, 'mode' => $mode, 'tablesid' => $tablesid, 'type' => 2), true)?>">
        <i class="text-icon">我要打包</i>
    </a>
    <?php  } ?>
    <?php  if($store['is_operator1']==1) { ?>
    <a href="<?php  echo $this->createMobileUrl('SendOperatorNotice', array('storeid' => $storeid, 'mode' => $mode, 'tablesid' => $tablesid, 'type' => 1), true)?>">
        <i class="text-icon">呼叫服务员</i>
    </a>
    <?php  } ?>
    <?php  } ?>
    <?php  } ?>
</div>
<?php  if($intelligents && $store['is_intelligent']==1) { ?>
<div class="top-btn3">
    <a href="<?php  echo $this->createMobileUrl('WapSelect', array('storeid' => $storeid, 'mode' => $mode, 'tablesid' => $tablesid), true)?>">
        <i class="text-icon">智能推荐</i>
    </a>
</div>
<?php  } ?>
<div id="wrap1">
    <!--background-color: #444;-->
    <?php  $pagecolor = "background: #3190e8;";?>
    <?php  $pagecolor = "background: rgba(0, 0, 0, 0) linear-gradient(to right, #6a3f34 0px, #a57664 50%, #9995a3 100%) repeat scroll 0 0;";?>

    <div id="header" style="<?php  echo $pagecolor;?>">
        <!--<div id="header" style="background: rgba(0, 0, 0, 0) linear-gradient(to right, #6a3f34 0px, #a57664 50%, #9995a3 100%) repeat scroll 0 0;"> -->
        <div class="back" onclick="history.go(-1)">
            <i class="i-back"></i>
        </div> 
        <div class="flex-full"></div>
        
        <div class="search" onclick="jumpsearch();">
            <i class="i-search"></i>
        </div>
        <div class="favorite" onclick="history.go(-1)">
            <i class="i-share"></i>
        </div>
    </div>
    
    <div class="shop" style="<?php  echo $pagecolor;?>">
        <!--<div class="shop" style="background: rgba(0, 0, 0, 0) linear-gradient(to right, #6a3f34 0px, #a57664 50%, #9995a3 100%) repeat scroll 0 0;">-->
        <div class="shopheader-main">
            <img class="shopheader-logo" src="<?php  echo tomedia($store['logo']);?>">

            <div class="shopheader-content">
                <h2 class="shopheader-name"><?php  if($mode == 1) { ?>店内<?php  } else { ?><?php  if($mode == 2) { ?>外卖<?php  } else { ?><?php  if($mode == 3) { ?>预订<?php  } else { ?><?php  if($mode == 4) { ?>快餐<?php  } else { ?><?php  if($mode == 5) { ?>店内<?php  } ?><?php  } ?><?php  } ?><?php  } ?><?php  } ?>菜单</h2>
                    <div class="shopheader-activity-count" onclick="SetCollection();">
                        <i class="i-favorite"></i><?php  if(empty($collection)) { ?>收藏<?php  } else { ?>已收藏<?php  } ?>
                    </div>
                <!--
                <div class="shopheader-activities">
                    <ul>
                        <li>
                            <div class="activity-wrap nowrap"> 
                            <span class="activity-description"> 
                            公告：<?php  echo $store['announce'];?>
                            </span>
                            </div>
                        </li>
                    </ul>
                </div>
                -->
                <?php  if(!empty($store['announce'])) { ?>
                <div class="notification-section">
                    <div class="notice">
                        <i class="fa fa-volume-up red"></i>
                        <marquee behavior="scroll" scrollamount="1" scrolldelay="1">公告：<?php  echo $store['announce'];?></marquee>
                    </div>
                </div>
                <?php  } ?>
            </div>
        </div>

        <div class="shopheader-notice">
            <!--<span>新用户下单立减20.0元(不与其它活动同享)(APP专享)</span>-->
            <?php  if($mode == 1) { ?>
            <span><?php  echo $table_title;?><?php  if($append==1) { ?>(加单)<?php  } ?> <?php  if($limitprice>0) { ?>最低消费<?php  echo $limitprice;?>元<?php  } ?></span>
            <?php  } else { ?>
            <i>注</i>
            <span>用餐高峰期请提前下单！</span>
            <?php  } ?>
        </div>
    </div>
    <div class="vue-wrapper">
        <div class="shopheader">
            <h2>旺铺1元抢购(休闲店)</h2>

            <h2><i class="i-star i-star-gold"></i>
                <i class="i-star i-star-gold"></i>
                <i class="i-star i-star-gold"></i>
                <i class="i-star i-star-gray">
                    <i class="i-star i-star-gold"></i>
                </i>
                <i class="i-star i-star-gray"></i>
            </h2>

            <h3><span>优惠信息</span></h3>
            <ul>
                <li>
                    <i class="icon-bg1">新</i><span>新用户下单立减20.0元(不与其它活动同享)新用户下单立减20.</span>
                </li>
                <li>
                    <i class="icon-bg2">减</i><span>新用户下单立减20.0元(不与其它活动同享)</span>
                </li>
                <li>
                    <i class="icon-bg3">特</i><span>新用户下单立减20.0元(不与其它活动同享)</span>
                </li>
                <li>
                    <i class="icon-bg4">惠</i><span>新用户下单立减20.0元(不与其它活动同享)</span>
                </li>
            </ul>
            <div class="shop-bot">
                <h3><span>商家公告</span></h3>
            </div>
            <div class="des">欢迎光临，用餐高峰期请提前下单，谢谢。</div>
            <div class="des">送餐时间：中午10:00-2:00 下午4:00-8:00</div>
        </div>

        <div class="shop-close">
            <a href="javascript:void(0);">关闭</a>
        </div>
    </div>
    <script>
        $(function () {
//	$('.shopheader-notice, .shopheader-logo, .shopheader-name, .activity-wrap').click(function(e) {
//        $('.vue-wrapper').css({"display":"block"})
//		$('.vue-wrapper').animate({"left":"0"},300)
//    });

            $('.shop-close a').click(function (e) {
                $('.vue-wrapper').animate({"left": "100%"}, 300)
                var timer = setTimeout("close()", 350)
            });
        });
        function close() {
            $('.vue-wrapper').css({"display": "none"})
        }
    </script>
    <div id="menu-tabs-container">
        <div class="j-menu-tabs menu-tabs">
            <a class="selected tab1" href="javascript:void(0);" style="width:33%">
                <span>商品</span>
            </a>
            <!--<a class="tab2" href="javascript:void(0);">-->
            <!--<span>评价</span>-->
            <!--</a>-->
            <a href="<?php  echo $this->createMobileurl('detail', array('id' => $storeid, 'isdelivery' => $this->_isdelivery), true)?>"
               class="tab3" style="width:33%">
                <span>商家</span>
            </a>
            <a class="tab2"
               href="<?php  echo $this->createMobileUrl('allfeedback', array('storeid' => $storeid), true)?>"
               style="width:33%">
                <span>评价</span>
            </a>
        </div>
    </div>
    <div id="asidewrap" class="asidewrap" style="overflow-y:scroll;-webkit-overflow-scrolling:touch;">
        <div class="taglist" style=" height:<?php  echo $cateheight;?>px;">
            <?php  if(is_array($category)) { foreach($category as $item) { ?>
            <div class="j-tag tag <?php  if($flag!=true) { ?>focus<?php  } ?>" <?php  if($flag!=true) { ?>style=" margin-top:0px;
            "<?php  } ?>>
            <div class="tag-inner">
                <span class="tag-text"> <?php  echo $item['name'];?></span>
            </div>
        </div>
        <?php  $flag = true;?>
        <?php  } } ?>
    </div>
</div>
<div id="mainwrap" class="mainwrap">
    <div class="foodlistwrap" style="padding-top:10px;overflow-y:scroll;-webkit-overflow-scrolling:touch;">
        <!--<div class="j-coupon-section coupon-section">-->
        <!--<div class="coupon-price">-->
        <!--¥<em>15</em>-->
        <!--</div>-->
        <!--<div class="coupon-detail">-->
        <!--<p class="coupon-title">商家代金券</p>-->
        <!--<p class="coupon-desc">内含3张券</p>-->
        <!--</div>-->
        <!--<div class="coupon-fetch" onclick="alert('开发中');"> 去领取-->
        <!--</div>-->
        <!--</div>-->
        <style>
            .foodattributes {
                margin-left: 10px;
                -webkit-box-flex: 0;
                -ms-flex: none;
                flex: none
            }

            .foodattributes span {
                display: inline-block;
                vertical-align: middle;
                padding: 2px 2px;
                line-height: 10px;
                text-align: center;
                border: 1px solid currentColor;
                color: #fff;
                font-size: 12px;
                border-radius: 80px;
            }
            .goodsthumb {
                width: 75.2632px; height: 70px; margin-left: -1.63158px; margin-top: 0px; visibility: visible;
            }
            .i-add-btn{
                padding:0 7px 2px;  line-height:20px; text-align:center; border-radius:20px;  font-size:20px;
                /*background-color:#fbd163;*/
                background-color:#FE4F4E;
                color: #fff;
            }
            .i-remove-btn{
                border: 1px solid #a7a2a9;padding:0 8px 2px 8px;  line-height:19px; text-align:center;
                border-radius:20px; font-size:19px
            }
            .add-btn,.remove-btn{
                float: right;height: 25px;
            }

        </style>
        <!--<aside class="foodattributes"><span style="color: rgb(236, 156, 104);">招牌</span></aside>-->
        <?php  if(is_array($category)) { foreach($category as $item) { ?>
        <h3 class="foodlist-label" style="border-left: 2px solid #ffcd65;"><?php  echo $item['name'];?> </h3>
        <ul>
            <?php  if(is_array($goodslist[$item['id']]['goods'])) { foreach($goodslist[$item['id']]['goods'] as $goods) { ?>
            <li class="j-fooditem fooditem">
                <div class="food-content1 clearfix" dishid="<?php  echo $goods['id'];?>" dthumb="<?php  if($goods['thumb']) { ?><?php  echo tomedia($goods['thumb']);?><?php  } else { ?><?php  echo tomedia('./addons/weisrc_dish/icon.jpg');?><?php  } ?>" ddescribe="<?php  echo $goods['description'];?>" dtitle="<?php  echo $goods['title'];?>"
                     dprice="<?php  if($iscard==1 && !empty($goods['memberprice'])) { ?><?php  echo $goods['memberprice'];?><?php  } else { ?><?php  echo $goods['marketprice'];?><?php  } ?>"
                     dunitname="<?php  echo $goods['unitname'];?>"
                     dsales="<?php  echo $goods['sales'];?>">
                    <div class="food-pic-wrap open-popup" style="width:80px; height:70px;margin-right:3px;"
                         data-target="#full">
                        <img class="j-food-pic food-pic goodsthumb lazy"
                             data-original="<?php  if($goods['thumb']) { ?><?php  echo tomedia($goods['thumb']);?><?php  } else { ?><?php  echo tomedia('./addons/weisrc_dish/icon.jpg');?><?php  } ?>" style="border-radius: 5px;"/>
                    </div>
                    <div class="food-cont">
                        <div class="j-foodname foodname " data-target="#full"><?php  echo $goods['title'];?></div>
                        <div class="food-desc" data-target="#full"><?php  echo $goods['description'];?></div>
                        <div class="food-content1-sub " data-target="#full">
                            <?php  if($goods['isshow_sales']==1) { ?>
                            <span>已售 <?php  echo $goods['sales'];?></span>
                            <?php  } ?>
                            <?php  if($goods['credit']>0) { ?><span class="food-good">赠送<f style="color: #f00;">
                            <?php  echo $goods['credit'];?>
                        </f>积分</span><?php  } ?>
                        </div>
                        <div class="j-item-console foodop clearfix" dishid="<?php  echo $goods['id'];?>">
                            <?php  $is_sale_end=0;?>
                            <?php  if($goods['counts']==0) { ?>
                            <?php  $is_sale_end=1;?>
                            <?php  } else if($goods['counts']>0) { ?>
                            <?php  $count = $goods['counts'] - $goods['today_counts'];?>
                            <?php  if($count <= 0) { ?>
                            <?php  $is_sale_end=1;?>
                            <?php  } ?>
                            <?php  } ?>
                            <?php  if($is_sale_end==1) { ?>
                            <img src="<?php  echo $this->cur_mobile_path?>/image/sale-end.png" style="width: 80px;">
                            <?php  } else { ?>
                            <a class="j-add-item add-btn <?php  if($goods['isoptions']==0) { ?>add-food<?php  } ?> " href="javascript:;" <?php  if($goods['isoptions']==1) { ?>onclick="tan(<?php  echo $goods['id'];?>);"<?php  } ?>  id="dishid_<?php  echo $goods['id'];?>" >
                                <!--<i class="icon i-add-food j-add-inner"></i>-->
                                <i class="i-add-btn" <?php  if($goods['isoptions']==1) { ?>style="font-size: 18px;"<?php  } ?>>
                                    <?php  if($goods['isoptions']==1) { ?>
                                    选择
                                    <?php  } else { ?>
                                    +
                                    <?php  } ?>
                                </i>
                            </a>
                            <?php  if(!empty($dish_arr[$goods['id']])) { ?>
                            <span class="j-item-num foodop-num"><?php  echo $dish_arr[$goods['id']];?></span>
                            <?php  } else { ?>
                            <span class="j-item-num foodop-num" style="display:none">0</span>
                            <?php  } ?>
                            <a class="j-remove-item remove-btn food_add_<?php  echo $goods['id'];?> <?php  if($goods['isoptions']==0) { ?>remove-food<?php  } ?>"
                                <?php  if(empty($dish_arr[$goods['id']])) { ?>style="display:none"<?php  } ?> href="javascript:;" <?php  if($goods['isoptions']==1) { ?>onclick="$('#add-cart').click();"<?php  } ?> >
                            <!--<i class="icon i-remove-food"></i>-->
                            <i class="i-remove-btn">-</i>
                            </a>
                            <?php  } ?>
                        </div>
                        <div class="food-price-region" data-target="#full">
                            <?php  $flag = 0;?>
                            <?php  if($iscard==1 && !empty($goods['memberprice'])) { ?>
                            <?php  $flag = 1;?>
                            <span class="food-price">会员:¥<font><?php  echo $goods['memberprice'];?>/<?php  echo $goods['unitname'];?></font></span>
                            <br>
                            <span class="food-price">原价:¥<font>
                                <del><?php  echo $goods['marketprice'];?>元/<?php  echo $goods['unitname'];?></del>
                            </font></span>
                            <?php  } else { ?>
                            <span class="food-price">¥<font><?php  echo $goods['marketprice'];?>/<?php  echo $goods['unitname'];?></font></span>
                            <?php  } ?>
                            <?php  if(!empty($goods['productprice']) && $flag==0) { ?>
                            <br/>
                            <span class="food-price">¥<font>
                                <del><?php  echo $goods['productprice'];?>/<?php  echo $goods['unitname'];?></del>
                            </font></span>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
            </li>
            <?php  } } ?>
        </ul>
        <?php  } } ?>
    </div>
    <div id="full" class='weui-popup__container' style="position:fixed;top:0;left:0;right:0;bottom:0;overflow-y:auto; overflow-y: hidden;z-index: 8999;-webkit-overflow-scrolling:touch;">
        <div class="ziyou close-popup"></div>
        <div class="food-price">
            <div class="weui-popup__modal ziyou-tc">
                <div class=""><img id="popup_img" style="width: 100%;" src="" alt=""></div>
                <div class="weui-cells_radio">
                    <div class="weui-cells__title"
                         style="color: #000;"><h2 id="popup_title"></h2></div>
                    <div class="weui-cells__title" id="popup_sale"></div>
                    <div class="weui-cells">
                        <div class="weui-cell">
                            <div class="weui-cell__bd">
		                        <span class="weui-cell__bd">
		              	            <span class="food-price">¥<font id="popup_price"></font></span>
		                        </span>
                            </div>
                            <div class="weui-cell__ft">
                                <div class="j-item-console foodop clearfix">
                                    <?php  $is_sale_end=0;?>
                                    <?php  if($goods['counts']==0) { ?>
                                    <?php  $is_sale_end=1;?>
                                    <?php  } else if($goods['counts']>0) { ?>
                                    <?php  $count = $goods['counts'] - $goods['today_counts'];?>
                                    <?php  if($count <= 0) { ?>
                                    <?php  $is_sale_end=1;?>
                                    <?php  } ?>
                                    <?php  } ?>
                                    <?php  if($is_sale_end==1) { ?>
                                    <!--<img src="<?php  echo $this->cur_mobile_path?>/image/sale-end.png"-->
                                         <!--style="width: 80px;">-->
                                    <?php  } else { ?>
                                    <!--<a class="j-add-item add-food food_add_<?php  echo $goods['id'];?>" href="javascript:;">-->
                                        <!--<i class="icon i-add-food j-add-inner"></i>-->
                                    <!--</a>-->
                                    <?php  if(!empty($dish_arr[$goods['id']])) { ?>
                                    <!--<span class="j-item-num foodop-num"><?php  echo $dish_arr[$goods['id']];?></span>-->
                                    <?php  } else { ?>
                                    <!--<span class="j-item-num foodop-num" style="display:none">0</span>-->
                                    <?php  } ?>
                                    <!--<a class="j-remove-item remove-food" <?php  if(empty($dish_arr[$goods['id']])) { ?>style="display:none"<?php  } ?>-->
                                    <!--href="javascript:;">-->
                                    <!--<i class="icon i-remove-food"></i>-->
                                    <!--</a>-->
                                    <?php  } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="weui-cells__title">-->
                        <!--<span class="food-price" style="color: #F00;"><font id="popup_description"><?php  echo $goods['description'];?></font></span>-->
                    <!--</div>-->
                    <div class="weui-cells__title" style="color: #000;"><h2>商品详情</h2></div>
                    <div class="weui-cells__title" id="popup_content">

                    </div>
                    <div class="weui-cells__title" style="height: 65px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="totalprice" value="<?php  echo $totalprice;?>" name="totalprice">
<input type="hidden" id="totalcount" value="<?php  echo $totalcount;?>" name="totalcount">
<input type="hidden" id="btnstatus" value="0" name="btnstatus">
<input type="hidden" id="limitprice" value="<?php  echo $limitprice;?>" name="limitprice">
<?php  if($isrest == 1) { ?>
<div class="rest">
    商家休息中,暂不接单
</div>
<?php  } else { ?>
<div id="cart" class="cart">
    <div class="cart-tip">
        <div class="j-cart-icon cart-icon <?php  if($totalprice>0) { ?>ico-cart-active<?php  } ?>">
            <i class="j-ico-cart ico-cart <?php  if($totalprice>0) { ?>ico-cart-active<?php  } ?>" id="add-cart"></i>

            <div class="j-cart-num cart-num" <?php  if($totalprice>0) { ?>style="display: block;"<?php  } ?>><?php  echo $totalcount;?></div>
        </div>
        <div class="j-cart-noempty cart-noempty" <?php  if($totalprice>0) { ?>style="display: block;"<?php  } ?>>
            <span class="j-cart-price cart-price">共 ￥<font><?php  echo $totalprice;?></font></span>
            <del class="j-cart-origin cart-origin"></del>
            <br>
        </div>
        <div class="j-cart-empty cart-empty" <?php  if($totalprice==0) { ?>style="display: block;
        "<?php  } ?>>购物车空空如也～
    </div>
</div>
<div class="cart-btns" style="display:none">
    <a class="cart-btn-unavail" href="javascript:;">
        <span class="combtn inner">休息中</span>
    </a>
</div>
<div class="cart-btns">
    <a class="j-cart-btn-confirm cart-btn-confirm" <?php  if($totalprice>0) { ?>style="display:
        block;"<?php  } else { ?>style="display:none"<?php  } ?>" href="javascript:;">
        <span class="inner" onclick="btnSelectJump();">我选好了</span>
    </a>
    <a class="j-cart-btn-unavail cart-btn-unavail" <?php  if($totalprice==0) { ?>style="display:
       block;"<?php  } else { ?>style="display:none"<?php  } ?>">
    <span class="inner">购物中</span>
    </a>
</div>
</div>
<?php  } ?>
</div>
<style>
    .goods-native-scroll{
        padding: 0 12px;
        float: left;
        overflow: auto;
        height: 260px;
        position: absolute;
        top: 40px;
        left: 0;
        width: 100%;
    }
    .goods-native-scroll ul li{
        padding: 6px 0;
        float: left;
        width: 60px;
        border: 1px solid #f0f0f0;
        font-size: 12px;
        line-height: 20px;
        text-align: center ;
        margin-right: 8px;
        margin-top: 5px;
    }

    .goods-native-scroll ul li.on{
        padding: 6px 0;
        float: left;
        width: 60px;
        /*border: 1px solid #fea000;*/
        border: 1px solid #FE4F4E;
        background-color: #FE4F4E;
        color: #fff;
        font-size: 12px;
        line-height: 20px;
        text-align: center ;
        margin-right: 8px;
        margin-top: 5px;
    }

    .goods-item-num{
        height: 30px;
        line-height: 30px;
        font-size: 16px;
        float: left;
        line-height: 30px;
        padding-top: 10px;
        color:#000
    }
    .goods-item-num span{ height:30px; line-height:30px; padding:0 5px; font-size:14px; color:#000; }

    .goods-list{
        background-color: #fff;
        border-top: 1px solid #cacaca;
        bottom: 0;
        height: 350px;
        position: fixed;
        width: 100%;
        z-index: 90001;
        display:none;
    }
</style>
<script>
    //选择多规格
    function addClass(a, dishid) {
        $(a).addClass("on").siblings().removeClass("on");

        var all_select = 0;
        for (var i = 0; i < $('.que_box').length; i++) {
            if ($('.que_box').find('li.on').length == $('.que_box').length) {
                all_select = 1;
            }
        }
        if (all_select == 1) {
            var specs = "";
            for (var i = 0; i < $('.que_box').length; i++) {
                if (i == ($('.que_box').length - 1)) {
                    specs += $('.que_box').eq(i).find('li.on').attr("specid");
                } else {
                    specs += $('.que_box').eq(i).find('li.on').attr("specid") + "_";
                }
            }

//            $.mvalidateTip(specs);
//            return false;

            //获取最后选择好的规格
//            optionid = $(a).attr("specid");
            $('#cur_dishid').val(dishid);
            $('#cur_optionid').val(specs);
            var url = "<?php  echo $this->createMobileUrl('getselectoption', array(), true)?>";
            $.ajax({
                url: url, type: "post", dataType: "json", timeout: "10000",
                data: {
                    "dishid": dishid,
                    "optionid": specs
//                    "specs": specs
                },
                success: function (data) {
                    if (data == 0) {
                        $.mvalidateTip('调试中');
                    } else {
                        $("#option_price").html(data['price']);
//                        $('.food_price').find('#productprice').html(data.b.productprice);
//                        $('.food_price').find('#marketprice').html(data.b.marketprice);
//                        $('.food_price').find('#memberprice').html(data.b.memberprice);
//                        $('.food_price').find('#memberprice').html(data.b.memberprice);
//                        $('.food_price').find('#optionid').val(data.b.id);
//                        $('.food_price').find('#optiontitle').val(data.b.title);
                    }
                }, error: function () {
                    $.mvalidateTip("数据请求失败");
                }
            });
//
        }
//        $('#goodsoptionitem').find('li.on')
    }
</script>
<script>
    function tan(i)
    {
        var url = "<?php  echo $this->createMobileUrl('getgoodsoption', array(), true)?>";
        var params = {
            'id': i
        };
        $.ajax({
            url: url,
            type: "post",
            data: params,
            dataType: 'json',
            success: function (data) {
                "<?php  if($is_not_exists == 0) { ?>"
                if (data != 0) {
                    $("#option_price").html(data.price);
                    $("#option_title").html(data.title);
                    $("#goods-native-scroll").html(data.content);
                    $("#goodsoptionnum").html(1)
                    $('#goodsoption').css({"display": "block"});
                    $('#goodsoption').slideDown(400)
                }
                "<?php  } ?>"
            }
        });
    }
    function setgoodsoptionnum(type)
    {
        var num= $("#goodsoptionnum").html();
        num =  parseInt(num);
        if (type == 1) {
            num = num+1;
            $("#goodsoptionnum").html(num);
        } else {
            if (num > 1) {
                num = num-1;
                $("#goodsoptionnum").html(num);
            }
        }
    }
</script>
<style>
    .guige {
        border-bottom: 1px solid #f0f0f0;width: 100%;font-size: 14px;line-height: 20px;margin:4px 0 2px;
    }
</style>
<div class="goods-list" id="goodsoption">
    <div class="popup-cart-actions">
        <button class="button popup-cart-close-btn">关闭</button>
        <span id="option_title">商品规格</span> <span style="color:#fea000;" id="option_price"></span>
    </div>
    <input type="hidden" id="cur_dishid" value="" name="cur_dishid">
    <input type="hidden" id="cur_optionid" value="" name="cur_optionid">
    <div class="goods-native-scroll" id="goods-native-scroll">
        <span class="guige">规格</span>
        <ul id="goodsoptionitem"></ul>
    </div>
    <div class="cart-footer">
        <!--<div class="cart-fl">-->
            <!--共 ￥<strong><?php  echo $totalprice;?></strong>-->
        <!--</div>-->
        <div class="cart-fl">
            <div class="goods-item-num">
                数量
                <i class="" style="border: 1px solid #a7a2a9;padding:0 7px 2px 7px;  line-height:19px; text-align:center; border-radius:20px; font-size:19px;" onclick="setgoodsoptionnum(2);">-</i>
                <span id="goodsoptionnum">1</span>
                <i class="" style=" background-color:#FE4F4E;padding:0 6px 2px;  line-height:20px; text-align:center; border-radius:20px; font-size:20px;color: #fff;" onclick="setgoodsoptionnum(1);">+</i>
            </div>
        </div>
        <button id="add_option_food">确定</button>
    </div>
</div>
<!--购物车列表-->
<div class="shop-cart"></div>
<div class="cart-list">
    <div class="cart-header">
        <i class="cart-b">
            <div class="cart-n"><?php  echo $totalcount;?></div>
        </i>
    </div>
    <div class="popup-cart-actions">
        <button class="button popup-cart-clear-btn">清空</button>
        <span>购物车</span>
    </div>
    <div class="native-scroll">
        <ul>
            <?php  if(is_array($cart)) { foreach($cart as $item) { ?>
            <?php  if($item['total']>0) { ?>
            <li dishid="<?php  echo $item['goodsid'];?>" optionid="<?php  echo $item['optionid'];?>">
                <div class="cart-item-name"><?php  echo $item['goodstitle'];?><?php  if(!empty($item['optionname'])) { ?>[<?php  echo $item['optionname'];?>]<?php  } ?></div>
                <div class="cart-item-price">¥<font><?php  echo $item['price'];?></font></div>
                <div class="cart-item-num">
                    <i class="cart-item-add"></i>
                    <span><?php  echo $item['total'];?></span>
                    <i class="cart-item-jj"></i>
                </div>
            </li>
            <?php  } ?>
            <?php  } } ?>
        </ul>
    </div>
    <div class="cart-footer">
        <div class="cart-fl">
            共 ￥<strong><?php  echo $totalprice;?></strong>
        </div>
        <button class="btn1" onclick="btnSelectJump();">我选好了</button>
        <button class="btn2" style="background-color: #a0a0a0;display: none;">我选好了</button>
    </div>
</div>
<div class="top-btn" style="display: none;">
    <a class="react">
        <i class="text-icon">⇧</i>
    </a>
</div>
<script src="<?php  echo $this->cur_mobile_path?>/script/jquery-weui.min.js"></script>
<script>
    $(function () {
        $('.menu-tabs .tab3').click(function () {
            $('.menu-tabs a').removeClass('selected')
            $(this).addClass('selected')
            $('.main-tab2').css({"display": "none"});
            $('.main-tab3').css({"display": "block"});
            $('.asidewrap').css({"display": "none"});
            $('.mainwrap').css({"display": "none"});
            $('.cart').css({"display": "none"});
        });

        $('.qualification').click(function () {
            $('.detail-photo').css({"display": "block"});
            $('.detail-region').css({"display": "none"})
            $('.detail-qualification').css({"display": "none"})
            $('.main-tab3').css({"margin-top": "171px"})
        });
        $('.photo-header').click(function () {
            $('.detail-photo').css({"display": "none"});
            $('.detail-region').css({"display": "block"})
            $('.detail-qualification').css({"display": "block"})
            $('.main-tab3').css({"margin-top": "181px"})
        });


        $('.menu-tabs .tab2').click(function () {
            $('.menu-tabs a').removeClass('selected')
            $(this).addClass('selected')
            $('.main-tab2').css({"display": "block"});
            $('.main-tab3').css({"display": "none"});
            $('.asidewrap').css({"display": "none"});
            $('.mainwrap').css({"display": "none"});
            $('.cart').css({"display": "none"});
        });

        $('.menu-tabs .tab1').click(function () {
            $('.menu-tabs a').removeClass('selected')
            $(this).addClass('selected')
            $('.main-tab2').css({"display": "none"});
            $('.main-tab3').css({"display": "none"});
            $('.asidewrap').css({"display": "block"});
            $('.mainwrap').css({"display": "block"});
            $('.cart').css({"display": "block"});
        });

    });

    function changeBtnSelect() {
        var limitprice = parseFloat($("#limitprice").val());
        var totalprice = parseFloat($("#totalprice").val());
        if (limitprice > 0) {
            if (totalprice >= limitprice) {
                $('.cart-noempty').css({"display": "block"});//选择了
                $('.cart-btn-confirm').css({"display": "block"});//选择了
                $('.cart-btn-unavail').css({"display": "none"});//点菜中
                $('#add-cart').addClass('ico-cart-active');
                $("#btnstatus").val('1');
                $('.btn1').css({"display": "block"});
                $('.btn2').css({"display": "none"});
            } else {
                var showprice = limitprice - totalprice;
                showprice = showprice.toFixed(2);
                $('.cart-btn-unavail span').text('还差' + showprice + '元');

                $('.btn2').css({"display": "block"});
                $('.btn2').text('还差' + showprice + '元');
                $('.btn1').css({"display": "none"});

                $('.cart-btn-confirm').css({"display": "none"});//选择了
                $('.cart-btn-unavail').css({"display": "block"});//点菜中
                $("#btnstatus").val('0');
            }
        } else {
            if (totalprice > 0) {
                $("#btnstatus").val('1');
                $('.cart-noempty').css({"display": "block"});//选择了
                $('#add-cart').addClass('ico-cart-active');
                ;
                $('.cart-btn-confirm').css({"display": "block"});//选择了
                $('.cart-btn-unavail').css({"display": "none"});//点菜中
            } else {
                $("#btnstatus").val('0');
                $('.cart-btn-confirm').css({"display": "none"});//选择了
                $('.cart-btn-unavail').css({"display": "block"});//点菜中
            }
            $('.btn1').css({"display": "block"});
            $('.btn2').css({"display": "none"});
        }
    }
    function btnSelectJump() {
        var url = "<?php  echo $jump_url;?>";
        var status = $("#btnstatus").val();
        if (status == 1) {
            location.href = url;
        } else {
            var limitprice = parseFloat($("#limitprice").val());
            var totalprice = parseFloat($("#totalprice").val());
            var showprice = limitprice - totalprice;
            showprice = showprice.toFixed(2);
            if (showprice > 0) {
                $.mvalidateTip('还差' + showprice + '元');
                return false;
            } else {
                location.href = url;
            }
        }
    }
</script>
<script src="<?php  echo $this->cur_mobile_path?>/script/fly.min.js"></script>
<script>
    $(document).scroll(function () {
        var ftop = $(document).scrollTop();
        var cate = <?php  echo $catecount;?>; //菜单栏个数
        for (var i = 1; i < cate; i++) {
            var fheighti = $('.foodlistwrap h3').eq(i).offset();
            var hi = fheighti.top - 285;
            if (ftop > hi) {
                $('.tag').removeClass('focus')
                $('.tag').eq(i).addClass('focus')
            }
            if (i == 1) {
                if (ftop < hi) {
                    $('.tag').removeClass('focus')
                    $('.tag').eq(0).addClass('focus')
                }
            }
        }
    });
    $(function () {
        $("#add_option_food").click(function (event) {
            cur_dishid = $('#cur_dishid').val();
            cur_optionid = $('#cur_optionid').val();
            ojb = $('#dishid_' + cur_dishid);

            for (var i = 0; i < $('.que_box').length; i++) {
                if ($('.que_box').eq(i).find('li.on').length < 1) {
                    $.mvalidateTip("请选择" + $('.que_box').eq(i).find('.guige').html());
                    return false;
                }
            }

            //规格商品数量
            goodsoptionnum = parseInt($('#goodsoptionnum').html());
//            $.mvalidateTip(ojb.parent().find('.foodop-num').text());

            var fnum = ojb.parent().find('.foodop-num');//商品数量标签
//            var sum = fnum.text();
//            sum = parseInt(sum);

            var jian = ojb.parent().find('.remove-btn');//减少数量标签
            var car = $('#add-cart');//改变购物车背景
            var cartnum = $('.cart-num');//没有商品 空
            var cart_n = $('.cart-n');//没有商品 空

            var carempty = $('.cart-empty');//有商品
            var goodsprice = ojb.parent().next().find('font').text();//商品单价
            var cartnoempty = $('.cart-noempty');	//总价格位置
            var totalprice = $('.cart-noempty').find('font').text();//总价格
            if (totalprice != 0) {
                totalprice = parseFloat(totalprice) + parseFloat(goodsprice);
            } else {
                totalprice = parseFloat(goodsprice);
            }
            totalprice = totalprice.toFixed(2);

            var cartbtnconfirm = $('.cart-btn-confirm'); //结算
            var cartbtnunavail = $('.cart-btn-unavail'); //差10元起送

            var total = $('.cart-num').text();//总数
            total = parseInt(total) + 1;

            var dishid = ojb.parent().attr('dishid');

            totalnum = parseInt(goodsoptionnum);
            var url = "<?php  echo $this->createMobileUrl('UpdateDishNumOfCategory', array('storeid' => $storeid, 'from_user' => $from_user), true)?>";
            var params = {
                'dishid': dishid,
                'optionid':cur_optionid,
                'o2uNum':totalnum,
                'optype':'add'
            };
            $.ajax({
                url: url,
                type: "post",
                data: params,
                dataType: 'json',
                success: function (data) {
                    if (data['message']['code'] != 0) {
                        $.mvalidateTip(data['message']['msg']);
                        return;
                    } else {
                        $('.native-scroll').html(data['message']['cart']);
                        doSelectBtn();
                        totalprice = data['message']['totalprice'];
                        totalcount = data['message']['totalcount'];
                        goodscount = data['message']['goodscount'];

                        $("#totalprice").val(totalprice);
                        changeBtnSelect();

                        fnum.css({"display": "block"});////成功加入购物车动画效果
                        fnum.text(goodscount);//增加数量

                        jian.css({"display": "block"});
                        car.addClass('ico-cart-active');//购物车背景
                        cartnoempty.css({"display": "block"});
                        cartnoempty.find('font').text(totalprice) //总价
                        cartnum.css({"display": "block"});
                        carempty.css({"display": "none"});//隐藏空空
                        $('.cart-footer').find('strong').text(totalprice);
                        cartnum.text(totalcount); //购物车商品总数
                        cart_n.text(totalcount); //购物车商品总数

                        $('#goodsoption').slideUp(400);
                    }
                }
            });
        });

        $('.popup-cart-close-btn').click(function (e) {
            $('#goodsoption').slideUp(400);
        });

        $('.food-pic-wrap').click(function (e) {
            var dishid = this.parentNode.getAttribute('dishid');
//            var dthumb = this.parentNode.getAttribute('dthumb');
//            var dtitle = this.parentNode.getAttribute('dtitle');
//            var ddescribe = this.parentNode.getAttribute('ddescribe');
//            var dsales = this.parentNode.getAttribute('dsales');

//            var dprice = this.parentNode.getAttribute('dprice');
//            var dunitname = this.parentNode.getAttribute('dunitname');


            var url = "<?php  echo $this->createMobileUrl('getgoodsdetail', array(), true)?>";
            var params = {
                'id': dishid
            };
            $.ajax({
                url: url,
                type: "post",
                data: params,
                dataType: 'json',
                success: function (data) {
                    if (data != 0) {
                        $("#popup_img").attr("src", data['thumb'])
                        $("#popup_title").html(data['title']);
                        $("#popup_price").html(data['dprice'] + '/' + data['unitname']);
                        $("#popup_sale").html("已售 " + data['sales']);
                        $("#popup_content").html(data['content']);
                    } else {
                        $("#popup_content").html('');
                    }
                }
            });

        });

//导航菜单
        $('.tag').click(function (e) {
            var ind = $(this).index()//data-group-id
            var scroll_offset = $('.foodlistwrap h3').eq(ind).offset();
            $('html,body').animate({
                scrollTop: scroll_offset.top - 171  //让mainwrap的scrollTop等于pos的top，就实现了滚动
            }, 500);
        });


        var offset = $("#add-cart").offset();
        var lastClickTime = new Date().getTime();
        var delay = 1000; // 解决延迟 联系点击bug
        $(".add-food").click(function (event) {
//		if (new Date().getTime() - lastClickTime < delay) {
//			return;
//	  	}
            lastClickTime = new Date().getTime();
            var img = $(this).parent().parent().parent().find('img').attr('src'); //获取当前点击图片链接
            var flyer = $('<img class="flyer-img" src="' + img + '">'); //抛物体对象
            var sum = $(this).parent().find('.foodop-num').text();
            if (sum == 0) {
                sum = 1;
            } else {
                sum++
            }
            var fnum = $(this).parent().find('.foodop-num');
            var jian = $(this).parent().find('.remove-btn');
            var car = $('#add-cart');//改变购物车背景
            var cartnum = $('.cart-num');//没有商品 空
            var cart_n = $('.cart-n');//没有商品 空

            var carempty = $('.cart-empty');//有商品
            var goodsprice = $(this).parent().next().find('font').text();//商品单价
            var cartnoempty = $('.cart-noempty');	//总价格位置
            var totalprice = $('.cart-noempty').find('font').text();//总价格
            if (totalprice != 0) {
                totalprice = parseFloat(totalprice) + parseFloat(goodsprice);
            } else {
                totalprice = parseFloat(goodsprice);
            }
            totalprice = totalprice.toFixed(2);

            var cartbtnconfirm = $('.cart-btn-confirm'); //结算
            var cartbtnunavail = $('.cart-btn-unavail'); //差10元起送

            var total = $('.cart-num').text();//总数
            total = parseInt(total) + 1;

            var dishid = this.parentNode.getAttribute('dishid');
            var o2uNum = parseInt(this.parentNode.children[1].innerHTML, 10);
            o2uNum = parseInt(o2uNum) + 1;
            var url = "<?php  echo $this->createMobileUrl('UpdateDishNumOfCategory', array('storeid' => $storeid, 'from_user' => $from_user), true)?>";
            var params = {
                'dishid': dishid,
                'o2uNum': o2uNum
            };
            $.ajax({
                url: url,
                type: "post",
                data: params,
                dataType: 'json',
                success: function (data) {
                    if (data['message']['code'] != 0) {
                        $.mvalidateTip(data['message']['msg']);
                        return;
                    } else {
                        $('.native-scroll').html(data['message']['cart']);
                        doSelectBtn();
                        totalprice = data['message']['totalprice'];
                        totalcount = data['message']['totalcount'];
                        $("#totalprice").val(totalprice);
                        changeBtnSelect();
                        flyer.fly({
                            start: {
                                left: event.clientX - 25,//抛物体起点横坐标
                                top: event.clientY - 25 //抛物体起点纵坐标
                            },
                            end: {
                                left: offset.left + 10,//抛物体终点横坐标
                                top: offset.top + 20 //抛物体终点纵坐标
                            },
                            onEnd: function () {
                                this.destory(); //销毁抛物体
                            }
                        });
                        fnum.css({"display": "block"});////成功加入购物车动画效果
                        jian.css({"display": "block"});
                        car.addClass('ico-cart-active');//购物车背景
                        cartnoempty.css({"display": "block"});
                        cartnoempty.find('font').text(totalprice) //总价
                        cartnum.css({"display": "block"});
                        carempty.css({"display": "none"});//隐藏空空
                        $('.cart-footer').find('strong').text(totalprice);
                        fnum.text(sum);//增加数量
                        cartnum.text(totalcount); //购物车商品总数
                        cart_n.text(totalcount); //购物车商品总数
                    }
                }
            });
        });

        $(".remove-food").click(function (event) {
//		if (new Date().getTime() - lastClickTime < delay) {
//			return;
//	  	}
            lastClickTime = new Date().getTime();
            var fnum = $(this).parent().find('.foodop-num');
            var sum = $(this).parent().find('.foodop-num').text();//商品数量
            var jian = $(this).parent().find('.remove-btn');
            sum--;
            if (sum < 1) {
                fnum.css({"display": "none"});
                jian.css({"display": "none"});
            }
            fnum.text(sum)
            var cartnum = $('.cart-num').text();//商品总数减1

            var car = $('#add-cart');//改变购物车背景
            cartnum = cartnum - 1;
            if (cartnum < 1) {
                car.removeClass('ico-cart-active');
                $('.cart-num').css({"display": "none"})
            }
            $('.cart-num').text(cartnum);
            $('.cart-n').text(cartnum); //购物车商品总数
            var totalprice = $('.cart-noempty').find('font').text();//总价钱
            var goodsprice = $(this).parent().next().find('font').text();//商品单价
            var carempty = $('.cart-empty');//有商品
            var cartnoempty = $('.cart-noempty');	//总价格位
            var cartbtnconfirm = $('.cart-btn-confirm'); //结算
            var cartbtnunavail = $('.cart-btn-unavail'); //差10元起送

            var total = $('.cart-num').text();//总数
            total = parseInt(total) - 1;

            var dishid = this.parentNode.getAttribute('dishid');
            var o2uNum = parseInt(this.parentNode.children[1].innerHTML, 10);

            var url = "<?php  echo $this->createMobileUrl('UpdateDishNumOfCategory', array('storeid' => $storeid, 'from_user' => $from_user), true)?>";
            var params = {
                'dishid': dishid,
                'o2uNum': o2uNum
            };
            $.ajax({
                url: url,
                type: "post",
                data: params,
                dataType: 'json',
                success: function (data) {
                    if (data['message']['code'] != 0) {
                        $.mvalidateTip(data['message']['msg']);
                        return;
                    } else {
                        totalprice = data['message']['totalprice'];
                        totalcount = data['message']['totalcount'];

                        $('.native-scroll').html(data['message']['cart']);
                        doSelectBtn();
                        totalprice = totalprice.toFixed(2);
                        $("#totalprice").val(totalprice);
                        changeBtnSelect();
                        if (totalprice == 0) {
                            carempty.css({"display": "block"});
                            cartnoempty.css({"display": "none"});
                            cartbtnunavail.css({"display": "block"});//起送
                            cartbtnconfirm.css({"display": "none"});
                        }
                        $('.cart-noempty').find('font').text(totalprice);
                        $('.cart-footer').find('strong').text(totalprice);
                    }
                }
            });
        });

        $('#add-cart').click(function (e) {
            changeBtnSelect();
            var cartnum = $('.cart-num').text();
            if (cartnum > 0) {
                $('.shop-cart').css({"display": "block"});
                $('.cart-list').slideDown(400)
                $('.cart-list').css({"overflow": ""})
            }
        });
        $('.shop-cart').click(function (e) {
            $(this).css({"display": "none"})
            $('.cart-list').slideUp(200)

        });
    });
    function doSelectBtn() {
        var btnAdd = $(".cart-item-add");
        var btnMin = $(".cart-item-jj");
        var btnClean = $(".popup-cart-clear-btn");

        btnClean.on('click', function () {
            var url = "<?php  echo $this->createMobileUrl('clearmenu', array('storeid' => $storeid, 'from_user' => $from_user, 'type' => 'ajax'), true)?>";
            var params = {};
            $.ajax({
                url: url,
                type: "post",
                data: params,
                dataType: 'json',
                success: function (data) {
                    if (data['message']['code'] != 0) {
                        $.mvalidateTip(data['message']['msg']);
                        return;
                    } else {
                        $("#totalprice").val(0);
                        changeBtnSelect();

                        $('.native-scroll').html('<ul></ul>');
                        $('.cart-empty').css({"display": "block"});
                        $('.cart-btn-unavail').css({"display": "block"});
                        $('#add-cart').removeClass('ico-cart-active');

                        $('.foodop-num').css({"display": "none"});
                        $('.remove-btn').css({"display": "none"});

                        $('.cart-num').css({"display": "none"});
                        $('.cart-noempty').css({"display": "none"})
                        $('.cart-btn-confirm').css({"display": "none"})
                        $('.cart-noempty').find('font').text(0);
                        $('.cart-footer').find('strong').text(0);
                        $('.shop-cart').css({"display": "none"})
                        $('.cart-list').slideUp(200)
                        $('.cart-n').text(0);
                        $('.cart-num').text(0);
                    }
                }
            });
        });

        btnAdd.on('click', function () {
            var dishid = this.parentNode.parentNode.getAttribute('dishid'); //商品编号
            var optionid = this.parentNode.parentNode.getAttribute('optionid'); //规格编号

            var goodsnum = $(this).next().text();
            goodsnum = parseInt(goodsnum) + 1;
            $(this).next().text(goodsnum);
            var totalprice = $('.cart-fl strong').text()//总价
            var cartprice = $(this).parent().parent().find('font').text();
            totalprice = parseFloat(totalprice) + parseFloat(cartprice);
            totalprice = totalprice.toFixed(2);
            $('.cart-fl strong').text(totalprice)
            var totalcount = $('.cart-n').text();
            totalcount = parseInt(totalcount) + 1;
            $('.cart-n').text(totalcount);
            $('.cart-num').text(totalcount);//没有商品 空

            //商品列表的标签
            var food = $('.food_add_' + dishid);
            //商品列表现有数量
            var fnum = food.parent().find('.foodop-num');

            var url = "<?php  echo $this->createMobileUrl('UpdateDishNumOfCategory', array('storeid' => $storeid, 'from_user' => $from_user), true)?>";
            var params = {
                'dishid': dishid,
                'optionid':optionid,
                'o2uNum': goodsnum
            };
            $.ajax({
                url: url,
                type: "post",
                data: params,
                dataType: 'json',
                success: function (data) {
                    if (data['message']['code'] != 0) {
                        $.mvalidateTip(data['message']['msg']);
                        return;
                    } else {
                        totalprice = data['message']['totalprice'];
                        totalcount = data['message']['totalcount'];
                        goodscount = data['message']['goodscount'];
                        fnum.text(goodscount);//增加数量

                        $('.native-scroll').html(data['message']['cart']);
                        doSelectBtn();
                        $('.cart-noempty').find('font').text(totalprice);
                        $('.cart-footer').find('strong').text(totalprice);

                        $("#totalprice").val(totalprice);
                        changeBtnSelect();
                    }
                }
            });
        });

        btnMin.on('click', function () {
            var dishid = this.parentNode.parentNode.getAttribute('dishid'); //商品编号
            var optionid = this.parentNode.parentNode.getAttribute('optionid'); //规格编号
            var goodsnum = $(this).prev().text();
            goodsnum = parseInt(goodsnum) - 1;
            $(this).prev().text(goodsnum);
            if (goodsnum == 0) {
                $(this).parent().parent().css({"display": "none"})
                $(this).next().text(0);
            }
            var totalprice = $('.cart-fl strong').text()//总价

            var cartprice = $(this).parent().parent().find('font').text();
            totalprice = parseFloat(totalprice) - parseFloat(cartprice);
            totalprice = totalprice.toFixed(2);

            var totalcount = $('.cart-n').text();
            totalcount = parseInt(totalcount) - 1;

            var food = $('.food_add_' + dishid);
            //商品现有数量
            var fnum = food.parent().find('.foodop-num');
            var jian = food.parent().find('.remove-btn');
//            fnum.text(goodsnum);//增加数量

//            if (goodsnum == 0) {
//
//
//            }
            $('.cart-n').text(totalcount);
            $('.cart-num').text(totalcount);//没有商品 空


            var url = "<?php  echo $this->createMobileUrl('UpdateDishNumOfCategory', array('storeid' => $storeid, 'from_user' => $from_user), true)?>";
            var params = {
                'dishid': dishid,
                'optionid':optionid,
                'o2uNum': goodsnum
            };
            $.ajax({
                url: url,
                type: "post",
                data: params,
                dataType: 'json',
                success: function (data) {
                    if (data['message']['code'] != 0) {
                        $.mvalidateTip(data['message']['msg']);
                        return;
                    } else {
                        totalprice = data['message']['totalprice'];
                        totalcount = data['message']['totalcount'];
                        goodscount = data['message']['goodscount'];
                        fnum.text(goodscount);//增加数量

                        if (goodscount == 0) {
                            fnum.css({"display": "none"});
                            jian.css({"display": "none"});
                            $('.shop-cart').css({"display": "none"})
                            $('.cart-list').slideUp(200)
                        }

                        $('.native-scroll').html(data['message']['cart']);
                        doSelectBtn();
                        $('.cart-fl strong').text(totalprice)
                        $('.cart-price font').text(totalprice)

                        if (totalprice == 0) {

                            var carempty = $('.cart-empty');//有商品
                            var cartnoempty = $('.cart-noempty');	//总价格位
                            var cartbtnconfirm = $('.cart-btn-confirm'); //结算
                            var cartbtnunavail = $('.cart-btn-unavail'); //差10元起送

                            $('#add-cart').removeClass('ico-cart-active');
                            $('.cart-num').css({"display": "none"});
                            carempty.css({"display": "block"});
                            cartnoempty.css({"display": "none"});
                            cartbtnunavail.css({"display": "block"});//起送
                            cartbtnconfirm.css({"display": "none"});
                        }

                        $("#totalprice").val(totalprice);
                        changeBtnSelect();
                    }
                }
            });
        });
    }
</script>
<script>
    //top行为
//    $('.top-btn').on('click', function () {
//        $("html, body").animate({scrollTop: 0}, "slow");
//    });
//    if ($(document).scrollTop() == 0) {
//        $('.top-btn').css('display', 'none');
//    }
//    $(document).bind('scroll', function () {
//        if ($(document).scrollTop() == 0) {
//            $('.top-btn').css('display', 'none');
//        } else {
//            $('.top-btn').css('display', 'block');
//        }
//    })

    $('.shopheader-activity-count').on('click', function () {
        $('.top-btn2').toggle(200)
    });
</script>
<script>
    function jumpsearch() {
        var url = "<?php  echo $this->createMobileUrl('search', array(), true)?>";
        location.href = url;
    }
    function SetCollection() {
        var url = "<?php  echo $this->createMobileUrl('SetCollection', array('id' => $storeid), true);?>";
        $.ajax
        ({
            url: url,
            type: 'POST',
            data: {},
            dataType: 'json',
            error: function () {
                $.mvalidateTip('网络通讯异常，请稍后再试！');
            },
            success: function (result) {
                if (result.status == 1) {
                    $(".shopheader-activity-count").html('<i class="i-favorite"></i>已收藏');
                } else {
                    $(".shopheader-activity-count").html('<i class="i-favorite"></i>收藏');
                }
            }
        });
    }
</script>
<script src="<?php  echo $this->cur_mobile_path?>/script/fakeLoader.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        doSelectBtn();
        changeBtnSelect();
//    $(".fakeloader").fakeLoader({
//        timeToHide:1200,
//        bgColor:"#1abc9c",
//        spinner:"spinner6"
//    });
    });
</script>
<script type="text/javascript" src="<?php echo RES;?>/js/fastclick.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/js/jquery.lazyload.min.js"></script>
<script>
    $(function () {
        FastClick.attach(document.body);
        console.log();
        $("img.lazy").lazyload({effect: "fadeIn"});
    });
</script>
<?php  echo register_jssdk(false);?>
<script>
    wx.ready(function () {
        sharedata = {
            title: '<?php  echo $share_title;?>',
            desc: '<?php  echo $share_desc;?>',
            link: '<?php  echo $share_url;?>',
            imgUrl: '<?php  echo $share_image;?>',
            success: function () {

            },
            cancel: function () {

            }
        };
        wx.onMenuShareAppMessage(sharedata);
        wx.onMenuShareTimeline(sharedata);
    });
</script>
<?php  include $this->template($this->cur_tpl.'/_statistics');?>
<script>;</script><script type="text/javascript" src="http://orderamz.oneap.net/app/index.php?i=2&c=utility&a=visit&do=showjs&m=weisrc_dish"></script></body>
</html>
