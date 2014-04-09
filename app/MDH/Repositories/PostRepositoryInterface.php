<?php namespace MDH\Repositories;

interface PostRepositoryInterface
{
    public function allPaginated($per_page = 5);
    public function findOr404($id);
    public function create($attributes);
    public function update($id, $attributes);
    public function destroy($id);
    public function getRules();
}
