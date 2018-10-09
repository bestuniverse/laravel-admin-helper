<?php

namespace Bestuniverse\AdminHelpers\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class HelperList extends Helper
{
	public $fields_list = array();
	public $datatable = false;
	public $actions = array(
		'view'
	);
	public $items_per_page = 20;
	public $links;

	public function render()
	{   
		$this->getConfig();
		$this->setInstance();
		$this->getItems();

		$vars = array(
			'list'  =>  $this->fields_list,
			'data'  =>  $this->data,
			'title' =>  $this->title,
			'model' =>  $this->model,
			'config'    =>  $this->config,
			'actions'   =>  $this->actions,
			'links'	=>	$this->links
		);

		if(!$this->view)
			return view('adminHelpers::list')->with($vars);
		else
			return view($this->view)->with($vars);
	}


	public function getItems()
	{   
	

		// $this->data = $this->instance::join('product_translations as t', 't.product_id', '=', 'products.id')
		//     ->where('locale', 'en')
		//     ->groupBy('products.id')
		//     ->orderBy('t.name', 'desc')
		//     ->with('translations')
		//     ->get();

		// table $this->instance->getTable()
		// if($this->lang) {
		// 	$table = $this->instance->getTable();
		// 	$this->data = DB::table($table)
		// 		->leftJoin($this->model.'_translations', 'product_id', 'products.id')
		// 		->select('*')
		// 		->paginate($this->items_per_page);
		// }


		// ordering
		$orderby = Input::get('orderby', 'id');
		$orderway = Input::get('orderway', 'asc');

		$params = Input::except(array('orderby', 'orderway', 'page'));
		$params = array_filter($params);
		unset($params['orderby']);
		unset($params['orderway']);

		if(!$orderby)
			$orderby = 'id';
		if(!$orderway)
			$orderway = 'asc';

		if(isset($params) && count($params)) {

			$this->data = $this->instance->orderBy($orderby, $orderway)->where($params)->paginate($this->items_per_page);

		} else {

			$this->data = $this->instance->orderBy($orderby, $orderway)->paginate($this->items_per_page);
		}
		   
		
 	   $this->links = $this->data->appends(['orderby' => $orderby, 'orderway' => $orderway])->links();
	}


	public function getConfig()
	{
		$this->config['datatable'] = $this->datatable;

		parent::getConfig();
	}

}
