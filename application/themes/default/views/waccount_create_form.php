<div class="row">
    <?php if(validation_errors()):?>
    <div class="col-md-6 col-md-offset-3">
        <div class="alert alert-danger"><?php echo validation_errors();?></div>
    </div>
    <?php endif;?>
    <div class="col-md-6 col-md-offset-3">
        <form action="<?php echo current_url();?>" method="post">
            <div class="form-group"><input type="text" name="weixin_name" value="<?php echo set_value('weixin_name',$weixin['weixin_name']);?>" id="weixin_name" class="form-control" placeholder="微信名字(*)"></div>
            <div class="form-group"><input type="text" name="weixin_id" value="<?php echo set_value('weixin_id',$weixin['weixin_id']);?>" id="weixin_id" class="form-control" placeholder="微信原始ID(*)"></div>
            <div class="form-group"><input type="text" name="alias" value="<?php echo set_value('alias',$weixin['alias']);?>" id="alias" class="form-control" placeholder="平台管理别称,为了更好识别"></div>
            <div class="form-group">
                <div class="col-md-4">
                    <label for="custom-token" class="checkbox">
                        <input type="checkbox" id="custom-token" data-toggle="checkbox">自定义Token
                    </label>
                </div>
                <div class="col-md-8">
                    <input type="text" name="token" value="<?php echo set_value('token',$weixin['token']);?>" id="token" class="form-control" placeholder="开发模式Token,字母和数字6-32位" readonly="readonly">
                </div>
                <div class="clearfix"></div>
            </div>
            <hr class="clearfix" />
            <div class="form-group">
                <label for="app-key" class="col-md-3 control-label">App Key</label>
                <div class="col-md-9">
                    <input type="text" name="app_key" value="<?php echo set_value('app_key',$weixin['app_key']);?>" id="app-key" class="form-control" placeholder="如未进行微信认证,无需填写.">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <label for="app-secret-key" class="col-md-3 control-label">App Secret Key</label>
                <div class="col-md-9">
                    <input type="text" name="app_secret" value="<?php echo set_value('app_secret',$weixin['app_secret']);?>" id="app-secret-key" class="form-control" placeholder="如未进行微信认证,无需填写.">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="checkbox" for="is-service">
                        <input type="checkbox" value="1" name="is_service" <?php echo set_checkbox('is_service',$weixin['is_service']); ?> id="is-service" data-toggle="checkbox">是否为服务号
                    </label>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group text-center">
                <input type="hidden" name="id" value="<?php echo set_value('id',$weixin['id']);?>" id="id">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    require(['flatui-checkbox'],function(){
        $(function(){
            $("#custom-token").on('toggle',function(){
                if($(this).is(":checked")){
                    $("#token").attr('readonly',false);
                }else{
                    if($("#id").val() == 0){
                        $("#token").val('');
                    }
                    $("#token").attr('readonly',true);
                }
            });
        });
    });
</script>