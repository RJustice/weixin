<div class="row">
    <?php echo validation_errors();?>
    <div class="col-md-10 col-md-offset-1">
        <div id="alerts"></div>
        <form action="<?php echo current_url();?>" method="post" id="article-add-form" role="article-form">
            <div class="form-group">
                <?php echo cat_select(array('name'=>'cid','id'=>'cid','class'=>'select-block'),$article['cid']);?>
            </div>
            <div class="form-group">
                <input type="text" name="title" id="title" class="form-control" value="<?php echo set_value('title',$article['title']);?>" placeholder="Article Title (*)" />
            </div>
            <div class="form-group">
                <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
                    <div class="btn-group dropdown">
                        <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Font"><span class="glyphicon glyphicon-font"></span><b class="caret"></b></a>
                        <span class="dropdown-arrow dropdown-arrow-inverse"></span>
                        <ul class="dropdown-menu dropdown-inverse">
                            <li><a data-edit="fontName Serif" style="font-family:'Serif'">Serif</a></li>
                            <li><a data-edit="fontName Sans" style="font-family:'Sans'">Sans</a></li>
                            <li><a data-edit="fontName Arial" style="font-family:'Arial'">Arial</a></li>
                            <li><a data-edit="fontName Arial Black" style="font-family:'Arial Black'">Arial Black</a></li>
                            <li><a data-edit="fontName Courier" style="font-family:'Courier'">Courier</a></li>
                            <li><a data-edit="fontName Courier New" style="font-family:'Courier New'">Courier New</a></li>
                            <li><a data-edit="fontName Comic Sans MS" style="font-family:'Comic Sans MS'">Comic Sans MS</a></li>
                            <li><a data-edit="fontName Helvetica" style="font-family:'Helvetica'">Helvetica</a></li>
                            <li><a data-edit="fontName Impact" style="font-family:'Impact'">Impact</a></li>
                            <li><a data-edit="fontName Lucida Grande" style="font-family:'Lucida Grande'">Lucida Grande</a></li>
                            <li><a data-edit="fontName Lucida Sans" style="font-family:'Lucida Sans'">Lucida Sans</a></li>
                            <li><a data-edit="fontName Tahoma" style="font-family:'Tahoma'">Tahoma</a></li>
                            <li><a data-edit="fontName Times" style="font-family:'Times'">Times</a></li>
                            <li><a data-edit="fontName Times New Roman" style="font-family:'Times New Roman'">Times New Roman</a></li>
                            <li><a data-edit="fontName Verdana" style="font-family:'Verdana'">Verdana</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Font Size"><span class="glyphicon glyphicon-text-height"></span>&nbsp;<b class="caret"></b></a>
                        <span class="dropdown-arrow dropdown-arrow-inverse"></span>
                        <ul class="dropdown-menu dropdown-inverse">
                            <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                            <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                            <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-primary btn-sm" data-edit="bold" title="" data-original-title="Bold (Ctrl/Cmd+B)"><span class="glyphicon glyphicon-bold"></span></a>
                        <a class="btn btn-primary btn-sm" data-edit="italic" title="" data-original-title="Italic (Ctrl/Cmd+I)"><span class="glyphicon glyphicon-italic"></span></a>
                        <a class="btn btn-primary btn-sm" data-edit="strikethrough" title="" data-original-title="Strikethrough"><span class="glyphicon glyphicon-text-strike"></span></a>
                        <a class="btn btn-primary btn-sm" data-edit="underline" title="" data-original-title="Underline (Ctrl/Cmd+U)"><span class="glyphicon glyphicon-text-underline"></span></a>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-primary btn-sm" data-edit="insertunorderedlist" title="" data-original-title="Bullet list"><span class="glyphicon glyphicon-list"></span></a>
                        <a class="btn btn-primary btn-sm" data-edit="insertorderedlist" title="" data-original-title="Number list"><span class="glyphicon glyphicon-list-ol"></span></a>
                        <a class="btn btn-primary btn-sm" data-edit="outdent" title="" data-original-title="Reduce indent (Shift+Tab)"><span class="glyphicon glyphicon-right-indent"></span></a>
                        <a class="btn btn-primary btn-sm" data-edit="indent" title="" data-original-title="Indent (Tab)"><span class="glyphicon glyphicon-left-indent"></span></a>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-primary btn-info btn-sm" data-edit="justifyleft" title="" data-original-title="Align Left (Ctrl/Cmd+L)"><span class="glyphicon glyphicon-align-left"></span></a>
                        <a class="btn btn-primary btn-sm" data-edit="justifycenter" title="" data-original-title="Center (Ctrl/Cmd+E)"><span class="glyphicon glyphicon-align-center"></span></a>
                        <a class="btn btn-primary btn-sm" data-edit="justifyright" title="" data-original-title="Align Right (Ctrl/Cmd+R)"><span class="glyphicon glyphicon-align-right"></span></a>
                        <a class="btn btn-primary btn-sm" data-edit="justifyfull" title="" data-original-title="Justify (Ctrl/Cmd+J)"><span class="glyphicon glyphicon-justify"></span></a>
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" title="" data-original-title="Hyperlink"><span class="glyphicon glyphicon-link"></span></a>
                        <div class="dropdown-menu">
                            <input class="col-md-2" placeholder="URL" type="text" data-edit="createLink">
                            <button class="btn btn-primary btn-sm" type="button">Add</button>
                        </div>
                        <a class="btn btn-primary btn-sm" data-edit="unlink" title="" data-original-title="Remove Hyperlink"><span class="glyphicon glyphicon-scissors"></span></a>
                    </div>

                    <div class="btn-group">
                        <a class="btn btn-primary btn-sm" title="" id="pictureBtn" data-original-title="Insert picture (or just drag &amp; drop)"><span class="glyphicon glyphicon-picture"></span></a>
                        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" style="opacity: 0; position: absolute; top: 0px; left: 0px; width: 41px; height: 30px;">
                    </div>
                    <div class="btn-group">
                        <a class="btn btn-primary btn-sm" data-edit="undo" title="" data-original-title="Undo (Ctrl/Cmd+Z)"><span class="glyphicon glyphicon-unshare"></span></a>
                        <a class="btn btn-primary btn-sm" data-edit="redo" title="" data-original-title="Redo (Ctrl/Cmd+Y)"><span class="glyphicon glyphicon-share"></span></a>
                    </div>
                </div>
                <div id="editor" class="form-control" style="overflow:scroll;min-height:300px;margin-top:5px;">
                    <?php echo html_entity_decode(set_value('content',$article['content']));?>
                </div>
            </div>
            <div class="form-group text-center">
                <textarea name="content" id="content" style="display:none;"></textarea>
                <input type="hidden" name="id" value="<?php echo $article['id'];?>">
                <input type="submit" value="Submit" name="submit" id="submit" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    require(['bootstrap-wysiwyg','bootstrap-select'],function(){
        $(function(){
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
            window.prettyPrint && prettyPrint();
            $("select").selectpicker({style: 'btn-sm btn-primary', menuStyle: 'dropdown-inverse',size:'auto',dropupAuto: 'false',title:'请选择'});
            $("#article-add-form").submit(function(){
                $("#content").val($("#editor").html());
            });
        });
    });
</script>