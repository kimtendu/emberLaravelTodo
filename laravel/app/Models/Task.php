<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'tasks';

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }

//    /**
//     * @return HasMany
//     */
//    public function shares(): HasMany
//    {
//        return $this->hasMany(Share::class);
//    }
}
