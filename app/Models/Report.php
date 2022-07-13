<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'report_category_id', 'report_user_id', 'hospital_id', 'text'];

    public function reportCategory(){
        return $this->belongsTo(ReportCategory::class);
    }

    public function reportUser(){
        return $this->belongsTo(ReportUser::class);
    }

    public function hospital(){
        return $this->belongsTo(Hospital::class);
    }
}
