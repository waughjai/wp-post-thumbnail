<?php

declare( strict_types = 1 );
namespace WaughJ\WPPostThumbnail
{
	use WaughJ\WPUploadPicture\WPUploadPicture;

	class WPPostThumbnail
	{
		public function __construct( int $post_id, array $img_attributes = [] )
		{
			$this->id = get_post_thumbnail_id( $post_id );
			$this->img_attributes = $img_attributes;
		}

		public function __toString()
		{
			return $this->getHTML();
		}

		public function getHTML() : string
		{
			return ( $this->id ) ? ( string )( new WPUploadPicture( ( int )( $this->id ), [ 'img-attributes' => $this->img_attributes ] ) ) : '';
		}

		private $id;
		private $img_attributes;
	}
}
