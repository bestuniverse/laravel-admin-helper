<?php

namespace Bestuniverse\AdminHelpers\Helpers;
use Illuminate\Support\Facades\DB;


class Helper 
{
	public $table;
	public $title;
	public $model;
	public $model_prefix = 'App\\Models\\';
	public $instance;
	public $data = array();
	public $lang;
	public $locale;
	public $config;

	public $view = false;

	public function getConfig()
	{
	}

	public function setConfig($name, $value = false)
	{

		$this->config[$name] = $value;
	}

	public function setInstance()
	{	
		$className = $this->model_prefix.$this->model;
		$this->instance = new $className;
	}

}
