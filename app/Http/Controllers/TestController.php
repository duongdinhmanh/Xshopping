<?php

namespace App\Http\Controllers;
use App\category;

class TestController extends Controller {
	public function index() {
		$category = category::all()->toArray();
		$category = $this->buildTreeArray($category, 0);
		$category = $this->buildTreeString($category);
		$category = $this->getString($category);
		dd($category);
	}
	private function buildTreeArray($array, $parent) {
		$array2 = array();
		foreach ($array as $element) {
			if ($element['parent_id'] == $parent) {
				$child = $this->buildTreeArray($array, $element['id']);
				if (!empty($child)) {
					$element['children'] = $child;
				}
				$array2[] = $element;
			}
		}
		return $array2;
	}
	private function buildTreeString($array, $head = '') {
		foreach ($array as &$element) {
			$element['name'] = $head . $element['name'];
			if (!empty($element['children'])) {
				$element['children'] = $this->buildTreeString($element['children'], $head . '==||');
			}
		}
		return $array;
	}
	private function getStringLoop($array, &$array2) {

	}
	private function getString($array) {
		$array2 = array();
		foreach ($array as $arr) {
			$array2[] = $arr['name'];
			if (empty($arr['children'])) {
				continue;
			}
			foreach ($arr['children'] as $arr2) {
				$array2[] = $arr2['name'];
				if (empty($arr2['children'])) {
					continue;
				}
				foreach ($arr2['children'] as $arr3) {
					$array2[] = $arr3['name'];
				}
			}
		}
		return $array2;
	}
}
