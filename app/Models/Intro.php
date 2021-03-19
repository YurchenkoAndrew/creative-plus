<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

/**
 * @method static count()
 */
class Intro extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'intros';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['logo', 'lead_in', 'heading', 'btn_text'];
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
//    protected $casts = [
//        'logo' => 'image'
//    ];

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
    public function setLogoAttribute($value)
    {
        $pathToImage = '/images/logo/';
        if ($value == null) {
            Storage::disk('public-images')->delete($this->{'logo'});
            $this->attributes['logo'] = null;
        }
        if (Str::startsWith($value, 'data:image')) {
            $image = Image::make($value)->encode('png');
            $fileName = md5($value . time()) . '.png';
            Storage::disk('public-images')->put($pathToImage . $fileName, $image->stream());
            Storage::disk('public-images')->delete($this->{'logo'});
            $this->attributes['logo'] = $pathToImage . $fileName;
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
