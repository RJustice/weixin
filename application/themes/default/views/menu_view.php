<div class="row">
<?php foreach($menus as $menu):?>
    <div class="col-md-4">
    <?php if($menu['level'] == 1):?>
        |---- 
    <?php endif; ?>
    <?php echo $menu['menu']; ?>
    </div>
    <div class="col-md-4">
        <?php echo $menu['type']; ?>
    </div>
    <div class="col-md-4">
        <?php echo $menu['type']=='click'?$menu['key']:$menu['url']; ?>
    </div>
    <div class="clearfix"></div>
<?php endforeach;?>
</div>
<div class="row" style="margin-top:10px;">
    <div class="col-md-6 col-md-offset-3 text-center">
        <?php if(!empty($menus)):?>
        <a href="<?php echo site_url('menu/modify'); ?>" class="btn btn-primary">编辑</a>
        <a data-toggle="modal" data-target="#delMenu" data-backdrop="static"  class="btn btn-danger">删除</a>
        <?php else:?>
        <a href="<?php echo site_url('menu/modify'); ?>" class="btn btn-primary">创建</a>
        <?php endif;?>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="delMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">删除确认</h4>
      </div>
      <div class="modal-body">
        <p>您确定现在要删除微信: <strong class="text-danger"><?php echo $this->session->userdata('weixin.weixin_name');?></strong> 的自定义菜单?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <a href="<?php echo site_url('menu/del'); ?>" type="button" class="btn btn-primary">确定</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->