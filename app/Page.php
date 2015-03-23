<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Page extends Model implements SluggableInterface {
    use SluggableTrait;

    protected $fillable = ['content', 'title'];

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );
}

