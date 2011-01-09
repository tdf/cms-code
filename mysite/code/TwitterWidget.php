<?php
/**
 * Twitter Widget settings
 */
class TwitterWidget extends DataObject {

	protected $version = 2;		

	static $db = array(
		'TwitterType' => "Enum('profile, search', 'profile')",
		'TwitterUser' => 'Varchar(20)',
		'SearchPhrase' => 'Varchar(255)',
		'SearchTitle' => 'Varchar(255)',
		'SearchSubject' => 'Varchar(255)',
		'TweetCount' => 'Int',
		'TweetInterval' => 'Int',
		'SizeHeight' => 'Int',
		'SizeWidth' => 'Int',
		'SizeWidthAuto' => 'Boolean',		
		'ShellBackground' => 'Varchar(7)',
		'ShellColor' => 'Varchar(7)',
		'TweetBackground' => 'Varchar(7)',
		'TweetColor' => 'Varchar(7)',
		'LinkColor' => 'Varchar(7)',
		'FeatureScrollbars' => 'Boolean',
		'FeatureLoop' => 'Boolean',
		'FeatureLive' => 'Boolean',
		'FeatureHashtags' => 'Boolean',
		'FeatureTimestamp' => 'Boolean',
		'FeatureAvatars' => 'Boolean',
		'FeatureBehavior' => "Enum('default, all', 'default')",
	);

	static $defaults = array(
		'TweetCount' => 4,
		'TweetInterval' => 10000,
		'SizeHeight' => 300,
		'SizeWidth' => 250,
		'SizeWidthAuto' => false,
		'ShellBackground' => '#333333',
		'ShellColor' => '#ffffff',
		'TweetBackground' => '#000000',
		'TweetColor' => '#ffffff',
		'LinkColor' => '#4AED05',
		'FeatureScrollbars' => false,
		'FeatureLoop' => false,
		'FeatureLive' => false,
		'FeatureHashtags' => true,
		'FeatureTimestamp' => true,
		'FeatureAvatars' => false,
		'FeatureBehavior' => 'all',
	);

	function getCMSFields_forPopup() {
		$fields = new FieldSet(
			new DropdownField('TwitterType', 'Widget Type',singleton('TwitterWidget')->dbObject('TwitterType')->enumValues()),
			new TextField('TwitterUser', 'Account Name'),
			new DropdownField('TweetCount', 'Number of Tweets', range(1, 20)),
			new NumericField('SizeHeight', 'Height (px)'),
			new NumericField('SizeWidth', 'Width (px)'),
			new CheckboxField('SizeWidthAuto', 'autowidth (ignores width setting)'), 
			new TextField('ShellBackground', 'UI Background Color'),
			new TextField('ShellColor', 'UI Text Color'),
			new TextField('TweetBackground', 'Tweet Background Color'),
			new TextField('TweetColor', 'Tweet Text Color'),
			new TextField('LinkColor', 'Link Color'),
			new CheckboxField('FeatureScrollbars', 'Display Scrollbars'),
			new CheckboxField('FeatureLoop', 'Loop Results'),
			new CheckboxField('FeatureHashtags', 'Display Hashtags'),
			new CheckboxField('FeatureTimestamp', 'Display Timestamp'),
			new CheckboxField('FeatureAvatars', 'Display Avatars')
		);
		return $fields;
	}

	function User() {
		return Convert::raw2js($this->TwitterUser);
	}

	protected function WidgetSetup() {
		return array(
			'version' => $this->version,
			'type' => $this->TwitterType,
			'rpp' => $this->TweetCount,
			'interval' => $this->TweetInterval,
			'width' => ($this->SizeWidthAuto ? 'auto' : $this->SizeWidth),
			'height' => $this->SizeHeight,
			'theme' => array(
				'shell' => array(
					'background' => $this->ShellBackground,
					'color' => $this->ShellColor,
				),
				'tweets' => array(
					'background' => $this->TweetBackground,
					'color' => $this->TweetColor,
					'links' => $this->LinkColor,
				)
			),
			'features' => array(
				'scrollbar' => ($this->FeatureScrollbars ? true : false),
				'loop' => ($this->FeatureLoop ? true : false),
				'live' => ($this->FeatureLive ? true : false),
				'hashtags' => ($this->FeatureHashTags ? true : false),
				'timestamp' => ($this->FeatureTimestamp ? true : false),
				'avatars' => ($this->FeatureAvatars ? true : false),
				'behavior' => $this->FeatureBehavior,
			)
		);
	}

	function WidgetSetupJSON() {
		$settings = $this->WidgetSetup();
		return Convert::array2json($settings);
	}
	
	function forTemplate() {
		$this->Tweets = new DataObjectSet();
		$numberOfTweets = 5;
		$twitterURL = "http://search.twitter.com/search.json?q=from%3Alibreofficenews+OR+from%3Adocufoundation&rpp=" . $numberOfTweets;
		
		if($twitterJSON = file_get_contents($twitterURL)) {
			$twitterJSON = json_decode($twitterJSON);
			
			foreach($twitterJSON->results as $tweet) {
				
				// Cast the Author
				$author = $tweet->from_user;
				$authorURL = "http://www.twitter.com/" . $author;
				
				// Cast the Image URL
				$image = $tweet->profile_image_url;
				
				// Cast the Date
				$date = new Date('r');
				$date->setValue($tweet->created_at);
				
				// Display the date in a nice format - e.g. 2 days ago - sourced from http://stackoverflow.com/questions/18685/how-to-display-12-minutes-ago-etc-in-a-php-webpage/18693#18693
				$secondsSince = strtotime("now") - strtotime($tweet->created_at);
				$chunks = array(
						array(60 * 60 * 24 * 365 , 'year'),
						array(60 * 60 * 24 * 30 , 'month'),
						array(60 * 60 * 24 * 7, 'week'),
						array(60 * 60 * 24 , 'day'),
						array(60 * 60 , 'hour'),
						array(60 , 'minute'),
						array(1 , 'second')
					);

					for ($i = 0, $j = count($chunks); $i < $j; $i++) {
						$seconds = $chunks[$i][0];
						$name = $chunks[$i][1];
						if (($count = floor($secondsSince / $seconds)) != 0) {
							break;
						}
					}

				$timeAgo = ($count == 1) ? '1 '.$name : "$count {$name}s ago";
				
				$dateURL = $authorURL . "/status/" . $tweet->id_str;
				$replyURL = "http://www.twitter.com/?status=@" . $author . "%20&in_reply_to_status_id=" . $tweet->id_str . "&in_reply_to=" . $author;
				
				// Cast the Text
				$text = $tweet->text;
				// Parse links in text and make them clickable - source: http://stackoverflow.com/questions/206059/php-validation-regex-for-url/206087#206087
				$text = preg_replace("#((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie", "'<a href=\"$1\" target=\"_blank\">$3</a>$4'", $text);
				// And now take care of usernames (@user) - source: http://saturnboy.com/2010/02/parsing-twitter-with-regexp/
				$text = preg_replace('/@(\w+)/', '<a href="http://twitter.com/$1">@$1</a>', $text);
				// Finally, take care of hashtags (#tag) - source: http://saturnboy.com/2010/02/parsing-twitter-with-regexp/
				$text = preg_replace( '/\s+#(\w+)/', ' <a href="http://search.twitter.com/search?q=%23$1">#$1</a>', $text);
				
				$this->Tweets->push(new ArrayData(array(
								'Author'	=> $author,
								'AuthorURL'	=> $authorURL,
								'Image'		=> $image,
								'Date'		=> $date,
								'TimeAgo'	=> $timeAgo,
								'DateURL'	=> $dateURL,
								'ReplyURL'	=> $replyURL,
								'Text'		=> $text
								)));
								
			}
			
			return $this->renderWith("TwitterWidget");
		}
		
		return false;
	}	
}
?>
