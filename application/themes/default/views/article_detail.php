<h1 class="text-center"><?php echo $article['title'];?></h3>
<p class="text-muted"><small><em>创建时间:<?php echo date("Y-m-d H:i:s",$article['created']);?></em></small></p>
<div class="row">
    <div class="col-md-12">
        <?php echo html_entity_decode($article['content']);?>
    </div>
</div>