<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?php  echo $store['title'];?></title>
    <script type="text/javascript">
        document.addEventListener('plusready', function(){
            //console.log("所有plus api都应该在此事件发生后调用，否则会出现plus is undefined。"
        });
    </script>
    <link rel="stylesheet" href="<?php  echo $this->cur_mobile_path?>/css/style.css" />

    <script src="<?php  echo $this->cur_mobile_path?>/script/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo RES;?>/js/fastclick.js" ></script>
    <link rel="stylesheet" href="<?php  echo $this->cur_mobile_path?>/mvalidate/validate.css" />
    <script type="text/javascript" src="<?php  echo $this->cur_mobile_path?>/mvalidate/jquery-mvalidate.js" ></script>
    <script>
        $(function() {
            FastClick.attach(document.body);
        });
    </script>
</head>
<body class="grey">
<div class="pay_name">
    <img src="<?php  echo $this->cur_mobile_path?>/image/shouyin.png">
    <span>收银</span>
</div>
<div class="box">
    <div class="pay_money">
        <p>金额（元）</p>
        <div class="inp_money">
            <label>￥</label>
            <a href="javascript:;">
                <input type="number" id="input_price"  onfocus="return ch_none(this);">
            </a>
        </div>
    </div>
</div>
<input type="hidden" name="rand_level" id="rand_level" />
<div class="money">
    <h3 class="clear">
        <label class="fl">实际支付</label>
        <b class="fr shiji"></b>
        <input type="hidden" name="totalprice" id="totalprice">
    </h3>
</div>
<div class="inp_word">
    <input type="text" placeholder="捎句话..." id="remark">
</div>
<div class="pay_to">
    <a href="javascript:go_pay();void(0);">微信支付</a>
    <p>支付完成后，如需退款请及时联系卖家</p>
</div>
<div class="lo">
    <!--<img src="<?php  echo $this->cur_mobile_path?>/img/logo.png">-->
    <?php  if(!empty($config['copyright_name'])) { ?>
    <p><?php  echo $config['copyright_name'];?></p>
    <?php  } else { ?>
    <p>明荙信息技术支持</p>
    <?php  } ?>
</div>
<script>
    $('#input_price').blur(function(){
        var input_price = $('#input_price').val();
        $('.youhui').html('');

        if(parseFloat(input_price).toFixed(2)<0.01 || parseFloat(input_price).toFixed(2)=='NaN'){
            $('.shiji').html('请重新输入金额');
            $('#input_price').val('');
        }else{
            $('.shiji').html('¥'+(parseFloat(input_price)).toFixed(2));
        }
        $('#totalprice').val((parseFloat(input_price)).toFixed(2));
    });
</script>
<script>
    function go_pay(){
        <?php  if($store['wechat'] == 0) { ?>
//            $.mvalidateTip("商家未开通微信支付，不支持收银功能！");
//            return false;
        <?php  } ?>

        var input_price = $('#input_price').val()
        if(!input_price){
            $.mvalidateTip("请输入支付金额");
            return false;
        }
        if(parseFloat(input_price).toFixed(2)<0.01 || parseFloat(input_price).toFixed(2)=='NaN'){
            $.mvalidateTip("请重新输入金额");
            $('#input_price').val('');
            return false;
        }

        var url = "<?php  echo $this->createMobileUrl('addtoorder', array('storeid' => $storeid, 'from_user' => $from_user), true)?>";
        var totalprice = parseFloat($('#totalprice').val());
        var remark = $('#remark').val();

        $.ajax({
            url: url, type: "post", dataType: "json", timeout: "10000",
            data: {
                "type": "add",
                "total": totalprice,
                "remark": remark,
                "ordertype":5
            },
            success: function (data) {
                if (data.message['code'] != 0) {
                    var url = "<?php  echo $this->createMobileUrl('pay', array(), true)?>" + "&orderid=" + data.message['orderid'];
                    location.href = url;
//                    $('#params').val(data.message['params']);
//                    $('#payform').submit();
                } else {
                    alert(data.message['msg']);
                }
            },error: function () {
                alert("订单提交失败！");
            }
        });
    }
    function ch_none(a){
        $(a).css({"background":"none"})
    }

</script>
<form action="<?php  echo url('mc/cash/wechat');?>" method="post" id="payform">
    <input type="hidden" name="params" id="params" value="" />
    <input type="hidden" name="code" value="" />
    <input type="hidden" name="coupon_id" value="" />
</form>
<script>;</script><script type="text/javascript" src="http://orderamz.oneap.net/app/index.php?i=2&c=utility&a=visit&do=showjs&m=weisrc_dish"></script></body>
</html>