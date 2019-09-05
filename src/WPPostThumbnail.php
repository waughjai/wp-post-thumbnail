<?php

declare( strict_types = 1 );
namespace WaughJ\WPPostThumbnail;

use WaughJ\WPUploadPicture\WPUploadPicture;
use WaughJ\WPUploadImage\WPUploadImage;

class WPPostThumbnail
{
	public function __construct( int $post_id, array $attributes = [], ?WPPostThumbnailType $type = null )
	{
		$this->post_id = $post_id;
		$this->media_id = self::generateMediaID( $post_id );
		$this->type = ( $type === null ) ? WPPostThumbnailType::picture() : $type;
		$this->attributes = $attributes;
		$this->image = self::generateImage( $this->media_id, $this->type, $this->attributes = $attributes );
	}

	public function __toString()
	{
		return ( string )( $this->getImage() );
	}

	public function getHTML() : string
	{
		return ( string )( $this );
	}

	public function getImage()
	{
		return $this->image;
	}

	public function getMediaID() : int
	{
		$this->media_id;
	}

	private static function generateMediaID( $post_id ) : int
	{
		$media_id = get_post_thumbnail_id( $post_id );
		if ( empty( $media_id ) )
		{
			throw new WPMissingPostThumbnailException( $post_id );
		}
		return intval( $media_id );
	}

	private static function generateImage( int $media_id, WPPostThumbnailType $type, array $attributes )
	{
		if ( $type->isImage() )
		{
			$size = $attributes[ 'size' ] ?? 'responsive';
			unset( $attributes[ 'size' ] );
			return new WPUploadImage( $media_id, $size, $attributes );
		}
		return new WPUploadPicture( $media_id, $attributes );
	}

	private $post_id;
	private $media_id;
	private $type;
	private $attributes;
	private $image;
}
