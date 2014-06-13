<div class="row">
    <?php echo validation_errors();?>
    <div class="col-md-4 col-md-offset-4">
        <form action="<?php echo current_url();?>" method="post">
            <div class="form-group">
                <input type="text" class="form-control form-tip"  data-tip="cat-name" data-tip-title="分类名称(*)"  name="cat_name" id="cat_name" value="<?php echo set_value('cat_name',$cat['cat_name']);?>" placeholder="Category Name"/>
            </div>
            <div class="form-group text-center">
                <input type="hidden" name="id" value="<?php echo $cat['id'];?>" />
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>