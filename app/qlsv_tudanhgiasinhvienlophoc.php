<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qlsv_tudanhgiasinhvienlophoc extends Model
{
    protected $table = "qlsv_tudanhgiasinhvienlophocs";
    protected $fillable = ['id', 'id_sinhvienlophoc', ' id_tudanhgia', 'cautraloi1', 'cautraloi2', 'cautraloi3', 'cautraloi4', 'cautraloi5'];
}