<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <?php echo validation_errors();?>
    </div>
</div>
<form action="<?php echo site_url('menu/modify');?>" method="post" class="" rule="menu-form">
    <div class="row">
        <div id="menu-one">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="row">
                        <div class="form-group col-md-4 <?php echo form_error('btn[0]')?'has-error':'';?>">
                            <input type="text" name="btn[0]" id="" class="form-control form-tip col-md-10" data-tip="one" data-tip-title="主菜单(*)" value="<?php echo $one['btn'];?>">
                        </div>
                        <div class="form-group col-md-2">
                            <a class="btn btn-primary btn-block add-sub" id="btn-one" data-id="one">添加子菜单</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(is_array($one['sub_menu']) && !empty($one['sub_menu'])):?>
            <?php foreach($one['sub_menu'] as $k=>$sub_menu):?>
            <div id="sub-menu-1<?php echo $k; ?>" class="row sub-menu">
                <div class="col-md-1 col-md-offset-2">
                    <a onclick="delSub(1<?php echo $k; ?>)" class="btn btn-danger btn-block del-sub">删除</a>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="form-group col-md-4 <?php echo empty($sub_menu)?'has-error':''; ?>">
                            <input type="text" class="form-control form-tip" data-tip="one-<?php echo $k; ?>" data-tip-title="子菜单-<?php echo $k+1;?>(*)" id="" name="btn_one[]" value="<?php echo $sub_menu; ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <select name="menu_one_type[]" onchange="changeEventType(1<?php echo $k; ?>)" class="select-block selectpicker" id="menu-select-1<?php echo $k; ?>">
                                <option value="click" <?php echo $one['sub_menu_type'][$k] == 'click'?'selected':''; ?>>Click</option>
                                <option value="view" <?php echo $one['sub_menu_type'][$k] == 'view'?'selected':''; ?>>View</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="menu_one_type_key[]" id="k-1<?php echo $k; ?>" class="form-control form-tip" data-tip="one-key-<?php echo $k; ?>" data-tip-title="Click Key(*)" placeholder="Click Key" value="<?php echo $one['sub_menu_key'][$k]; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <?php endif;?>
        </div>
        <div id="menu-two">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="row">
                        <div class="form-group col-md-4 <?php echo form_error('btn[1]')?'has-error':'';?>">
                            <input type="text" name="btn[1]" id="" class="form-control form-tip col-md-10" data-tip="two" data-tip-title="主菜单(*)" value="<?php echo $two['btn'];?>">
                        </div>
                        <div class="form-group col-md-2">
                            <a class="btn btn-primary btn-block add-sub" id="btn-two" data-id="two">添加子菜单</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(is_array($two['sub_menu']) && !empty($two['sub_menu'])):?>
            <?php foreach($two['sub_menu'] as $k=>$sub_menu):?>
            <div id="sub-menu-1<?php echo $k; ?>" class="row sub-menu">
                <div class="col-md-1 col-md-offset-2">
                    <a onclick="delSub(1<?php echo $k; ?>)" class="btn btn-danger btn-block del-sub">删除</a>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="form-group col-md-4 <?php echo empty($sub_menu)?'has-error':''; ?>">
                            <input type="text" class="form-control form-tip" data-tip="two-<?php echo $k; ?>" data-tip-title="子菜单-<?php echo $k+1;?>(*)" id="" name="btn_two[]" value="<?php echo $sub_menu; ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <select name="menu_two_type[]" onchange="changeEventType(1<?php echo $k; ?>)" class="select-block selectpicker" id="menu-select-1<?php echo $k; ?>">
                                <option value="click" <?php echo $two['sub_menu_type'][$k] == 'click'?'selected':''; ?>>Click</option>
                                <option value="view" <?php echo $two['sub_menu_type'][$k] == 'view'?'selected':''; ?>>View</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="menu_two_type_key[]" id="k-1<?php echo $k; ?>" class="form-control form-tip" data-tip="two-key-<?php echo $k; ?>" data-tip-title="Click Key(*)" placeholder="Click Key" value="<?php echo $two['sub_menu_key'][$k]; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <?php endif;?>
        </div>
        <div id="menu-three">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="row">
                        <div class="form-group col-md-4 <?php echo form_error('btn[2]')?'has-error':'';?>">
                            <input type="text" name="btn[2]" id="" class="form-control form-tip col-md-10" data-tip="three" data-tip-title="主菜单(*)" value="<?php echo $three['btn'];?>">
                        </div>
                        <div class="form-group col-md-2">
                            <a class="btn btn-primary btn-block add-sub" id="btn-three" data-id="three">添加子菜单</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(is_array($three['sub_menu']) && !empty($three['sub_menu'])):?>
            <?php foreach($three['sub_menu'] as $k=>$sub_menu):?>
            <div id="sub-menu-1<?php echo $k; ?>" class="row sub-menu">
                <div class="col-md-1 col-md-offset-2">
                    <a onclick="delSub(1<?php echo $k; ?>)" class="btn btn-danger btn-block del-sub">删除</a>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="form-group col-md-4 <?php echo empty($sub_menu)?'has-error':''; ?>">
                            <input type="text" class="form-control form-tip" data-tip="three-<?php echo $k; ?>" data-tip-title="子菜单-<?php echo $k+1;?>(*)" id="" name="btn_three[]" value="<?php echo $sub_menu; ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <select name="menu_three_type[]" onchange="changeEventType(1<?php echo $k; ?>)" class="select-block selectpicker" id="menu-select-1<?php echo $k; ?>">
                                <option value="click" <?php echo $three['sub_menu_type'][$k] == 'click'?'selected':''; ?>>Click</option>
                                <option value="view" <?php echo $three['sub_menu_type'][$k] == 'view'?'selected':''; ?>>View</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="menu_three_type_key[]" id="k-1<?php echo $k; ?>" class="form-control form-tip" data-tip="three-key-<?php echo $k; ?>" data-tip-title="Click Key(*)" placeholder="Click Key" value="<?php echo $three['sub_menu_key'][$k]; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <?php endif;?>
        </div>
        <div class="form-group text-center">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </div>
</form>
<script type="text/javascript">

    function delSub(e){
        $("#sub-menu-"+e).remove();
    }

    function changeEventType(e){
        if($("#menu-select-"+e).val() == 'view'){
            $("#k-"+e).val('').attr('placeholder','URL');
        }else{
            $("#k-"+e).val('').attr('placeholder','Click Key');
        }
    }
    require(['jquery','bootstrap-select'],function(){
        $(function(){
            $(".selectpicker").selectpicker({style: 'btn-primary', menuStyle: 'dropdown-inverse',size:'auto',dropupAuto: 'false',title:'请选择'});
            $('.add-sub').click(function(){
                var d = $(this).data('id');
                if($("#menu-"+d+" .sub-menu").length >= 5){
                    console.log('Too Many');
                }else{
                    var f = parseInt(Math.random()*100000+1);
                    var s;
                    s  = '<div id="sub-menu-'+f+'" class="row sub-menu">';
                    s += '<div class="col-md-1 col-md-offset-2">';
                    s += '<a onclick="delSub('+f+')" class="btn btn-danger btn-block del-sub">删除</a>';
                    s += '</div>';
                    s += '<div class="col-md-9">';
                    s += '<div class="row">';
                    s += '<div class="form-group col-md-4">';
                    s += '<input type="text" class="form-control form-tip" data-tip="tip-'+f+'" data-tip-title="子菜单-'+(parseInt($("#menu-"+d+" .sub-menu").length)+1)+'(*)"  id="" name="btn_'+d+'[]">';
                    s += '</div>';
                    s += '<div class="form-group col-md-2">';
                    s += '<select name="menu_'+d+'_type[]" onchange="changeEventType('+f+')" class="select-block selectpicker" id="menu-select-'+f+'">';
                    s += '<option value="click">Click</option>';
                    s += '<option value="view">View</option>';
                    s += '</select>';
                    s += '</div>';
                    s += '<div class="form-group col-md-4">';
                    s += '<input type="text" name="menu_'+d+'_type_key[]" id="k-'+f+'" class="form-control form-tip" data-tip="tip-key-'+f+'" data-tip-title="Click Key" placeholder="Click Key">';
                    s += '</div>';
                    s += '</div>';
                    s += '</div>';
                    s += '</div>';
                    $("#menu-"+d).append(s);
                    $('#menu-select-'+f).selectpicker({style: 'btn-primary', menuStyle: 'dropdown-inverse',size:'auto',dropupAuto: 'false',title:'请选择'});
                    $("input.form-tip").bind('input propertychange',function(){
                        var p = $(this).data('tip-title');
                        var v = $(this).val();
                        var tipid = $(this).data('tip')+'-tip';
                        var tip = '<span id="'+tipid+'" class="text-info tip text-center"><strong>'+p+'</srtong></span>';
                        if(v != ''){
                            if($("#"+tipid).length <= 0){
                                $(this).after(tip);
                            }
                            $("#"+tipid).animate({
                                opacity:'show',
                                top:'-8px',
                                left:'25px',
                            },'slow');
                        }else{
                            $("#"+tipid).animate({
                                opacity:'hide',
                                top:'45px',
                                right:'300px',
                            },'slow');
                        }
                    });                    
                }
            });

        });
    });
</script>