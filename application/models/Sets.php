<?php
class Sets extends CSV_Model {
	// constructor
	function __construct()
	{
		parent::__construct(APPDIR . 'csv/sets.csv', 'setID');
	}
}
