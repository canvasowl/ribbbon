<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Request;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        $router->filter('auth', function()
        {
        	if (Auth::guest())
        	{
        		if (Request::ajax())
        		{
        			return Response::make('Unauthorized', 401);
        		}
        		else
        		{
        			return Redirect::guest('/');
        		}
        	}
        });

        $router->filter('auth.basic', function()
        {
        	return Auth::basic();
        });

        $router->filter('guest', function()
        {
        	if (Auth::check()) return Redirect::to('/');
        });

        $router->filter('admin', function()
        {
        	if (Auth::check())
        	{
        		if (Auth::user()->email != "ceesco53@gmail.com")
        		{
        			return Redirect::to('/');
        		}
        	}else{
        		return Redirect::to('/');
        	}
        });

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
