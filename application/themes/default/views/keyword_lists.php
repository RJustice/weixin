<div class="row">
    <div class="col-md-1 text-center">
        ID
    </div>
    <div class="col-md-3 text-center">
        关键词
    </div>
    <div class="col-md-1 text-center">
        模糊
    </div>
    <div class="col-md-3 text-center">
        回复类型
    </div>
    <div class="col-md-4 text-center">
        操作
    </div>
    <div class="clearfix"></div>
    <?php foreach($keywords as $keyword):?>
    <div class="col-md-1 text-center" style="height:45px;line-height:45px;">
        <?php echo $keyword['id'];?>
    </div>
    <div class="col-md-3 text-center" style="height:45px;line-height:45px;">
        <?php echo $keyword['keyword'];?>
    </div>
    <div class="col-md-1 text-center" style="height:45px;line-height:45px;">
        <span class="glyphicon glyphicon-check" style="font-size:22px;color:#<?php echo $keyword['is_fuzzy']?"1d953f":"d3d7d4";?>"></span>
    </div>
    <div class="col-md-3 text-center" style="height:45px;line-height:45px;">
        <?php
        switch($keyword['reply_type']){
            case 'text':
                echo "文本回复";
                break;
            case 'article':
                echo "图文回复";
            case 'multiple-article':
                echo "多图文回复";
                break;
            case 'menu':
                echo "功能菜单";
                break;
        }
        ?>
    </div>
    <div class="col-md-4 text-center">
        <?php if($keyword['status']):?>
        <div class="btn-group"><a href="<?php echo site_url('keyword/status/off/'.$keyword['id']);?>" class="btn btn-danger">禁用</a></div>
        <?php else:?>
        <div class="btn-group"><a href="<?php echo site_url('keyword/status/on/'.$keyword['id']);?>" class="btn btn-success">启用</a></div>
        <?php endif;?>
        <div class="btn-group"><a href="<?php echo site_url('keyword/edit/'.$keyword['id']);?>" class="btn btn-primary">编辑</a></div>
        <div class="btn-group"><a href="<?php echo site_url('keyword/del/'.$keyword['id']);?>" class="btn btn-primary">删除</a></div>
    </div>
    <div class="clearfix" style="margin:3px 0;"></div>
    <?php endforeach;?>
</div>