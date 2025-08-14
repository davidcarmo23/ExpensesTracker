<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    use HasFactory;
    
    protected $table = 'categories';
    protected $primaryKey = "id";
    protected $keyType = 'int';
    public $incrementing = "true";

    protected $attributes = [
        "value" => 0,
        "deleted" => 0,
    ];

    public function getCategories(string $date, int $user_id)
    {

    }
}
