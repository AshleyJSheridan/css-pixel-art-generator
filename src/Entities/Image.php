<?php
namespace Entities;

class Image
{
	private $image;

	public function __construct($filename)
	{
		$this->image = imagecreatefromjpeg($filename);
	}
	
	public function get_width()
	{
		return imagesx($this->image);
	}
	
	public function get_height()
	{
		return imagesy($this->image);
	}
	
	public function get_rgb_at($x, $y)
	{
		return imagecolorat($this->image, $x, $y);
	}
}
