<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gakko extends Model
{
  protected $fillable = [
      'school_name',
      'school_category',
      'area',
      'area_detail',
      'logo',
      'url',
      'contact',
      'admin_id',
      'facebook',
      'instagram',
      'twitter',
      'line',
  ];
}
