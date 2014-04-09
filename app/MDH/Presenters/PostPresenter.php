<?php namespace MDH\Presenters;

use MDH\Services\Presenter\Presenter;
use Michelf\MarkdownExtra;

class PostPresenter extends Presenter {

    public function publishDate()
    {
        return $this->publish_at->toFormattedDateString();
    }

    public function published()
    {
        return $this->publish_at->isPast() ? '' : 'Not published';
    }

    public function publicClass()
    {
        return $this->publish_at->isPast() ? 'public' : 'not-public';
    }

    public function markdownBody()
    {
        $markdownParser = new MarkdownExtra();

        return $markdownParser->defaultTransform($this->body);
    }

}
