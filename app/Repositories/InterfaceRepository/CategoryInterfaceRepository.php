<?php
namespace App\Repositories\InterfaceRepository;

interface CategoryInterfaceRepository {
	public function all();

	public function find($id);

	public function store(array $input);

	public function update(array $input, $id);

	public function destroy($id);
}
