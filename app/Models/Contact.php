<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Client;

class Contact extends Model
{
    use HasFactory;
    protected $table = "contacts";
    protected $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class);
    }

}
