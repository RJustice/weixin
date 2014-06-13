<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-danger text-center">
            <p>你没有登记该微信的APP_KEY和APP_SECRET,可以<a href="<?php echo site_url('waccount/edit/'.$this->session->userdata('weixin.id')); ?>" class="btn btn-primary btn-sm">前去编辑</a>添加APP_KEY和APP_SECRET.</p>
            <p>关于如何获取APP_KEY和APP_SECRET,可以参考微信公众平台说明.<br />    订阅号通过微信认证即可获得自定义菜单功能,可以在开发者模式下看到APP_KEY和APP_SECRET.<br />    服务号可以直接在开发者模式下查看到APP_KEY和APP_SECRET.</p>
        </div>
    </div>
</div>