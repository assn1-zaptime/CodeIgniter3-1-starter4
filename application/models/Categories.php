<?php
class Categories extends CSV_Model {
	// constructor
	function __construct()
	{
		parent::__construct(APPDIR.'csv/categories.csv', 'catCode');
	}

}
