<?php


namespace App\Repositories\Interfaces;


interface BaseRepositoryInterface
{

    public function store($request);

    public function update($request, $id);

    public function destroy($id);

}
