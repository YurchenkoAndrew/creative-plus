<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @property int role
 * @property int user_id
 * @package App\Models
 */
class Role extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['role', 'user_id'];

    public function user()
    {
        $this->hasOne(User::class);
    }
}
