<?php 

namespace Bestuniverse\AdminHelpers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use \Bestuniverse\AdminHelpers\Helpers\HelperList;



class AdminHelpersServiceProvider extends ServiceProvider {


    public function boot()
    {
    	$this->loadViewsFrom(__DIR__.'/resource/helpers/', 'helpers');

	    $this->publishes([
	        __DIR__.'/resource/helpers/' => resource_path('views/vendor/admin.helpers'),
	    ]);
    }


}
