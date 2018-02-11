<?php
class Categories extends CSV_Model {
	// constructor
	function __construct()
	{
		parent::__construct('csv/categories.csv', 'catCode');
	}
}
