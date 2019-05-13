<?php

use PHPUnit\Framework\TestCase;
use WaughJ\WPPostThumbnail\WPPostThumbnail;

require_once( 'MockWordPress.php' );

class WPPostThumbnailTest extends TestCase
{
	public function testClass()
	{
		$thumb = new WPPostThumbnail( 2, [ 'class' => 'thumb-img', 'id' => 'thumb2' ] );
		$this->assertStringContainsString( 'class="thumb-img"', $thumb->getHTML() );
		$this->assertStringContainsString( 'id="thumb2"', $thumb->getHTML() );
	}

	public function testNonexistentImage()
	{
		$thumb = new WPPostThumbnail( 1 );
		$this->assertStringContainsString( '', $thumb->getHTML() );
		$thumb2 = new WPPostThumbnail( 12134 );
		$this->assertStringContainsString( '', $thumb2->getHTML() );
	}

	public function testVersionless()
	{
		$thumb = new WPPostThumbnail( 2, [ 'class' => 'thumb-img', 'show-version' => false ] );
		$this->assertStringContainsString( 'class="thumb-img"', $thumb->getHTML() );
		$this->assertStringNotContainsString( 'm?=', $thumb->getHTML() );
		$this->assertStringNotContainsString( ' show-version="', $thumb->getHTML() );
	}
}
