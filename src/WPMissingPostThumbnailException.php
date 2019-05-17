<?php

declare( strict_types = 1 );
namespace WaughJ\WPPostThumbnail;

class WPMissingPostThumbnailException extends \RuntimeException
{
    public function __construct( $post_ids )
    {
        $this->ids = ( is_array( $post_ids ) ) ? $post_ids : [ $post_ids ];
        $id_string = implode( ', ', $this->ids );
        parent::__construct( "Can’t find thumbnail for post #s ({$id_string}). Thumbnails not set for these posts." );
    }

    public function getMissingIDs() : array
    {
        return $this->ids;
    }

    private $ids;
}
