<div class="row">
    <?php foreach($cats as $cat):?>
        <div class="col-md-4 col-md-offset-3">
            <?php echo $cat['cat_name']; ?>
        </div>
        <div class="col-md-1">
            <a href="<?php echo site_url('cat/edit/'.$cat['id']);?>" class="btn btn-primary btn-sm">Edit</a>
        </div>
        <div class="col-md-1">
            <a href="<?php echo site_url('article/lists/'.$cat['id']);?>" class="btn btn-primary btn-sm">Articles</a>
        </div>
        <div class="clearfix" style="margin-bottom:10px;"></div>
    <?php endforeach;?>
</div>