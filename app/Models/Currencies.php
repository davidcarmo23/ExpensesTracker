<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currencies extends Model
{
    //
    use HasFactory;
    protected $table = 'currencies';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = "true";

    public function getCurrencies(string $date, int $user_id)
    {

    }

}
