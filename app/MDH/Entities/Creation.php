<?php namespace MDH\Entities;

class Creation extends \Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'creations';

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'user_id'      => '',
        'title'        => 'required',
        'slug'         => 'required',
        'weblink'      => '',
        'image'        => 'required',
        'thumb'        => 'required',
        'body'         => 'required',
        'publish_at'   => 'date',
    ];
    
    /**
     * Properties allowed for mass-assignment.
     *
     * @var array
     */
    protected $fillable = ['title' ,'slug', 'weblink', 'image', 'thumb', 'body', 'publish_at'];



    /*********************************************
     * Relationships
     *********************************************/

    public function user()
    {
        return $this->belongsTo('MDH\Entities\User');
    }



    /**
     * Get the attributes that should be converted to dates.
     *
     * @return array
     */
    public function getDates()
    {
        return ['publish_at', static::CREATED_AT, static::UPDATED_AT];
    }
    
    
    public function getImage()
    {
        return 'uploads/creation/' . $this->image;
    }
    
    public function getThumb()
    {
        return 'uploads/creation/thumbs/' . $this->thumb;
    }
}
