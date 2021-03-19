<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

/**
 * @method static count()
 */
class PortfolioItem extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'portfolio_items';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['portfolio_block_id', 'name', 'image', 'sort'];
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

    public function portfolioBlock(): BelongsTo
    {
        return $this->belongsTo(PortfolioBlock::class);
    }

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
        $pathToImage = '/images/portfolio/';
        if ($value == null) {
            Storage::disk('public-images')->delete($this->{'image'});
            $this->attributes['logo'] = null;
        }
        if (Str::startsWith($value, 'data:image')) {
            $image = Image::make($value)->encode('jpg', 90);
            $fileName = md5($value . time()) . '.jpg';
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
