<?php
namespace Entities;

class Pixel
{
	public $r;
	public $g;
	public $b;
	public $x;
	public $y;
	
	public function __construct($rgb, $x, $y)
	{
		$this->r = ($rgb >> 16) & 0xFF;
		$this->g = ($rgb >> 8) & 0xFF;
		$this->b = $rgb & 0xFF;
		$this->x = $x;
		$this->y = $y;
	}
}
