<?php

declare( strict_types = 1 );
namespace WaughJ\WPPostThumbnail;

use WaughJ\WPUploadPicture\WPUploadPicture;

class WPPostThumbnail extends WPUploadPicture
{
	public function __construct( int $post_id, array $img_attributes = [] )
	{
		$media_id = get_post_thumbnail_id( $post_id );
		parent::__construct( $media_id, $img_attributes );
	}
}
