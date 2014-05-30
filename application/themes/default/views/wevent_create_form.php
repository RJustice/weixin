<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form action="<?php echo site_url('wevent/create');?>" method="post">
            <div class="form-group">
                <select name="event_type" id="event_type" class="select-block">
                    <option value="subscribe">关注事件</option>
                    <option value="qr_subscribe">二维码事件</option>
                </select>
            </div>
            <div class="form-group">
                <select name="reply_type" id="reply_type" class="select-block">
                    <option value="text">文本回复</option>
                    <option value="article">图文回复</option>
                    <option value="multiple-article">多图文回复</option>
                    <option value="menu">功能菜单</option>
                </select>
            </div>
        </form>
    </div>
</div>