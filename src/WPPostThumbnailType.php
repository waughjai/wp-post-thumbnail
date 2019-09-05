<?php

declare( strict_types = 1 );
namespace WaughJ\WPPostThumbnail;

class WPPostThumbnailType
{
	public static function picture() : WPPostThumbnailType
	{
		return new WPPostThumbnailType( 'picture' );
	}

	public static function image() : WPPostThumbnailType
	{
		return new WPPostThumbnailType( 'image' );
	}

	public function isImage() : bool
	{
		return $this->type === 'image';
	}

	public function isPicture() : bool
	{
		return $this->type === 'picture';
	}

	private function __construct( string $type )
	{
		$this->type = $type;
	}

	private $type;
}
