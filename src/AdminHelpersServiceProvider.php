<?php 

namespace Bestuniverse\AdminHelpers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use \Bestuniverse\AdminHelpers\Helpers\HelperList;



class AdminHelpersServiceProvider extends ServiceProvider {


    public function boot()
    {
    	$this->loadViewsFrom(__DIR__.'/resources/helpers', 'adminHelpers');

	    // $this->publishes([
	    //     __DIR__.'/resources/helpers/' => resource_path('views/vendor/admin/helpers'),
	    // ]);
    }


}
