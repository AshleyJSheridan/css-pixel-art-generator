<?php
namespace CssPixelArt;

class CssPixelArt
{
	private $image_block_size;
	private $css_block_size;
	private $source_filename;
	private $canvas;
	private $writer;
	private $image;

	public function __construct($image_block_size, $css_block_size, $source_filename)
	{
		$this->image_block_size = $image_block_size;
		$this->css_block_size = $css_block_size;
		$this->source_filename = $source_filename;
		$this->canvas = new \Entities\CssCanvas($this->css_block_size);
		$this->writer = new \Helpers\ArtWriterHelper($this->canvas);
		$this->image = new \Entities\Image($this->source_filename);
	}
	
	public function write_html_file($output_filename)
	{
		$this->create_shadows();
		
		$this->writer->write_html_file($output_filename);
	}
	
	public function output_css()
	{
		$this->create_shadows();
		
		$this->writer->output_css();
	}
	
	private function create_shadows()
	{
		list($width, $height) = [$this->image->get_width(), $this->image->get_height()];
		
		for($x = 0; $x < $width / $this->image_block_size; $x ++)
		{
			for($y = 0; $y < $height / $this->image_block_size; $y ++)
			{
				$rgb = $this->image->get_rgb_at($x * $this->image_block_size, $y * $this->image_block_size);
				$pixel = new \Entities\Pixel($rgb, $x, $y);

				$this->canvas->add_box_shadow($pixel);
			}
		}
	}

}
