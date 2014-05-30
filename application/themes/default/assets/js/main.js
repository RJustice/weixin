require.config({
    paths: {
        "jquery": "jquery.min",
        "template":"template"
    },
    shim:{
        'flatui-checkbox':{
            deps:['jquery','flatui-checkbox'],
            exports:"checkbox"
        }
    }
});