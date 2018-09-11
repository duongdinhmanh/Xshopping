<?php
// sau khi tao function thi can vao file composer.json de cau hinh
function stripUnicode($str) {
	if (!$str) {
		return false;
	}

	$unicode = array(
		'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
		'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		'd' => 'đ',
		'D' => 'Đ',
		'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		'i' => 'í|ì|ỉ|ĩ|ị',
		'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
		'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
		'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		'' => '?|(|)|[|]|{|}|#|%|-|<|>|,|:|;|.|&|–|/',
	);

	foreach ($unicode as $khongdau => $codau) {
		$arr = explode("|", $codau);
		$str = str_replace($arr, $khongdau, $str);
	}
	return $str;
}

function changeTitle($str) {
	$str = trim($str);
	if ($str == "") {
		return "";
	}

	$str = str_replace('"', '', $str);
	$str = str_replace("'", '', $str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8'); // MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
	$str = str_replace(' ', '-', $str);

	return $str;
}

function cate_parent($data, $parent = 0, $str = "==||") {
	foreach ($data as $key => $val) {
		if ($val->parent_id == $parent) {
			echo "<option value='$val->id'>$str $val->name</option>";
			cate_parent($data, $val->id, $str . " ==||");
		}
	}
}

// function cate_parent_datatable($data, $parent = 0, $str = "==||") {
// 	foreach ($data as $key => $val) {
// 		if ($val->parent_id == $parent) {
// 			echo "$str " . $val->name;
// 			cate_parent_datatable($data, $val->id, $str . " ==||");
// 		}
// 	}
// }

function pro_display($data, $str = "--") {
	foreach ($data as $key => $val) {
		echo "<option value='$val->id'>$str $val->name</option>";
	}
}

function change_time_to_text($time, $type = null) {
	if (!is_numeric($time)) {
		$time = strtotime($time);
	}
	if ($type == 'update') {
		$text = 'Cập nhật khoảng ';
	} else {
		$text = '';
	}
	if ((time() - $time) < 60) {
		return $text . round(time() - $time) . ' giây trước';
	} elseif ((time() - $time) < 60 * 60) {
		return $text . round((time() - $time) / 60) . ' phút trước';
	} elseif ((time() - $time) < 60 * 60 * 24) {
		return $text . round(((time() - $time) / 60) / 60) . ' giờ trước';
	} else {
		return date('H:i:s A d/m/Y', $time);
	}
}

function slugTitle($string, $keyReplace = "/") {
	$string = stripUnicode($string);
	$string = trim(preg_replace("/[^A-Za-z0-9]/i", " ", $string)); // khong dau
	$string = str_replace(" ", "-", $string);
	$string = str_replace("--", "-", $string);
	$string = str_replace($keyReplace, "-", $string);
	return strtolower($string);
}

?>﻿
