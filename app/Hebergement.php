<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hebergement extends Model {

    protected $fillable = ['name', 'nbEmplacements', 'options', 'images'];

	public function getPrixAttribute() {
        return json_decode($this->attributes['prix']);
    }

    public function getOuvertureAttribute() {
        return json_decode($this->attributes['ouverture']);
    }

    public function getOptionsAttribute() {
        return json_decode($this->attributes['options']);
    }

    public function getImagesAttribute() {
        return json_decode($this->attributes['images']);
    }

    public function setPrixAttribute(Array $val) {
        $this->attributes['prix'] = json_encode($val);
    }

    public function setOuvertureAttribute(Array $val) {
        $this->attributes['ouverture'] = json_encode($val);
    }

    public function setOptionsAttribute(Array $val) {
        $this->attributes['options'] = json_encode(array_filter($val));
    }

    public function setImagesAttribute(Array $val) {
        $this->attributes['images'] = json_encode(array_filter($val));
    }
}
