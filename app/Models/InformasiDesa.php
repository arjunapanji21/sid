<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InformasiDesa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penulis(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
