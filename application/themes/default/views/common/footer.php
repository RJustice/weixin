</div>
<?php if(isset($template['partials']['footer'])){echo $template['partials']['footer'];} ?>
<script>
    require(['jquery'],function($){
        $(function(){
            $("input.form-tip").each(function(){
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
                }
            });

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
                        left:'300px',
                    },'slow');
                }
            });
        });
    });
</script>
</body>
</html>