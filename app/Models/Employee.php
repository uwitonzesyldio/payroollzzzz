<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    protected $primaryKey = 'emp_id';

    protected $fillable = [
        'name',
        'salary',
    ];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'emp_id', 'emp_id');
    }

    public function deductions(): HasMany
    {
        return $this->hasMany(Deduction::class, 'emp_id', 'emp_id');
    }

    public function getNetSalaryAttribute()
    {
        $totalDeductions = $this->deductions()->sum('amount');
        return $this->salary - $totalDeductions;
    }
}
