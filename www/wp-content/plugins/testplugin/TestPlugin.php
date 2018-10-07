<?php

/*
 Plugin Name: Test Plugin
Plugin URI: http://github.com/rhildred/gitwordpress/
Description: A test
Author: Rich Hildred
Version: 1.0
Author URI: http://syndicateme.net/
*/

class TestPlugin{
	static public function getHello()
	{
		return "Hello World!";
	}
	static public function getGoodBye()
	{
		return "See Ya";
	}
}