<div class="row">
<?php echo validation_errors();?>
    <div class="col-md-8">
        <form action="<?php echo site_url('keyword/create');?>" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="keyword" value="<?php echo set_value('keyword');?>" id="keyword" class="form-control form-tip"  data-tip="keyword" data-tip-title="关键词(*)" placeholder="Keyword(*)" required>
                    </div>
                    <div class="col-md-4">
                        <label class="checkbox" for="is_fuzzy">
                            <input type="checkbox" value="1" id="is_fuzzy" name="is_fuzzy" data-toggle="checkbox" <?php echo set_checkbox('is_fuzzy','1');?> >模糊查询
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <select name="reply_type" id="reply_type" class="select-block">
                    <option value="text">文本回复</option>
                    <option value="article">图文回复</option>
                    <option value="multiple-article">多图文回复</option>
                    <option value="menu">回复功能菜单</option>
                </select>
            </div>
            <div id="text-select" class="select-content">
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
            <div id="article-select" class="select-content">
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
            <div id="multiple-article-select" class="select-content">
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
            <div id="menu-select" class="select-content">
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
            <div class="form-group text-center"><input type="submit" value="Submit" class="btn btn-primary"></div>
        </form>
    </div>
    <div class="col-md-4">
        <style>
            .demo {
                margin-bottom:20px;
                padding-left:50px;
                position:relative;
            }
             
            .triangle {
                position:absolute;
                top:50%;
                margin-top:-8px;
                left:42px;
                display:block;
                width:0;
                height:0;
                overflow:hidden;
                line-height:0;
                font-size:0;
                border-bottom:8px solid #FFF;
                border-top:8px solid #FFF;
                border-left:none;
                border-right:8px solid #3079ED;
            }
             
            .demo .article {
                float:left;
                color:#FFF;
                display:inline-block;
                *display:inline; zoom:1;
                padding:5px 10px;
                border:1px solid #3079ED;
                background:#eee;
                border-radius:5px;
                background-color: #4D90FE;
                background-image:-webkit-gradient(linear,left top,left bottom,from(#4D90FE),to(#4787ED));
                background-image:-webkit-linear-gradient(top,#4D90FE,#4787ED);
                background-image:-moz-linear-gradient(center top , #4D90FE, #4787ED);
                background-image:linear-gradient(top,#4D90FE,#4787ED);
            }
             
            .fr { padding-left:0px; padding-right:50px; }
             
            .fr .triangle {
                left:auto;
                right:42px;
                border-bottom:8px solid #FFF;
                border-top:8px solid #FFF;
                border-right:none;
                border-left:8px solid #3079ED;
            }
             
            .fr .article {
                float:right;
            }

            .select-content{display:none;}
            #text-select{display: block;}
</style>
        <h2 class="text-center">效果预览</h2>
        <div id="effect-content">
            <div class="row">
                <div class="col-md-12 demo fr">
                    <span class="triangle"></span>
                    <div class="article" id="keyword-demo">&nbsp;</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 demo">
                    <span class="triangle"></span>
                    <div class="article" id="reply-demo">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    require(['flatui-checkbox','bootstrap-select'],function(){
        $(function(){
            $("select").selectpicker({style: 'btn-sm btn-primary', menuStyle: 'dropdown-inverse',size:'auto',dropupAuto: 'false',title:'请选择'});
            $("#keyword").change(function(){
                if($("#is_fuzzy").is(":checked")){
                    $("#keyword-demo").html("ABC["+$(this).val()+"]123");
                }else{
                    $("#keyword-demo").html($(this).val());        
                }
            });
            $("#is_fuzzy").on('toggle',function(){
                if($(this).is(":checked")){
                    $("#keyword-demo").html("ABC["+$("#keyword").val()+"]123");
                }else{
                    $("#keyword-demo").html($("#keyword").val());        
                }
            });
            $("#reply_type").change(function(){
                var v = $(this).val();
                if($("#"+v+"-select").is(":hidden")){
                    $(".select-content").hide();
                    $("#"+v+"-select").show();
                }
            });

            // $("#text_msg").change(function(){
            //     msg = $("#text_msg").val();
            //     $("#reply-demo").html(msg.replace(/\\n/g,'<br \/>'));
            // });

            $("#cid").change(function(){
                $.ajax({
                  url:'/article/ajaxGetListsByCid/'+$(this).val(),
                  type:'get',
                  dataType:'json',
                  data:{},
                  success:function(data){
                      options = "";
                      for(i in data){
                          options += '<option value="'+data[i]['id']+'" data-img="'+data[i]['img']+'">'+data[i]['title']+'</option>'; 
                      }
                      $("#aid").html(options);
                      $("#aid").selectpicker('refresh');
                  }
              });
          });


          $("#aid").change(function(){
              var img = $(this).find(":selected").data('img');
              var reply;
              reply = '<h4>'+$(this).find(":selected").text()+'</h4>';
              reply += '<img src="'+img+'" width="320px" height="200px" class="img-rounded" />';
              $("#reply-demo").html(reply);
          });


          $("#cids").change(function(){
              $.ajax({
                  url:'/article/ajaxGetListsByCid/'+$(this).val(),
                  type:'get',
                  dataType:'json',
                  data:{},
                  success:function(data){
                      options = "";
                      for(i in data){
                          options += '<option value="'+data[i]['id']+'" data-img="'+data[i]['img']+'">'+data[i]['title']+'</option>'; 
                      }
                      $("#aids").html(options);
                      $("#aids").selectpicker('refresh');
                  }
              });
          });

          $("#aids").change(function(){
              var n = $(this).find(':selected').length;
              var reply = '';
              var replyDemo = $("#reply-demo");
              if(n==0){
                  reply += '&nbsp;';
              }else if(n==1){
                  reply += '<h4>'+$(this).find(":selected").text()+'</h4>';
                  reply += '<img src="'+$(this).find(":selected").data('img')+'" width="320px" height="200px" class="img-rounded" />';
              }else{
                  $(this).find(":selected").each(function(i){
                      if(i == 0){
                          reply += '<h4>'+$(this).text()+'</h4>';
                          reply += '<img src="'+$(this).data('img')+'" width="320px" height="200px" class="img-rounded" />';
                          reply += '<hr />';
                          reply += '<ul class="media-list">';
                      }else{
                          reply += '<li class="media">';
                          reply += '<a class="pull-left" href="javascript:void(0)">';
                          reply += '<img class="media-object" width="64px" height="64px" src="'+$(this).data('img')+'">';
                          reply += '</a>';
                          reply += '<div class="media-body">';
                          reply += '<h4 class="media-heading">'+$(this).text()+'</h4>';
                          reply += '</div>';
                          reply += '</li>';
                      }
                  });
                  reply += '</ul>';
              }
              replyDemo.html(reply);
          });
        });
    });
require(['bootstrap-wysiwyg','tooltip'],function(){
  $('a[title]').tooltip({container:'body'});
  $('.dropdown-menu input').click(function() {return false;}).change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');}).keydown('esc', function () {this.value='';$(this).change();});
  $('#editor').wysiwyg();
  window.prettyPrint && prettyPrint();

  $('#editor').bind('input propertychange', function() {
      msg = $("#editor").html();
      $("#reply-demo").html(msg);
      $("#text-msg").val(msg.replace(/\n/,'').replace(/<div>(.+?)<\/div>/g,'\n$1').replace(/<br>/g,'\n').replace(/(\n)+$/,''));
      // var l = $.trim($("#text-msg").val()).length;
      // $("#text-msg").val($("#text-msg").val()ubstr(0,l-2));
  });
});
</script>