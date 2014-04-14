<?php namespace MDH\Events\Observers;

use Cache;
use Clockwork;

class PostsObserver {

    public function saved($event)
    {
        $this->cacheClearShow($event->id);
        $this->cacheClearAll();
    }

    public function deleted($event)
    {
        $this->cacheClearShow($event->id);
        $this->cacheClearAll();
    }

    protected function cacheClearAll()
    {
        Cache::tags('posts.all')->flush();
        Clockwork::info('Cache flush tag: "posts.all"');
    }

    protected function cacheClearShow($id)
    {
        Cache::tags('posts.show.'.$id)->flush();
        Clockwork::info('Cache flush tag: "posts.show.'.$id.'"');
    }

}
