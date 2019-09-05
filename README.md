WP Post Thumbnail
=========================

Simple class for getting WordPress thumbnail.

## How to Use

Create a WPPostThumbnail instance by passing the constructor a post ID. Then, call that instance's getHTML method to generate its responsive picture HTML.

Pass an array of attributes as the constructor's 2nd argument to customize the HTML.

By default, this generates a picture tag with responsive images. To generate a regular image instead, pass WPPostThumbnailType::image() to the 3rd argument. To set the size o’ that image, add a "size" attribute to the 2nd argument with the name o’ the WordPress media size ( "thumbnail", "medium", "medium_large", "large", etc. )

## Error Handling

If the post for the given ID doesn’t have a thumbnail, it’ll throw a WPMissingPostThumbnailException exception.

## Changelog

### 0.5.0
* Make usable with both WPUploadPicture & WPUploadImage.

### 0.4.0
* Implement WPUploadImage's WPMissingMediaException error handling

### 0.3.0
* Add Ability to Easily Cancel Showing Versioning

### 0.2.0
* Turn On Thumbnail Support in WordPress

### 0.1.0
* Initial release
