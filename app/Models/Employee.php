<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['id','code','first_name', 'last_name', 'birth_date', 'department_id'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->code = 'EMP-' . str_pad(Employee::count() + 1, 4, '0', STR_PAD_LEFT);
        });
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
