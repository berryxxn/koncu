<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Trainee extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';
    protected $fillable = ['total_score'];
    public $timestamps = false;

    // public function project () {
    //     return $this->hasMany(Project::class);
    // }
    public function task () {
        return $this->belongsToMany (Task::class)->withPivot('score');;
    }
}
