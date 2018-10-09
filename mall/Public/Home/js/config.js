var version = '20140811';
var versionJS = '20150811';

versionJS = versionJS === '' ? version : versionJS;

seajs.config({
  alias: {
    'asyncSlider':'lib/asyncSlider/1.0.0/asyncSlider.js',
    'addFavorite':'lib/addFavorite/1.0.0/addFavorite.js',
    'city':'lib/city/1.0.0/city.js',
    'new-city':'lib/city/1.0.1/new-city.js',
    'counter':'lib/counter/0.0.1/jquery.counter.js',
    //倒计时-功能
    //https://github.com/sophilabs/jquery-counter
    'easing': 'lib/easing/1.3.0/easing.js',
    //效果插件
    //http://gsgd.co.uk/sandbox/jquery/easing/
    'flash': 'lib/flash/1.0.1/jquery.flash.js',
    //插入flash js方法
    //http://jquery.lukelutman.com/plugins/flash/
    'handlebars':'lib/handlebars/1.0.0/handlebars.js',
    //http://www.ghostchina.com/introducing-the-handlebars-js-templating-engine/
    'highcharts':'lib/highcharts/3.0.5/highcharts.js',
    //Highchart画图
    //http://www.hcharts.cn/
    'jquery':'lib/jquery/1.9.1/jquery.js',
    //Jquery版本信息
    'queue':'lib/plupload/1.5.7/jquery.plupload.queue',
    //上传文件
    'simplePagination':'lib/simplePagination/1.5.0/simplePagination.js',
    //翻页效果
    'validate':'lib/validation/1.11.1/jquery.validate.js',
    //表单验证
    'mailSuggest':'lib/mailSuggest/0.0.1/mailSuggest.js',
    //登录  邮箱后缀
    'rsa':'rsa/index.js',

    'base':'arale/base/1.1.1/base.js',
    'class':'arale/class/1.1.0/class.js',
    'events':'arale/events/1.1.0/events',
    'widget':'arale/widget/1.1.1/widget.js',
    'popup':'arale/popup/1.1.2/popup.js',
    'tip':'arale/tip/1.1.4/tip.js',
    'overlay':'arale/overlay/1.1.2/overlay.js',
    'mask':'arale/overlay/1.1.2/mask.js',
    'iframe-shim':'arale/shim/1.0.2/iframe-shim.js',
    'position':'arale/position/1.0.1/position.js',
    'dialog':'arale/dialog/1.3.3/dialog.js',
    'confirmbox':'arale/dialog/1.3.3/confirmbox.js',
    'templatable':'arale/templatable/0.9.1/templatable.js',
    'calendar':'arale/calendar/0.9.0/calendar.js',
    'moment':'arale/moment/2.1.0/moment.js',
    'sticky':'arale/sticky/1.2.1/sticky.js',

    'ui-counter':'lib/counter/0.0.1/jquery.counter-analog.css',
    'ui-poptip':'alice/poptip/1.1.1/poptip.css'
  },
  map: [
     [/^(.*(widgets|components|pages|common|page|rsa|protocol).*\.js)(.*)$/i, '$1?v=' + versionJS]
  ]
});
