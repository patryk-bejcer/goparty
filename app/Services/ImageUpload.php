<?php
/**
 * Created by PhpStorm.
 * User: Patryk
 * Date: 2018-09-08
 * Time: 16:22
 */

namespace App\Services;

use Image;

/**
 * Class ImageUpload
 * @package App\Services
 */
class ImageUpload {

	/**
	 * @var
	 */
	private $imageName;

	/**
	 * @return mixed
	 */
	public function getImageName() {
		return $this->imageName;
	}

	/**
	 * @param $model
	 * @param $image
	 *
	 * @return bool
	 */
	public function uploadNewImage( $model, $image ) {

		if ( $model == 'club' ) {
			$path = 'clubs';
		} else if ( $model == 'event' ) {
			$path = 'events';
		} else if ( $model == 'user' ) {
			$path = 'users';
		} else {
			$path = 'clubs';
		}

		if ( $image ) {

			$this->imageName = $image->hashName();
			\Image::make( $image )->resize( 800, 700 )->save( public_path( 'uploads/' . $path . '/' ) . $this->imageName );
			\Image::make( $image )->resize( 470, 320 )->save( public_path( 'uploads/' . $path . '/thumbnails/' ) . 'thumb-' . $this->imageName );

			return true;
		}

		return false;

	}

}