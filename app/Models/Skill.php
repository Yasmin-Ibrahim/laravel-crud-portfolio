<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;
    protected $table = "skills";
    protected $guarded = [];
    protected $casts = [
        'content' => 'array'
    ];
    // convert column content from json to array to easy show in website

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
