<?php namespace MDH\Entities;

use MDH\Services\Presenter\PresentableTrait;

class Post extends \Eloquent {
    use PresentableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Presenter to contain data logic
     * 
     * @var string
     */
    protected $presenter = 'MDH\Presenters\PostPresenter';

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'user_id'      => '',
        'title'        => 'required',
        'slug'         => 'required|unique:posts,slug',
        'summary'      => '',
        'body'         => 'required',
        'publish_at'   => 'date',
    ];
    
    /**
     * Properties allowed for mass-assignment.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'summary', 'body', 'publish_at'];



    /*********************************************
     * Relationships
     *********************************************/

    public function user()
    {
        return $this->belongsTo('MDH\Entities\User');
    }



    /*********************************************
     * Dates to be used as Carbon instances
     *********************************************/

    /**
     * Get the attributes that should be converted to dates.
     *
     * @return array
     */
    public function getDates()
    {
        return ['publish_at', static::CREATED_AT, static::UPDATED_AT];
    }

}
