<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Task extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';
    protected $fillable = ['name', 'description', 'project_uuid'];
    public $timestamps = false;

    public function project () {
        return $this->belongsTo (Project::class, 'project_uuid', 'uuid');
    }

    public function trainee () {
        return $this->belongsToMany (Trainee::class);
    }
}
