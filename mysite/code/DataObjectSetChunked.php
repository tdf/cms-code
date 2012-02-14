<?php
/**
 * Usage: Object::add_extension('DataObjectSet', 'DataObjectSetChunked');
 */
class DataObjectSetChunked extends Extension {
	public function Chunked($chunkCount, $childControl = "Children") {
		$result = new DataObjectSet();
		$chunkSize = (int)ceil($this->owner->Count()/$chunkCount);
		for ($i = 0, $pos = 0; $i < $chunkCount; $i++, $pos += $chunkSize) {
			$result->push(new ArrayData(array(
				$childControl => $this->owner->getRange($pos, $chunkSize),
			)));
		}
		return $result;
	}	
}
