<?php

namespace App\Models;

use App\Models\About;
use App\Models\Skill;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $table = "clients";
    protected $guarded = [];


    public function skills(){
        return $this->hasMany(Skill::class);
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function about(){
        return $this->hasOne(About::class)->latestOfMany();
    }

    public function contact(){
        return $this->hasOne(Contact::class)->latestOfMany();
    }
}

