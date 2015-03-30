<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hebergement extends Model {

    protected $fillable = ['name', 'description', 'options', 'images'];

	public function getPlageAttribute() {
        return json_decode($this->attributes['plage']);
    }

    public function getOptionsAttribute() {
        return json_decode($this->attributes['options']);
    }

    public function getImagesAttribute() {
        return json_decode($this->attributes['images']);
    }

    public function setPlageAttribute(Array $val) {
        $this->attributes['plage'] = json_encode($val);
    }

    public function setOptionsAttribute(Array $val) {
        $this->attributes['options'] = json_encode(array_filter($val));
    }

    public function setImagesAttribute(Array $val) {
        $this->attributes['images'] = json_encode(array_filter($val));
    }
}
