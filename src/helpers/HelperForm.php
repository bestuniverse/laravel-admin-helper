<?php

namespace Bestuniverse\AdminHelpers\Helpers;



class HelperForm extends Helper
{
	public $fields_form = array();
	public $datatable = false;

	public $object;

	public function render()
	{	
		$this->getConfig();

		$vars = array(
			'list'		=>	$this->fields_form,
			'object'	=>	$this->object,
			'title'		=>	$this->title,
			'model'		=>	$this->model,
			'config'	=>	$this->config
		);

		if($this->object)
			return view('admin.helpers.edit')->with($vars);
		else
			return view('admin.helpers.create')->with($vars);
	}


	public function getConfig()
	{
		parent::getConfig();
	}
}