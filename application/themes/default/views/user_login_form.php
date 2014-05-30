<div class="login">
<div class="login-screen">
  <div class="login-icon">
    <h4>欢迎登陆 <small>微信公众号管理平台</small></h4>
  </div>
<form action="<?php echo site_url("user/login");?>" method="post">
  <div class="login-form">
    <div class="form-group">
      <input type="text" class="form-control login-field" value="" name="username" placeholder="Enter your name" id="login-name">
      <label class="login-field-icon fui-user" for="login-name"></label>
    </div>

    <div class="form-group">
      <input type="password" class="form-control login-field" value="" name="password" placeholder="Password" id="login-pass">
      <label class="login-field-icon fui-lock" for="login-pass"></label>
    </div>
    <input type="hidden" name="ref" value="<?php echo $ref;?>">
    <input type="submit" class="btn btn-primary btn-lg btn-block" value="登陆" />
  </div>
  </form>
</div>
</div>
<style type="text/css">
    .container{width:970px !important};
</style>