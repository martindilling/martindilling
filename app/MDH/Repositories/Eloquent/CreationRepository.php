<?php namespace MDH\Repositories\Eloquent;

use App;
use Config;
use MDH\Entities\Creation;
use MDH\Entities\User;
use MDH\Repositories\CreationRepositoryInterface;

class CreationRepository implements CreationRepositoryInterface
{
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

    public function create(User $user, $attributes)
    {
        $attributes['thumb'] = $this->moveThumb($attributes['thumb'], $attributes['slug']);

        $attributes['image'] = $this->moveImage($attributes['image'], $attributes['slug']);

        return $user->creations()->create($attributes);
    }

    public function update(User $user, $id, $attributes)
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

        $creation = $user->creations()->find($id);
        $creation->update($attributes);
        return $creation;
    }

    public function destroy(User $user, $id)
    {
        $creation = $user->creations()->find($id);
        return $creation->delete();
    }
    
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
}
