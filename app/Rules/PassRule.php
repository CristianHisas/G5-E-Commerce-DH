<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PassRule implements Rule
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
        if(strlen(trim($value)) < 8){
            $ret[] = "al menos ocho caracteres";
        }
        if (!preg_match('`[a-z]`',$value)){
            $ret[] = "al menos una letra minúscula";
         }
         if (!preg_match('`[A-Z]`',$value)){
            $ret[] = "al menos una letra mayúscula";
         }
         if (!preg_match('`[0-9]`',$value)){
            $ret[] = "al menos un caracter numérico";
         }
         return (preg_match('`[a-z]`',$value)) && (preg_match('`[A-Z]`',$value)) && (preg_match('`[0-9]`',$value)) && (strlen(trim($value)) >= 8);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return " El campo :attribute debe tener al menos una letra minúscula,al menos una letra mayúscula,al menos un caracter numérico ";
    }
}
