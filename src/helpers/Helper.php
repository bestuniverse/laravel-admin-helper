<?php

namespace Bestuniverse\AdminHelpers\Helpers;


class Helper 
{
	public $table;
	public $title;
	public $model;
	public $model_prefix = 'App\\';
	public $instance;
	public $data = array();
	public $locale;
	public $config;

	public function getConfig()
	{
	}

	public function setInstance()
	{	
		$className = $this->model_prefix.$this->model;
		$this->instance = new $className;
	}

}
