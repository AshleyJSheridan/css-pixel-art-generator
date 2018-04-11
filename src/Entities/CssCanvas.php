<?php
namespace Entities;

class CssCanvas
{
	private $box_size;
	public $box_shadows = [];

	public function __construct($box_size)
	{
		$this->box_size = $box_size;
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
