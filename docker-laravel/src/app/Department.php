<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  /**
  * リレーション (従属)
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
  public function admin() // 単数形
   {
       return $this->belongsTo('App\Admin');
   }
  protected $fillable = [
      'department_gakubu',
      'department_gakka',
      'department_title',
      'department_cover',
      'department_intro',
      'department_text',
      'department_ob',
      'admin_id',
  ];
}
