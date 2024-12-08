<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Lecturer extends Model
// {
//     use HasFactory;

//     protected $table = 'lecturers'; // Nama tabel di database
//     protected $fillable = ['name', 'email', 'phone']; // Kolom yang bisa diisi secara massal
// }


class Lecturer extends Model
{
    use HasFactory;

    protected $table = 'lecturers';

    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    protected $fields = [
        'name',
        'email',
        'phone',
        'created_at',
        'updated_at',
    ];

    static $sortables = [
        'name' => 'Nama',
        'email' => 'Email',
        'phone' => 'Telepon',
        'created_at' => 'Waktu dibuat',
        'updated_at' => 'Waktu diperbarui',
    ];

    static $allowedParams = [
        'limit',
        'q',
        'sortby',
        'order',
    ];

}
