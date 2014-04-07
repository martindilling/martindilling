<?php namespace MDH\Entities;

class Post extends \Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'user_id'      => '',
        'title'        => 'required',
        'slug'         => 'required',
        'summary'      => '',
        'body'         => 'required',
        'publish_at'   => 'date',
        'unpublish_at' => 'date',
    ];
    
    /**
     * Properties allowed for mass-assignment.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'summary', 'body', 'publish_at', 'unpublish_at'];



    /*********************************************
     * Relationships
     *********************************************/

    public function user()
    {
        return $this->belongsTo('MDH\Entities\User');
    }

}
