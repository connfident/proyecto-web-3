<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cuenta extends Authenticable
{
    use HasFactory;
        protected $table = 'cuentas';
        protected $primaryKey = 'user';
        protected $keyType = 'string';
        public $incrementing = false;

        public function perfil():BelongsTo
        {
            return $this->belongsTo(Perfil::class,'perfil_id');
        }

        public function imagen():HasMany
        {
            return $this->hasMany(Imagen::class)->orderByDesc('created_at');
        }
}
