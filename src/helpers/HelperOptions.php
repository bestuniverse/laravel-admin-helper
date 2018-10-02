<?php

namespace Bestuniverse\AdminHelpers\Helpers;


class HelperOptions extends Helper
{
	public $fields_options = array();
	public $datatable = false;

	public $object;

	public function render()
	{	
		$this->getConfig();

		$vars = array(
			'list'		=>	$this->fields_options,
			'object'	=>	$this->object,
			'title'		=>	$this->title,
			'model'		=>	$this->model,
			'config'	=>	$this->config
		);

		return view('adminHelpers::options')->with($vars);
	}


	public function getConfig()
	{
		parent::getConfig();
	}
}