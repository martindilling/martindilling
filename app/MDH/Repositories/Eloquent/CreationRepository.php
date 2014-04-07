<?php namespace MDH\Repositories\Eloquent;

use MDH\Entities\Creation;
use MDH\Repositories\CreationRepositoryInterface;

class CreationRepository implements CreationRepositoryInterface
{
    public function allPaginated($per_page = 4)
    {
        $per_page = is_numeric($per_page) ? $per_page : 4;

        return Creation::orderBy('publish_at', 'desc')
            ->paginate($per_page);
    }

    public function findOr404($id)
    {
        return (Creation::find($id) ?: App::abort(404));
    }
}
