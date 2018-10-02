# laravel-admin-helper
Allow generate list or form(create & edit) with eloquent from Database.

* [Instalation](#instalation)
* [Use](#use)

## Instalation
### Step 1: Install package
Add the package in your composer.json by executing the command.

```
composer require bestuniverse/laravel-admin-helper
```

Next, add the service provider to app/config/app.php

```
BestUniverse\AdminHelpers\AdminHelpersServiceProvider::class,
```

### Step 2: publish resources
```
php artisan vendor:publish
```

## Use
### HelperList
Use declaration
```
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bestuniverse\AdminHelpers\Helpers As AdminHelper;

```
```
class HomeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// init helper list
		$helper = new AdminHelper\HelperList;
				
		// set title for generated list
		$helper->title = trans('Product list');
		// use datatables
		$helper->datatable = false;
		// number of showing item on one page
		$helper->items_per_page = 20;
		// eloquent model
		$helper->model = 'user';
		// allow call to action. ['edit', 'delete','add']
		// $helper->actions = ['edit'];
				
		// for example user model
		// set column list
		$helper->fields_list = array(
			'id' => array(
				'title' => trans('ID'),
				'align' => 'center',
				'width' => 25
			),
			'name' => array(
				'title' => trans('Name'),
				'align' => 'left',
				'width' => 'auto'
			),
			'email' => array(
				'title' => trans('email'),
				'align' => 'left',
				'width' => 'auto'
			),
			'created_at' => array(
				'title' => trans('Data add'),
				'align' => 'left',
				'width' => 'auto'
			)
		);
				
		// call render helperList view
		$data = $helper->render();
				
		return $data;
	}
}

```