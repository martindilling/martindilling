<?php namespace MDH\Repositories\Eloquent;

use App;
use Config;
use DateTime;
use MDH\Entities\Creation;
use MDH\Exceptions\PermissionsException;
use MDH\Repositories\CreationRepositoryInterface;

class CreationRepository implements CreationRepositoryInterface
{
    protected $user;

    function __construct()
    {
        $this->user = App::make('UserData')->user;
    }

    public function allPaginated($per_page = 4)
    {
        $per_page = is_numeric($per_page) ? $per_page : 4;

        $query = Creation::orderBy('publish_at', 'desc');
        
        if (!$this->user) {
            $query->where('publish_at', '<=', new DateTime('now'));
        }

        if ($this->user && !$this->user->admin) {
            $query->where('publish_at', '<=', new DateTime('now'))
                ->orWhere(function($query)
                {
                    $query->where('user_id', $this->user->id);
                });
        }

        return $query->paginate($per_page);
    }

    public function findOr404($id)
    {
        $query = Creation::orderBy('publish_at', 'desc');

        $query->where('id', $id);

        if (!$this->user) {
            $query->where('publish_at', '<=', new DateTime('now'));
        }

        if ($this->user && !$this->user->admin) {
            $query->where('publish_at', '<=', new DateTime('now'))
                ->orWhere(function($query) use ($id)
                {
                    $query->where('id', $id)
                          ->where('user_id', $this->user->id);
                });
        }

        return ($query->first() ?: App::abort(404));
    }

    public function create($attributes)
    {
        $attributes['thumb'] = $this->moveThumb($attributes['thumb'], $attributes['slug']);

        $attributes['image'] = $this->moveImage($attributes['image'], $attributes['slug']);

        return $this->user->creations()->create($attributes);
    }

    public function update($id, $attributes)
    {
        $creation = $this->findOr404($id);

        if (isset($attributes['thumb'])) {

            // TODO: Delete old thumb before moving the new

            $attributes['thumb'] = $this->moveThumb($attributes['thumb'], $attributes['slug']);
        } else {
            $attributes['thumb'] = $creation->thumb;
        }

        if (isset($attributes['image'])) {

            // TODO: Delete old image before moving the new

            $attributes['image'] = $this->moveImage($attributes['image'], $attributes['slug']);
        } else {
            $attributes['image'] = $creation->image;
        }

        if (!$this->user && !$this->user->admin && $this->user->id !== $creation->user_id) {
            throw new PermissionsException('Do not have permissions to update');
        }

        $creation->update($attributes);
        return $creation;
    }

    public function destroy($id)
    {
        $creation = $this->findOr404($id);

        if (!$this->user && !$this->user->admin && $this->user->id !== $creation->user_id) {
            throw new PermissionsException('Do not have permissions to delete');
        }

        return $creation->delete();
    }

    public function getRules()
    {
        return Creation::$rules;
    }



    private function getConfigThumbPath()
    {
        $thumbPath  = Config::get('upload.root');
        $thumbPath .= Config::get('upload.creation_images');
        $thumbPath .= Config::get('upload.thumbs');

        return $thumbPath;
    }

    private function getConfigImagePath()
    {
        $imagePath  = Config::get('upload.root');
        $imagePath .= Config::get('upload.creation_images');

        return $imagePath;
    }

    /**
     * @param $image
     * @param $slug
     * @return string
     */
    private function moveImage($image, $slug)
    {
        // Set path and filename for image
        $imagePath     = $this->getConfigImagePath();
        $imageFilename = $slug . '_full.' . $image->getClientOriginalExtension();

        // Move image in place
        $image->move($imagePath, $imageFilename);

        // Return the filename
        return $imageFilename;
    }

    /**
     * @param $thumb
     * @param $slug
     * @return string
     */
    private function moveThumb($thumb, $slug)
    {
        // Set path and filename for thumb
        $thumbPath     = $this->getConfigThumbPath();
        $thumbFilename = $slug . '_thumb.' . $thumb->getClientOriginalExtension();

        // Move thumb in place
        $thumb->move($thumbPath, $thumbFilename);

        // Return the filename
        return $thumbFilename;
    }
}
