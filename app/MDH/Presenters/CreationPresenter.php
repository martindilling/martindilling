<?php namespace MDH\Presenters;

use Config;
use MDH\Services\Presenter\Presenter;
use Michelf\MarkdownExtra;

class CreationPresenter extends Presenter {

    public function publishDate()
    {
        return $this->publish_at->toFormattedDateString();
    }

    public function imageUrl()
    {
        $path  = Config::get('upload.root');
        $path .= Config::get('upload.creation_images');

        return $path . $this->image;
    }

    public function thumbUrl()
    {
        $path  = Config::get('upload.root');
        $path .= Config::get('upload.creation_images');
        $path .= Config::get('upload.thumbs');

        return $path . $this->thumb;
    }

    public function markdownBody()
    {
        $markdownParser = new MarkdownExtra();

        return $markdownParser->defaultTransform($this->body);
    }

}
