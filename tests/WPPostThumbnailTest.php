<?php

use PHPUnit\Framework\TestCase;
use WaughJ\WPPostThumbnail\WPPostThumbnail;

require_once( 'MockWordPress.php' );

class WPPostThumbnailTest extends TestCase
{
	public function testBasicOperation()
	{
		$thumb = new WPPostThumbnail( 1 );
		$this->assertContains( '<img', $thumb->getHTML() );
	}

	public function testClass()
	{
		$thumb = new WPPostThumbnail( 1, [ 'class' => 'thumb-img' ] );
		$this->assertContains( 'class="thumb-img"', $thumb->getHTML() );
	}
}
