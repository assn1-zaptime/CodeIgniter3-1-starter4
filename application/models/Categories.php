<?php
class Categories extends CSV_Model {
	// constructor
	function __construct()
	{
		parent::__construct('../application/csv/categories.csv', 'catCode');
	}

}
