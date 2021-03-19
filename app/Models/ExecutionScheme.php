<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ExecutionScheme extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'execution_schemes';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
     protected $fillable = ['name', 'image', 'sort'];
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
    public function setImageAttribute($value): void
    {
        $pathToImage = '/images/execution-schemes/';
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
        static::deleting(function ($obj) {
            Storage::disk('public-images')->delete($obj->logo);
        });
    }
}
