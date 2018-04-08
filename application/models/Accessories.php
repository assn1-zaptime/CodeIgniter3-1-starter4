<?php
class Accessories extends CSV_Model {
	// constructor
	function __construct()
	{
		parent::__construct('../application/csv/accessories.csv', 'accCode');
	}

}
