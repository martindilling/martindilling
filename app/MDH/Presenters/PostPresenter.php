<?php namespace MDH\Presenters;

use MDH\Services\Presenter\Presenter;
use Michelf\MarkdownExtra;

class PostPresenter extends Presenter {

    public function publishDate()
    {
        return $this->publish_at->toFormattedDateString();
    }

    public function markdownBody()
    {
        $markdownParser = new MarkdownExtra();

        return $markdownParser->defaultTransform($this->body);
    }

}
