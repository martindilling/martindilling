<?php namespace MDH\Repositories;

interface PostRepositoryInterface
{
    public function allPaginated($per_page = 5);
    public function findOr404($id);
}
