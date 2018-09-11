<?php
// Sau khi tạo -> config->app => Khai báo services mới tạo vào đó
namespace App\Providers;

use App\Shop\CategoryTranslation\Repositories\CategoryTranslationRepository;
use App\Shop\CategoryTranslation\Repositories\Interfaces\CategoryTranslationRepositoryInterface;
use App\Shop\Category\Repositories\CategoryRepository;
use App\Shop\Category\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		//
	}

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind(
			CategoryRepositoryInterface::class,
			CategoryRepository::class
		);
		$this->app->bind(
			CategoryTranslationRepositoryInterface::class,
			CategoryTranslationRepository::class
		);

	}

}
