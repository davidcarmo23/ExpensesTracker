<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expenses extends Model
{
    use HasFactory;
    //
    protected $table = 'expenses';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = "true";

    //retrieval of expenses to populate a graph based on value and date
    public function getExpenses(string $date, int $user_id){

        //only apply the date and user_id to the query if not empty
        if(!empty($request->date)){
            $date = $date;
        }

        if(!empty($request->user_id)){
            $user_id = $user_id;
        } 

        return Expenses::where('date', $date)->where('user_id', $user_id)->get();
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function currency(){
        return $this->hasOne(Currencies::class, 'id', 'currency_id');
    }
}
