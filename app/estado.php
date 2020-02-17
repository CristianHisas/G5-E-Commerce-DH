<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    public $table = "estados";
    public $primaryKey = "id_estado";
    public $timestamps = false;
    public $guarded = [];
}
