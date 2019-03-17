<?php
$roule = $_GET['id'];
$num = $_GET['num'];
$con = mysqli_connect("localhost:3306", "root", "123456", "pictrebook");
if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
$find = "select cutin from roule where id=" . $roule;
if (!$result = mysqli_query($con, $find)) {
	die('Could not connect:' . mysqli_error($con));
}
$row = mysqli_fetch_array($result);
//$file_dir = "../img/pictreL/";
$file_dir = "../img/picturePNG/";
//下载文件存放目录

if ($num == 0) {
	$file_name = $row['cutin'] . ".png";
	//下载文件名
} else {
	$file_name = $row['cutin'] . "_" . $num . ".png";
}

//检查文件是否存在
if (!file_exists($file_dir . $file_name)) {
	echo "暂无此角色高清立绘，无法下载T^T";
	exit();
} else {
	//以只读和二进制模式打开文件
	$file = fopen($file_dir . $file_name, "rb");

	//告诉浏览器这是一个文件流格式的文件
	Header("Content-type: application/octet-stream");
	//请求范围的度量单位
	Header("Accept-Ranges: bytes");
	//Content-Length是指定包含于请求或响应中数据的字节长度
	Header("Accept-Length: " . filesize($file_dir . $file_name));
	//用来告诉浏览器，文件是可以当做附件被下载，下载后的文件名称为$file_name该变量的值。
	Header("Content-Disposition: attachment; filename=" . $file_name);

	//读取文件内容并直接输出到浏览器
	echo fread($file, filesize($file_dir . $file_name));
	fclose($file);
	exit();
}
mysqli_free_result($result);
mysqli_close($con);
?>