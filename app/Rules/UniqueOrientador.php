<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Orientador;

class UniqueOrientador implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
         // Verifica se o nome de usuário é único
         return !Orientador::where('nome', $value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Erro ao registar, este orientador já foi registado anteriormente.';
    }
}
