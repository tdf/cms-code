<?php
/**
 * filesize database field
 */
class DBFileSize extends Varchar {
	function __construct($name, $size = 20) {
		parent::__construct($name, $size);
	}
	 /* show the filesize in a human readable format */
	function Nice() {
		return File::format_size($this->value);
	}
}
