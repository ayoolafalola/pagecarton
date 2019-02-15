<?php
/**
 * PageCarton
 *
 * LICENSE
 *
 * @category   PageCarton CMS
 * @package    Application_SocialMedia_Share
 * @copyright  Copyright (c) 2011-2016 PageCarton (http://www.pagecarton.com)
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @version    $Id: Share.php 4.17.2012 11.53 ayoola $
 */

/**
 * @see Ayoola_Dbase_SocialMedia_Abstract_Xml
 */
 
//require_once 'Ayoola/Dbase/SocialMedia/Abstract/Xml.php';


/**
 * @category   PageCarton CMS
 * @package    Application_SocialMedia_Share
 * @copyright  Copyright (c) 2011-2016 PageCarton (http://www.pagecarton.com)
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

class Application_SocialMedia_Share extends Application_SocialMedia_Abstract
{
	
    /**
     * Drives the class
     * 
     * @return boolean
     */
	public function init()
    {
		if( $this->getParameter( 'horizontal-share' ) )
		{		
			Application_Javascript::addCode
			( 
				"
					document.write('<script src=\"//sharebutton.net/plugin/sharebutton.php?type=horizontal&u=' + encodeURIComponent(document.location.href) + '\"></scr' + 'ipt>');
				"
			);
			return false;   
		}
		elseif( $this->getParameter( 'vertical-share' ) )       
		{
			Application_Javascript::addCode 
			( 
				"
					document.write('<script src=\"//sharebutton.net/plugin/sharebutton.php?type=vertical&u=' + encodeURIComponent(document.location.href) + '\"></scr' + 'ipt>');
				"
			);
			return false;
		}
		self::load();
		Application_Javascript::addCode
		( 
			'
			var switchTo5x=true;
			'
		);
		Application_Style::addCode
		( 
			'
/* 			*,  *:before, *:after 
			{
				-webkit-box-sizing: content-box;
				-moz-box-sizing: content-box;
				box-sizing: content-box;
			}			
 */			.stButton_gradient, .stMainServices, .st-facebook-counter
			{
				-webkit-box-sizing: content-box;
				-moz-box-sizing: content-box;
				box-sizing: content-box;
			}			
			'
		);
		Application_Javascript::addFile
		( 
			'http://w.sharethis.com/button/buttons.js'
		);
		Application_Javascript::addCode
		( 
			'
			stLight.options({publisher: "bb8aaa84-2561-42ba-b02b-9455f5912c92", doNotHash: false, doNotCopy: false, hashAddressBar: false});
			'
		);
		$title = $this->getParameter( 'title' );
		$title = $title ? $title . ' - Click to read more on:' : null;
		$text = $title ? 'st_title="' . $title . '"' : null;
		$this->setViewContent( '
								<span class="st_googleplus_hcount" st_url="' . $this->getUrl() . '" ' . $text . ' displayText="Google +"></span>
								<span class="st_facebook_hcount" st_url="' . $this->getUrl() . '" ' . $text . ' displayText="Facebook"></span>
								<span class="st_twitter_hcount" st_url="' . $this->getUrl() . '" ' . $text . ' displayText="Tweet"></span>
								<span class="st_linkedin_hcount" st_url="' . $this->getUrl() . '" ' . $text . ' displayText="LinkedIn"></span>
								<span class="st_pinterest_hcount" st_url="' . $this->getUrl() . '" ' . $text . ' displayText="Pinterest"></span>
								<span class="st_email_hcount" st_url="' . $this->getUrl() . '" ' . $text . ' displayText="Email"></span>
								<span class="st_blogger_hcount" st_url="' . $this->getUrl() . '" ' . $text . ' displayText="Blogger"></span>', 
								true );
    } 
	// END OF CLASS
}
