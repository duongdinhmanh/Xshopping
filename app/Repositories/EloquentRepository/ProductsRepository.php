<?php
namespace App\Repositories\EloquentRepository;

use App\Model\Products;
use App\Repositories\InterfaceRepository\ProductsInterfaceRepository;

/**
 * summary
 */
class ProductsRepository implements ProductsInterfaceRepository {
	protected $products;

	public function __construct(Products $products) {
		$this->products = $products;
	}

	public function all() {

	}

	public function find($id) {
		return $this->products->find($id);
	}

	public function store(array $input) {

	}
	public function update(array $input, $id) {

	}

	public function destroy($id) {

	}

}
