<?php
class Donation extends DataObject {
	static $db = array(
		'OrderID'=> 'Varchar',
		'Amount' => 'Money',
		'Locale' => 'Varchar(7)'
	);
}
