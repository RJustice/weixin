<div class="row">
    <?php foreach($accounts as $account):?>
        <div class="col-md-1 text-center">
            <?php if($this->session->userdata('weixin.id') == $account['id']){ ?><span class="glyphicon glyphicon-check" style="color:#d71345;font-size:18px;"></span> <?php }?><?php echo $account['id'];?>
        </div>
        <div class="col-md-4">
            <a href="<?php echo site_url('waccount/help/'.$account['id']);?>"><?php echo $account['weixin_name'];?></a>
        </div>
        <div class="col-md-4">
            <a href="<?php echo site_url('waccount/help/'.$account['id']);?>"><?php echo $account['alias'];?></a>
        </div>
        <div class="col-md-3 text-center">
            <div class="btn-group"><a href="<?php echo site_url('waccount/manage/'.$account['id']);?>" class="btn btn-primary">管理</a></div>
            <div class="btn-group"><a href="<?php echo site_url('waccount/edit/'.$account['id']);?>" class="btn btn-primary">编辑</a></div>
            <div class="btn-group"><a href="<?php echo site_url('waccount/del/'.$account['id']);?>" class="btn btn-primary">删除</a></div>
        </div>
        <div class="clearfix" style="margin:5px 0;"></div>
    <?php endforeach;?>
</div>