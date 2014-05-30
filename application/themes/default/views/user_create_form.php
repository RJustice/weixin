<div class="row">
    <?php echo validation_errors();?>
    <?php if($error == -1):?>
        <div class="alert alert-danger text-center">
            用户名已经被使用.
        </div>
    <?php elseif($error == -2):?>
        <div class="alert alert-danger text-center">
            邮箱已被使用.
        </div>
    <?php endif;?>
    <div class="col-md-6 col-md-offset-3">
        <form action="<?php echo site_url('user/create');?>" method="post">
            <div class="form-group <?php if($error == -1 || form_error('username')){ echo "has-error";}?>">
                <input type="text" name="username" id="username" value="<?php echo set_value('username');?>" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group <?php if(form_error('password')){ echo "has-error";}?>">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password of at least eight must include uppercase lowercase letters and numbers" required>
            </div>
            <div class="form-group <?php if(form_error('pwdconf')){ echo "has-error";}?>">
                <input type="password" name="pwdconf" id="pwdconf" class="form-control" placeholder="Password Confirmation" required>
            </div>
            <div class="form-group <?php if($error == -2 || form_error('email')){ echo "has-error";}?>">
                <input type="text" name="email" id="Email" value="<?php echo set_value('email');?>" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <select class="select-block" name="multi" id="multi">
                    <option value="1" selected="seelcted">1个</option>
                    <option value="5">5个</option>
                    <option value="10">10个</option>
                    <option value="20">20个</option>
                    <option value="999">无限个</option>
                </select>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="创建" class="btn btn-primary btn-block">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    require(['bootstrap-select'],function(){
        $("#multi").selectpicker({style: 'btn-info', menuStyle: 'dropdown-inverse',size:'auto',dropupAuto: 'false',title:'请选择'});
    });
</script>