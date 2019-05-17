<?php

use PHPUnit\Framework\TestCase;
use WaughJ\FileLoader\MissingFileException;
use WaughJ\WPPostThumbnail\WPPostThumbnail;
use WaughJ\WPPostThumbnail\WPMissingPostThumbnailException;

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
		$this->expectException( WPMissingPostThumbnailException::class );
		$thumb = new WPPostThumbnail( 54532 );
	}

	public function testNonexistentImageIDs()
	{
		try
		{
			$thumb = new WPPostThumbnail( 137325 );
		}
		catch ( WPMissingPostThumbnailException $e )
		{
			$this->assertEquals( 137325, $e->getMissingIDs()[ 0 ] );
		}
	}

	public function testMissingImage()
	{
		try
		{
			$thumb = new WPPostThumbnail( 1 );
		}
		catch ( MissingFileException $e )
		{
			$thumb = $e->getFallbackContent();
		}
		$this->assertStringContainsString( ' src="https://www.example.com/wp-content/uploads/2018/12/demo-150x150.png', $thumb->getHTML() );
		$this->assertStringNotContainsString( 'm?=', $thumb->getHTML() );
	}

	public function testVersionless()
	{
		$thumb = new WPPostThumbnail( 2, [ 'class' => 'thumb-img', 'show-version' => false ] );
		$this->assertStringContainsString( 'class="thumb-img"', $thumb->getHTML() );
		$this->assertStringNotContainsString( 'm?=', $thumb->getHTML() );
		$this->assertStringNotContainsString( ' show-version="', $thumb->getHTML() );
	}
}
