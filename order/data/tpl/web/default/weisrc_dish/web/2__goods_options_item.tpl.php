<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
    <div class="col-sm-7">
        <div class="input-group">
            <span class="input-group-addon">排序：</span>
            <input type="text" class="form-control" value="<?php  echo $row['displayorder'];?>" name="optiondisplayorder[]">
            <span class="input-group-addon">规格名：</span>
            <input type="text" class="form-control" value="<?php  echo $row['start'];?>" name="optionstart[]">
            <span class="input-group-addon">属性值：</span>
            <input type="text" class="form-control" value="" name="optiontitle[]">
            <span class="input-group-addon no-b">加价</span>
            <input type="text" class="form-control" value="" name="optionprice[]">
            <span class="input-group-addon no-l-b">元</span>
        </div>
    </div>
    <div class="col-sm-1">
        <a class="btn btn-danger btn-sm" onclick="$(this).parents('.form-group').remove(); return false;" href="#">删除
        </a>
    </div>
</div>