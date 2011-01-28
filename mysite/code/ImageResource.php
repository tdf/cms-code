<?php 
class ImageResource extends DataObject {
	static $db = array (
		'Title' => 'Text',
		'Caption' => 'Text'
	);

	static $has_one = array (
		'Attachment' => 'Image', //Needs to be an image
		'ShufflerPage' => 'Page'
	);

	public function getCMSFields_forPopup()
	{
		return new FieldSet(
			new TextField('Title'),
			new TextareaField('Caption'),
			new FileIFrameField('Attachment')
		);
	}
}
