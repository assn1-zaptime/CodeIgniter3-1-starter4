<?php
class Accessories extends CSV_Model {
	// constructor
	function __construct()
	{
		parent::__construct(APPDIR . 'csv/accessories.csv', 'accCode');
	}

}
