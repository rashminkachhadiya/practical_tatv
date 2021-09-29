<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * 
 */
class RepositoryServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->registerBlogRepo();
	}

	public function registerBlogRepo()
	{
		return $this->app->bind('App\Repositories\Interfaces\BlogRepositoryInterfaces', 'App\Repositories\BlogRepository');
	} 
}