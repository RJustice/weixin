<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form action="<?php echo site_url('wevent/create');?>" method="post" id="event-form" rule="event-form">
            <div class="form-group">
                <input type="text" name="title" id="event-title" class="form-control" placeholder="Event Title(*)" required />
            </div>
            <div class="form-group">
                <select name="event_cat" id="event-cat" class="select-block">
                    <option value="0" selected>请选择</option>
                    <option value="1">内容回复</option>
                    <option value="2">关注事件</option>
                    <option value="3">活动事件</option>
                    <option value="4">特殊接口</option>
                </select>
            </div>
            <div class="form-group">
                <select name="event_type" id="event-type" class="select-block event-type">
                    <option>请先选择分类</option>
                </select>
            </div>
            <div class="form-group" id="event-content">
                <div id="reply-text" class="select-content">
                    <div class="form-group">
                      <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
                        <div class="btn-group">
                          <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Hyperlink"><span class="glyphicon glyphicon-link"></span></a>
                          <div class="dropdown-menu">
                              <input class="form-control" placeholder="URL" type="text" data-edit="createLink">
                              <button class="btn btn-primary btn-sm" type="button">Add</button>
                          </div>
                        </div>
                        <div class="btn-group">
                          <a class="btn btn-primary btn-sm" data-edit="unlink" title="" data-original-title="Remove Hyperlink"><span class="glyphicon glyphicon-scissors"></span></a>
                        </div>
                        <div class="btn-group">
                          <a class="btn btn-primary btn-sm" data-edit="undo" title="" data-original-title="Undo (Ctrl/Cmd+Z)"><span class="glyphicon glyphicon-unshare"></span></a>
                          <a class="btn btn-primary btn-sm" data-edit="redo" title="" data-original-title="Redo (Ctrl/Cmd+Y)"><span class="glyphicon glyphicon-share"></span></a>
                        </div>
                      </div>
                      <div id="editor"class="form-control" style="overflow:scroll;min-height:300px;margin-top:5px;">
                        <?php echo set_value('text_msg','');?>
                      </div>
                      <textarea name="text_msg" id="text-msg" cols="30" rows="10" style="display:none;"></textarea>
                    </div>
                </div>
                <div id="reply-article" class="select-content">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                            <?php echo cat_select(array('id'=>'cid','class'=>'select-block'));?>
                            </div>
                            <div class="col-md-8">
                            <?php echo default_cat_articles_select(array('id'=>'aid','name'=>'aid','class'=>'select-block reply'));?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="reply-multiple-article" class="select-content">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                            <?php echo cat_select(array('id'=>'cids','class'=>'select-block'));?>
                            </div>
                            <div class="col-md-8">                        
                            <?php echo default_cat_articles_select(array('id'=>'aids','name'=>'aids[]','class'=>'select-block reply','multiple'=>'multiple','data-selected-text-format'=>'count'));?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="reply-menu" class="select-content">
                    <div class="form-group">
                        <select name="menu" id="menu" class="selectpicker select-block reply">
                            <option value="0">请选择</option>
                            <option value="1">Menu1</option>
                            <option value="2">Menu2</option>
                            <option value="3">Menu3</option>
                            <option value="4">Menu4</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="新增" class="form-control">
            </div>
        </form>
    </div>
</div>
<style>
    .select-content{display:none;}
    .has-error .select.select-block{border-width:2px;border-style:solid;border-color:#E74C3C;box-shadow:none;border-radius:6px;}
</style>
<script type="text/javascript">
    var event_type = {
        'reply':{'reply-text':'文本','reply-article':'图文','reply-multiple-article':'多图文','reply-menu':'功能菜单'},
        'subscribe':{'subscribe-normal':'关注','subscribe-qr':'扫码关注'},
        'action':{'action-normal':'普通活动','action-qr':'扫码活动'},
        'api':{'api-weather':'天气预报','api-form':'万能表单','api-page':'单页'}
    };
</script>
<script type="text/javascript">
    require(['bootstrap-select','bootstrap-wysiwyg','tooltip'],function(){
        $(function(){

            $("#event-form").submit(function(){
                if($("#event-cat").val() == '0'){
                    $("#event-cat").parent().addClass('has-error');
                    return false;
                }
            });

            function initToolbarBootstrapBindings() {
              var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
                    'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                    'Times New Roman', 'Verdana'],
                    fontTarget = $('[title=Font]').siblings('.dropdown-menu');
              $.each(fonts, function (idx, fontName) {
                  fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
              });
              $('a[title]').tooltip({container:'body'});
                $('.dropdown-menu input').click(function() {return false;})
                    .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
                .keydown('esc', function () {this.value='';$(this).change();});

              $('[data-role=magic-overlay]').each(function () { 
                var overlay = $(this), target = $(overlay.data('target')); 
                overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
              });
            };
            function showErrorAlert (reason, detail) {
                var msg='';
                if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
                else if(reason==='file-size-too-big'){ msg = "File size is too big,<=200K. Your file size:" +detail }
                else{
                    console.log("error uploading file", reason, detail);
                }
                $('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
                 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
            };
            initToolbarBootstrapBindings();  
            $('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
                // window.prettyPrint && prettyPrint();
            $("select").selectpicker({style:'select-block btn-sm btn-primary', menuStyle: 'dropdown-inverse',size:'auto',dropupAuto: 'false',title:'请选择'});
            $("#event-cat").change(function(){
                switch($(this).val()){
                    case '0':
                        $("#event-type").html('');
                        $("#event-type").selectpicker('refresh');
                        break;
                    case '1':
                        $("#event-type").html('');
                        for(k in event_type['reply']){
                            $("#event-type").append('<option value="'+k+'">'+event_type['reply'][k]+'</option>');
                        }
                        $('#event-type').selectpicker('refresh');
                        break;
                    case '2':
                        $("#event-type").html('');
                        for(k in event_type['subscribe']){
                            $("#event-type").append('<option value="'+k+'">'+event_type['subscribe'][k]+'</option>');
                        }
                        $('#event-type').selectpicker('refresh');

                        break;
                    case '3':
                        $("#event-type").html('');
                        for(k in event_type['action']){
                            $("#event-type").append('<option value="'+k+'">'+event_type['action'][k]+'</option>');
                        }
                        $('#event-type').selectpicker('refresh');

                        break;
                    case '4':
                        $("#event-type").html('');
                        for(k in event_type['api']){
                            $("#event-type").append('<option value="'+k+'">'+event_type['api'][k]+'</option>');
                        }
                        $('#event-type').selectpicker('refresh');
                        break;
                }
                $("#event-content .select-content").hide();
                $("#"+$("#event-type").val()).show();
                $(this).parent().removeClass('has-error');
            });

            $("#event-type").change(function(){
                var v = $(this).val();
                // var e = ['reply','subscribe','action','menu'];
                // var c = e[parseInt($("#event-cat").val()) - 1];
                // var id = v.split(c+'-')[1];
                $("#event-content .select-content").hide();
                $("#"+v).show();
                /*switch(c){
                    case 'reply':
                        switch(id){
                            case 'text':
                                $("#event-content select-content").hide();
                                $("#"+id).show();
                                break;
                            case 'article':
                                break;
                            case 'multiple-article':
                                break;
                            case 'menu':
                                break;
                        }
                        break;
                    case 'subscribe':
                        break;
                    case 'action':
                        break;
                    case 'api':
                        break;
                }*/
            });
        });
    });
</script>