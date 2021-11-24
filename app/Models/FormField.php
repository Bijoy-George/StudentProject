<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class FormField extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getOptions()
	{
		return $this->hasMany(FieldOptions::class, 'field_id', 'id')->where('status',config('constant.ACTIVE'));
	}
}
