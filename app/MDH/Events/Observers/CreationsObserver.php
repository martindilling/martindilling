<?php namespace MDH\Events\Observers;

use Cache;
use Clockwork;

class CreationsObserver {

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
        Cache::tags('creations.all')->flush();
        Clockwork::info('Cache flush tag: "creations.all"');
    }

    protected function cacheClearShow($id)
    {
        Cache::tags('creations.show.'.$id)->flush();
        Clockwork::info('Cache flush tag: "creations.show.'.$id.'"');
    }
}
