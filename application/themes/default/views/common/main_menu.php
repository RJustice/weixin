<?php
  $controller = $this->router->class;
  $method = $this->router->method;
?>
<div class="row">
  <div class="col-md-12">
    <?php if($this->session->userdata('weixin_num') > 0):?>
    <div class="alert alert-info text-center">
      您现在管理的是微信号: <em><?php echo $this->session->userdata('weixin.alias');?></em> , <a href="<?php echo site_url('waccount/lists');?>">点击切换其他微信号管理</a>.
    </div>
    <?php endif?>
  </div>
</div>
<nav class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
      <span class="sr-only">导航</span>
    </button>
    <a class="navbar-brand" href="#">公众平台</a>
  </div>
  <div class="collapse navbar-collapse" id="navbar-collapse-01">
    <ul class="nav navbar-nav">    
      <li class="<?php if($controller == 'waccount'){echo 'active';}?> dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">公众号管理 <b class="caret"></b></a>
        <span class="dropdown-arrow dropdown-arrow-inverse"></span>
          <ul class="dropdown-menu">
            <li class="<?php  if($controller == 'waccount' && $method == 'lists'){echo 'active';}?>"><a href="<?php echo site_url('waccount');?>">公众号列表</a></li>
            <li class="<?php  if($controller == 'waccount' && $method == 'create'){echo 'active';}?>"><a href="<?php echo site_url('waccount/create');?>">新增公众号</a></li>
            <li class="<?php  if($controller == 'waccount' && $method == 'help'){echo 'active';}?>"><a href="<?php echo site_url('waccount/help');?>">公众号帮助</a></li>
          </ul>
      </li>
      <li class="<?php if($controller == 'article' || $controller == 'cat'){echo 'active';}?> dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">图文素材 <b class="caret"></b></a>
        <span class="dropdown-arrow dropdown-arrow-inverse"></span>
        <ul class="dropdown-menu">
          <li class="<?php  if($controller == 'cat' && $method == 'lists'){echo 'active';}?>"><a href="<?php echo site_url('cat');?>">分类列表</a></li>
          <li class="<?php  if($controller == 'cat' && $method == 'create'){echo 'active';}?>"><a href="<?php echo site_url('cat/create');?>">创建分类</a></li>
          <li class="divider"></li>
          <li class="<?php  if($controller == 'article' && $method == 'lists'){echo 'active';}?>"><a href="<?php echo site_url('article');?>">文章列表</a></li>
          <li class="<?php  if($controller == 'article' && $method == 'create'){echo 'active';}?>"><a href="<?php echo site_url('article/create');?>">创建文章</a></li>
        </ul>
      </li>
      <li class="<?php if($controller == 'keyword' || $controller == 'fun_menu'){echo 'active';}?> dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">回复设置 <b class="caret"></b></a>
        <span class="dropdown-arrow dropdown-arrow-inverse"></span>
        <ul class="dropdown-menu">
          <li class="<?php  if($controller == 'keyword' && $method == 'lists'){echo 'active';}?>"><a href="<?php echo site_url('keyword');?>">关键词列表</a></li>
          <li class="<?php  if($controller == 'keyword' && $method == 'create'){echo 'active';}?>"><a href="<?php echo site_url('keyword/create');?>">新增关键词</a></li>
          <li class="divider"></li>
          <li class="<?php  if($controller == 'fun_menu' && $method == 'lists'){echo 'active';}?>"><a href="<?php echo site_url('fun_menu');?>">功能菜单列表</a></li>
          <li class="<?php  if($controller == 'fun_menu' && $method == 'create'){echo 'active';}?>"><a href="<?php echo site_url('fun_menu/create');?>">新建功能菜单</a></li>
        </ul>
      </li>
      <li class="<?php if($controller == 'menu'){ echo 'active';}?>">
        <a href="<?php echo site_url('menu');?>">自定义菜单</a>
      </li>      
      <li class="<?php if($controller == 'wevent'){echo 'active';}?> dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">事件设置 <b class="caret"></b></a>
        <span class="dropdown-arrow dropdown-arrow-inverse"></span>
        <ul class="dropdown-menu">
          <li class="<?php  if($method == 'lists'){echo 'active';}?>"><a href="<?php echo site_url('wevent');?>">事件列表</a></li>
          <li class="<?php  if($method == 'create'){echo 'active';}?>"><a href="<?php echo site_url('wevent/create');?>">新增事件</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav><!-- /navbar -->
<script type="text/javascript">
  require(['bootstrap.min'],function(){

  });  
</script>