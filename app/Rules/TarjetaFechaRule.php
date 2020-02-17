<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Inacho\CreditCard;

class TarjetaFechaRule implements Rule
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
    {   $value=explode("/",$value);
        if(count($value)==2 && $value){
            return CreditCard::validDate($value[1], $value[0]);
        }
            return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El campo :attribute tiene una fecha vencida';
    }
}
