<?php

namespace Bestuniverse\AdminHelpers\Helpers;




class HelperList extends Helper
{
	public $fields_list = array();
	public $datatable = false;
	public $actions = array();
	public $items_per_page = 20;

	public function render()
	{	
		$this->getConfig();
		$this->setInstance();
		$this->getItems();

		$vars = array(
			'list'	=>	$this->fields_list,
			'data'	=>	$this->data,
			'title'	=>	$this->title,
			'model'	=>	$this->model,
			'config'	=>	$this->config,
			'actions'	=>	$this->actions
		);

		return view('vendor.admin-helpers.list')->with($vars);
	}


	public function getItems()
	{
		$this->data = $this->instance::paginate($this->items_per_page);
	}


	public function getConfig()
	{
		$this->config['datatable'] = $this->datatable;

		parent::getConfig();
	}

}
