<?php if($weixin):?>
<div class="row">
    <div class="col-md-12">
        <p>您刚才绑定的是: <?php echo $weixin['weixin_name'];?></p>
        <p><?php if( ! empty($weixin['alias'])){?>在平台的管理别称是: <?php echo $weixin['alias'];?>,用于方便区分您管理多个同名微信.<?php } ?> </p>
        <hr class="clearfix" />
        <h4>如何设置:</h4>
        <p>1. 首先打开功能-->高级功能-->开启开发者模式</p>
        <p>2. 同意协议</p>
        <p>3. 在URL内输入: <input type="text" class="form-control" value="<?php echo $weixin['url'];?>"></p>
        <p>4. 在Token内输入:<input type="text" class="form-control" value="<?php echo $weixin['token'];?>"></p>
        <p>5. 提交</p>
        <hr class="clearfix" />
        <h4>开始其他设置吧.进行测试吧.</h4>
    </div>
</div>
<?php else:?>
<div class="row">
    <div class="col-md-12">
        <p>1. 您可以打开<a href="<?php echo site_url('waccount');?>" class="btn btn-info btn-sm ">公众号列表</a></p>
        <p>2. 点击其中需要设置的公众号名称.</p>
        <p>3. 就可以获得该公众号配置开发者模式的帮助.</p>
    </div>
</div>
<?php endif;?>