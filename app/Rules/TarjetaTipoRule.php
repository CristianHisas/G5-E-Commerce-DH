<?php

namespace App\Rules;

use App\Tipo_tarjeta;
use Illuminate\Contracts\Validation\Rule;
use Inacho\CreditCard;

class TarjetaTipoRule implements Rule
{
    private $numero;
  
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($numero)
    {
        $this->numero=$numero;
       
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {   $tipo=Tipo_tarjeta::find($value);
        
        $card = CreditCard::validCreditCard($this->numero);
        if($card["valid"]==1){
            return($card["type"]==strtolower($tipo->tipo));
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
