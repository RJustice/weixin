<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $template['title'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo add_theme_css(array('assets/css/bootstrap.min.css','assets/css/flat-ui.css'))?>
    <?php echo add_theme_js('assets/js/require.js'); ?>
    <script type="text/javascript">
        require.config({
            baseUrl:'/<?php echo $this->template->get_theme_path();?>assets/js',
            paths: {
                "jquery": "jquery-1.10.2.min"
                // "checkbox":"flatui-checkbox",
            },
            shim:{
                'affix':['jquery'],
                'alert':['jquery'],
                'button':['jquery'],
                'carousel':['jquery'],
                'collapse':['jquery'],
                'dropdown':['jquery'],
                'modal':['jquery'],
                'popover':['jquery'],
                'scrollspy':['jquery'],
                'tab':['jquery'],
                'tooltip':['jquery'],
                'transition':['jquery'],

                'bootstrap.min':['jquery'],
                'flatui-checkbox':['jquery'],
                'bootstrap-select':['jquery','bootstrap.min'],
                'bootstrap-switch':['jquery','bootstrap.min'],
                'flatui-radio':['jquery'],
                'jquery.tagsinput':['jquery'],
                'jquery.placeholder':['jquery'],
                'jquery.hotkeys':['jquery'],
                'bootstrap-wysiwyg':['jquery','jquery.hotkeys']
            }
        });
    </script>
    <?php echo $template['metadata'];?>
</head>
<body>
    <div class="container">
        <?php if(isset($template['partials']['menu'])){echo $template['partials']['menu'];}?>
        <?php if(!($this->router->class == 'user' && ($this->router->method == 'login' || $this->router->method == 'create'))){?>
        <?php echo $this->template->load_view('common/main_menu');?>
        <?php }?>