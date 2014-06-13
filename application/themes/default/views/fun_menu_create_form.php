<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <form action="<?php echo site_url('fun_menu/create'); ?>" method="post">
            <div class="form-group">
                <input type="text" name="title" id="title" class="form-control form-tip" placeholder="Title(*)" data-tip="title" data-tip-title="标题(*)">
            </div>
            <div class="form-group">
                <input type="text" name="description" id="description" class="form-control form-tip" placeholder="Description" data-tip="description" data-tip-title="文字描述(*)">
            </div>
            <div class="form-group text-center">
                <a class="btn btn-primary">增加功能项</a>
            </div>
            <div id="choose-options">
                <div class="row">
                    <div class="form-group col-md-3">
                        <input type="text" name="option-title" class="form-control form-tip" data-tip="option-title" data-tip-title="Option Title">
                    </div>
                    <div class="form-group col-md-3">
                        <select class="select-block">
                            <option value="1">回复</option>
                            <option value="2">特殊接口</option>
                            <option value="3">活动</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <select class="select-block">
                            <option value="1">回复</option>
                            <option value="2">特殊接口</option>
                            <option value="3">活动</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    require(['bootstrap-select'],function(){
        $(function(){
            $("select").selectpicker({style: 'btn-sm btn-primary', menuStyle: 'dropdown-inverse',size:'auto',dropupAuto: 'false',title:'请选择'});
        });
    });
</script>
