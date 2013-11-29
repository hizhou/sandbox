<?php
function a() {
	function b() {
		echo 'b';
	}
	function c() {
		echo b() . 'c';
	}
	c();
}
a();