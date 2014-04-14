<?php namespace MDH\Entities;

use MDH\Events\Observers\CreationsObserver;
use MDH\Services\Presenter\PresentableTrait;

class Creation extends \Eloquent {
    use PresentableTrait;

    public static function boot()
    {
        parent::boot();

        self::observe(new CreationsObserver);
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'creations';

    /**
     * Presenter to contain data logic
     *
     * @var string
     */
    protected $presenter = 'MDH\Presenters\CreationPresenter';

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'user_id'      => '',
        'title'        => 'required',
        'slug'         => 'required|unique:creations,slug',
        'weblink'      => '',
        'image'        => 'required|image',
        'thumb'        => 'required|image',
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
