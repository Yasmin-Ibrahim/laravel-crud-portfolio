<?php

namespace App\Models;

use App\Models\Skill;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $table = "Clients";
    protected $guarded = [];


    public function skills(){
        return $this->hasMany(Skill::class);
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }
}

