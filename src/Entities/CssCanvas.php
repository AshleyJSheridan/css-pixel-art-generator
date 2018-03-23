<?php
namespace Entities;

class CssCanvas
{
	private $html_filename;
	private $box_size;
	public $box_shadows = [];

	public function __construct($image_filename, $box_size)
	{
		$this->html_filename = 'dist/' . basename($image_filename) . '.html';
		$this->box_size = $box_size;
	}
	
	public function get_filename()
	{
		return $this->html_filename;
	}
	
	public function add_box_shadow(\Entities\Pixel $pixel)
	{
		$this->box_shadows[] = $pixel;
	}
	
	public function get_box_size()
	{
		return $this->box_size;
	}
}
