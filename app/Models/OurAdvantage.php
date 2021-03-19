<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class OurAdvantage extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'our_advantages';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setImageAttribute($value)
    {
        $pathToImage = '/images/our-advantages/';
        if ($value == null) {
            Storage::disk('public-images')->delete($this->{'image'});
            $this->attributes['logo'] = null;
        }
        if (Str::startsWith($value, 'data:image')) {
            $image = Image::make($value)->encode('png');
            $fileName = md5($value . time()) . '.png';
            Storage::disk('public-images')->put($pathToImage . $fileName, $image->stream());
            Storage::disk('public-images')->delete($this->{'image'});
            $this->attributes['image'] = $pathToImage . $fileName;
        }
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            Storage::disk('public-images')->delete($obj->logo);
        });
    }
}
