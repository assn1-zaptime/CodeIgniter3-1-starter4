<?php
class Sets extends CSV_Model {
	// constructor
	function __construct()
	{
		parent::__construct('../application/csv/sets.csv', 'setID');
	}
}
