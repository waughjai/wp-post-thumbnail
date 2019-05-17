<?php

declare( strict_types = 1 );
namespace WaughJ\WPPostThumbnail;

use WaughJ\WPUploadPicture\WPUploadPicture;

class WPPostThumbnail extends WPUploadPicture
{
	public function __construct( int $post_id, array $attributes = [] )
	{
		$media_id = get_post_thumbnail_id( $post_id );
		if ( empty( $media_id ) )
		{
			throw new WPMissingPostThumbnailException( $post_id );
		}
		parent::__construct( intval( $media_id ), $attributes );
	}
}
