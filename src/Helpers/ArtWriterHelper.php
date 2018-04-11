<?php
namespace Helpers;

class ArtWriterHelper
{
	private $canvas;
	private $filename;
	private $html = <<<CANVAS_HTML
<!DOCTYPE html>
<html>
<head>
<style>
.art {
	background-color: {{first_pixel_background}};
	display: block;
	height: {{css_block_size}}px;
	width: {{css_block_size}}px;
	box-shadow: {{box-shadows}};
}
</style>
</head>
<body>
<div class="art"></div>
</body>
</html>
CANVAS_HTML;
	private $css = <<<CANVAS_CSS
.art {
	background-color: {{first_pixel_background}};
	display: block;
	height: {{css_block_size}}px;
	width: {{css_block_size}}px;
	box-shadow: {{box-shadows}};
}
CANVAS_CSS;
	
	public function __construct(\Entities\CssCanvas $canvas)
	{
		$this->canvas = $canvas;
	}
	
	public function output_css()
	{
		$css = $this->get_substituted_css();
		
		echo $css;
	}
	
	public function write_html_file($filename)
	{
		$html = $this->get_substituted_html();
	
		$fh = fopen($filename, 'w');
		fwrite($fh, $html);
		fclose($fh);
	}
	
	private function get_substituted_css()
	{
		return $this->get_substituted_content($this->css);
	}
	
	private function get_substituted_html()
	{
		return $this->get_substituted_content($this->html);
	}
	
	private function get_substituted_content($content)
	{
		$substitutions = [
			'first_pixel_background' => $this->get_rgb_string_from_pixel($this->canvas->box_shadows[0]),
			'css_block_size' => $this->canvas->get_box_size(),
			'box-shadows' => $this->get_all_box_shadows(),
		];
		
		$substituted_content = \Helpers\SubstitutionHelper::substitution_placeholders($content, $substitutions);
		
		return $substituted_content;
	}
	
	private function get_rgb_string_from_pixel(\Entities\Pixel $pixel)
	{
		return "rgb({$pixel->r}, {$pixel->g}, {$pixel->b})";
	}
	
	private function get_all_box_shadows()
	{
		$box_shadows = [];
		
		foreach($this->canvas->box_shadows as $pixel)
		{
			$box_shadows[] = ($this->canvas->get_box_size() * $pixel->x) . 'px ' . ($this->canvas->get_box_size() * $pixel->y) . "px 0 rgb($pixel->r, $pixel->g, $pixel->b)";
		}
		
		return implode(', ', $box_shadows);
	}
}
