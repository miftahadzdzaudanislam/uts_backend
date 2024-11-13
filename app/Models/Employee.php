<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Memanggil tabel employee
    protected $table = 'employees';

    // Tabel apa saja yang bisa diisi
    protected $fillable = [
        'name', 'gender', 'phone', 'address', 'email', 'status', 'hired_on'
    ];
}
