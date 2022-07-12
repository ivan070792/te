<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportUser extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'middle_name', 'phone'];

    public function report(){
        return $this->hasMany(Report::class);
    }
}
