<?php

namespace App\Rules;

use App\Tipo_tarjeta;
use Illuminate\Contracts\Validation\Rule;
use Inacho\CreditCard;

class TarjetaCvcRule implements Rule
{
    private $numero;
    private $tipo;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($numero,$tipo)
    {
        $this->numero=$numero;
        $this->tipo=$tipo;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {   $tipo=Tipo_tarjeta::find($this->tipo);
        
        $card = CreditCard::validCreditCard($this->numero);
        if($card["valid"]==1){
            return CreditCard::validCvc($value,strtolower($tipo->tipo));
        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El campo :attribute no correcto';
    }
}
