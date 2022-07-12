<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'report_categoty_id', 'report_user_id'];

    public function reportCategory(){
        return $this->belongsTo(ReportCategory::class);
    }

    public function reportUser(){
        return $this->belongsTo(ReportUser::class);
    }
}
