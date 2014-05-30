<div class="row">
    <div class="col-md-12 text-center">
        <a href="<?php echo site_url('article/create');?>" class="btn btn-primary">Create</a>
    </div>
</div>
<?php foreach($articles as $article):?>
<div class="row" style="margin-bottom:10px;height:40px;line-height:40px;">
    <div class="col-md-4">
        <a href="<?php echo site_url('weixin/article/'.$article['aid']);?>" target="_blank"><?php echo $article['title'];?></a>
    </div>
    <div class="col-md-2">
        <a href="<?php echo site_url('article/lists/'.$article['cid']);?>"> <?php echo $article['cat_name'];?></a>
    </div>
    <div class="col-md-2">
        <?php echo date('Y-m-d H:i:s',$article['created']);?>
    </div>
    <div class="col-md-2 text-center">
        <a href="<?php echo site_url('article/edit/'.$article['aid']);?>" class="btn btn-info btn-sm">
            <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit
        </a>
    </div>
    <div class="col-md-2 text-center">
        <a href="<?php echo site_url('article/del/'.$article['aid']);?>" class="btn btn-danger btn-sm">
            <span class="glyphicon glyphicon-remove"></span>&nbsp;Delete
        </a>
    </div>
</div>
<?php endforeach;?>