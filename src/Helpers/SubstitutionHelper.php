<?php
namespace Helpers;

class SubstitutionHelper
{
	public static function substitution_placeholders($content, $substitutions)
	{
		foreach($substitutions as $key => $substitution)
		{
			$content = preg_replace("/\{\{$key\}\}/", $substitution, $content);
		}
		
		return $content;
	}
}
