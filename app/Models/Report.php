<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'report_categoty_id', 'report_user_id'];

    public function ReportCtategory(){
        return $this->belongsTo(ReportCtategory::class);
    }

    public function ReportUser(){
        return $this->belongsTo(ReportUser::class);
    }
}
