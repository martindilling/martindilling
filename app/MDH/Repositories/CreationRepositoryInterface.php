<?php namespace MDH\Repositories;

interface CreationRepositoryInterface
{
    public function allPaginated($per_page = 4);
    public function findOr404($id);
    public function create($attributes);
    public function update($id, $attributes);
    public function destroy($id);
    public function getRules();
}
