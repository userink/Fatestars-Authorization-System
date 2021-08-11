// 使用时，请自行引入jquery.cookie.js
// 读取cookie中的主题设置
var the_logo_bg    = $.cookie('the_logo_bg'),
	the_header_bg  = $.cookie('the_header_bg'),
	the_sidebar_bg = $.cookie('the_sidebar_bg'), // iframe版本如果删除了下面一行，请把这一行的逗号改成分号
	the_site_theme = $.cookie('the_site_theme'); // iframe版本可不需要这行

if (the_logo_bg) $('body').attr('data-logobg', the_logo_bg);
if (the_header_bg) $('body').attr('data-headerbg', the_header_bg);
if (the_sidebar_bg) $('body').attr('data-sidebarbg', the_sidebar_bg);
if (the_site_theme) $('body').attr('data-theme', the_site_theme); // iframe版本可不需要这行
	
// 处理主题配色下拉选中
$(".dropdown-skin :radio").each(function(){
	var $this = $(this),
		radioName = $this.attr('name');
		//console.log(radioName);
	switch (radioName) {
		case 'site_theme':
			$this.val() == the_site_theme && $this.prop("checked", true);
			break;  // iframe版中不需要这个case
		case 'logo_bg':
			$this.val() == the_logo_bg && $this.prop("checked", true);
			break;
		case 'header_bg':
			$this.val() == the_header_bg && $this.prop("checked", true);
			break;
		case 'sidebar_bg':
			$this.val() == the_sidebar_bg && $this.prop("checked", true);
	}
});

// 设置主题配色
setTheme = function(input_name, data_name) {
	$("input[name='"+input_name+"']").click(function(){
		$('body').attr(data_name, $(this).val());
		$.cookie('the_'+input_name, $(this).val());
		if(input_name == 'site_theme'){
			Daen_notify('success','主题切换成功，关闭浏览器后失效<br>绿色主题可能会导致弹窗字体看不见哦');
		}else{
			Daen_notify('success','皮肤块颜色设置成功，关闭浏览器后失效');
		}
		 
	});
}
setTheme('site_theme', 'data-theme'); // iframe版本可不需要这行
setTheme('logo_bg', 'data-logobg');
setTheme('header_bg', 'data-headerbg');
setTheme('sidebar_bg', 'data-sidebarbg');