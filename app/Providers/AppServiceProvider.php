<?php

namespace App\Providers;

use App\Repositories\EloquentRepository\CategoryRepository;
use App\Repositories\EloquentRepository\ProductsRepository;
use App\Repositories\InterfaceRepository\CategoryInterfaceRepository;
use App\Repositories\InterfaceRepository\ProductsInterfaceRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		Schema::defaultStringLength(191);
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind(CategoryInterfaceRepository::class, CategoryRepository::class);
		$this->app->bind(ProductsInterfaceRepository::class, ProductsRepository::class);
	}
}
