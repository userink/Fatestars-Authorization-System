function pass() { //修改密码
	var pass = $("#pass").val();
	var ii = layer.load(2);
	$.ajax({
		type: "POST",
		url: "ajax.php?act=pwd",
		data: {
			pass: pass
		},
		dataType: 'json',
		//		 timeout:10000,
		success: function(data) {
			layer.close(ii);
			if (data.code == 1) {
				layer.msg(data.msg, {
					icon: 1
				});
				setTimeout(function() {
					location.href = "./set.php?mod=pass";
				},
				1000); //延时1秒跳转
			} else {
				layer.msg(data.msg, {
					icon: 2
				});
			}
		},
		error: function(data) {
			layer.close(ii);
			layer.msg('服务器错误');
		}
	});
}

function km() { //后台添加卡密
	var count = $("#count").val();
	var money = $("#money").val();
	var ii = layer.load(2);
	$.ajax({
		type: "POST",
		url: "ajax.php?act=km",
		data: {
			count: count,
			money: money
		},
		dataType: 'json',
		//		 timeout:10000,
		success: function(data) {
			layer.close(ii);
			if (data.code == 1) {
				layer.msg(data.msg, {
					icon: 1
				});
				window.location.reload();
			} else {
				layer.msg(data.msg, {
					icon: 2
				});
			}
		},
		error: function(data) {
			layer.close(ii);
			layer.msg('服务器错误');
		}
	});
}function dels() {
	layer.confirm('你确实要清空已使用卡密吗？', {
		btn: ['确定', '取消'],
		icon: 3
	},
	function() {
		var ii = layer.msg("正在清空数据！", {
			icon: 16
		});
		$.ajax({
			type: 'GET',
			url: 'ajax.php?act=delkm&my=s',
			dataType: 'json',
			success: function(data) {
				layer.msg(data.msg, {
					icon: 1
				});
				window.location.reload();
			}
		});
	},
	function() {});

}
function delrm() {
	layer.confirm('你确实要清空全部卡密吗？', {
		btn: ['确定', '取消'],
		icon: 3
	},
	function() {
		var ii = layer.msg("正在清空数据！", {
			icon: 16,
			time: 0
		});
		$.ajax({
			type: 'GET',
			url: 'ajax.php?act=delkm&my=rm',
			dataType: 'json',
			success: function(data) {
				layer.msg(data.msg, {
					icon: 1
				});
				window.location.reload();
			}
		});
	},
	function() {});
}
function del(id) {
	layer.confirm('你确实要删除这个卡密吗？', {
		btn: ['确定', '取消'],
		icon: 3
	},
	function() {
		var ii = layer.msg("正在清空数据！", {
			icon: 16
		});
		$.ajax({
			type: 'GET',
			url: 'ajax.php?act=delkm&my=del',
			data: {
				id: id
			},
			dataType: 'json',
			success: function(data) {
				layer.msg(data.msg, {
					icon: 1
				});
				window.location.reload();
			}
		});
	},
	function() {});
}

function kmsq() { //卡密授权
	var qq = $("#qq").val();
	var url = $("#url").val();
	var km = $("#km").val();
	var ii = layer.load(2);
	$.ajax({
		type: "POST",
		url: "ajax.php?act=kmsq",
		data: {
			qq: qq,
			url: url,
			km: km
		},
		dataType: 'json',
		//timeout:10000,
		success: function(data) {
			layer.close(ii);
			if (data.code == 1) {
				layer.msg(data.msg, {
					icon: 1
				});
			} else {
				layer.msg(data.msg, {
					icon: 2
				});
			}
		},
		error: function(data) {
			layer.close(ii);
			layer.msg('服务器错误');
		}
	});
}

function submit() { //代理后台修改密码
	var pass = $("#pass").val();
	var ii = layer.load(2);
	$.ajax({
		type: "POST",
		url: "ajax.php?act=pass",
		data: {
			pass: pass
		},
		dataType: 'json',
		//		 timeout:10000,
		success: function(data) {
			layer.close(ii);
			if (data.code == 1) {
				layer.msg(data.msg, {
					icon: 1
				});
				setTimeout(function() {
					location.href = "./User.php";
				},
				1000); //延时1秒跳转
			} else {
				layer.msg(data.msg, {
					icon: 2
				});
			}
		},
		error: function(data) {
			layer.close(ii);
			layer.msg('服务器错误');
		}
	});
}