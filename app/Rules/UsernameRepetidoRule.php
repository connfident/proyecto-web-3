<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Cuenta;

class UsernameRepetidoRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = $value;
        
        $result = Cuenta::where('user',$user)->exists();
        
        if(!$user->isEmpty()){
            $cuenta = $result->first();
            $fail('El nombre de usuario '. $cuenta->user . ' ya está en uso');
        }
    }
}
