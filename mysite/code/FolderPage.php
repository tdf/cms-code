<?php
/**
 * Defines the FolderPage page type
 * allows the addition of an additional javascript
 */
class FolderPage extends Page {
	// add the field to the database
	static $db = array(
		"Recursive" => "Boolean"
		);
	static $has_one = array(
			'DirToList' => 'Folder'
			);
	// show it to the CMS editor page
	function getCMSFields() {
		$fields = parent::getCMSFields();
		//new field, add above "Content" area
		$fields->addFieldToTab('Root.Content.Main', new TreeDropdownField('DirToListID','Verzeichnis auswählen', 'Folder'), 'Content');
		$fields->addFieldToTab('Root.Content.Main', new CheckboxField("Recursive"), 'Content');

		return $fields;
	}
}

class FolderPage_Controller extends Page_Controller {
	private function recursiveFolderAdd(&$filesref, $folder) {
		if($folder->hasChildFolders()) {
			foreach($folder->ChildFolders() as $subfolder) {
				$subfolder->isFolder=true;
				$filesref->push($subfolder);
				// this is inefficient - there is a function DataObjectSet -> buildNestedUL, look into that instead.
				$this->recursiveFolderAdd($filesref, $subfolder);
			}
		}
		// after the folders, add the files
		foreach($folder->myChildren() as $file) {
			if(!($file instanceof Folder))
			$filesref->push($file);
		}
		$file=$filesref->pop();
		$file->lastItem=true;
		$filesref->push($file);
	}
	public function FolderListing() {
		if (!$this->DirToList() || !$this->DirToList()->myChildren()) {
			return false;
		}
		$files = new DataObjectSet();
		if ($this->Recursive && $this->DirToList()->hasChildFolders()) {
			$this->recursiveFolderAdd($files, $this->DirToList());
		} else {
			foreach($this->DirToList()->myChildren() as $file) {
				$file->eigenesfeld="foobar";
				if(!($file instanceof Folder))
					$files->push($file);
			}
			$files->sort('Name');
		}
		return $files;
	}
}

?>
