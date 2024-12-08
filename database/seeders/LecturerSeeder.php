<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Lecturer;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lecturer::insert([
            [
                'name' => 'Dr. Budi Santoso', 
                'email' => 'budi@ub.ac.id', 
                'phone' => '081234567890',
                'created_at' => Carbon::now(), // Set current date and time
                'updated_at' => Carbon::now(), // Optional: You can set the same for updated_at
            ],
            [
                'name' => 'Dr. Agus Pranoto', 
                'email' => 'agus@ub.ac.id', 
                'phone' => '081234567891',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dr. Nurul Hidayah', 
                'email' => 'nurul@ub.ac.id', 
                'phone' => '081234567892',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dr. Siti Rahmawati', 
                'email' => 'siti@ub.ac.id', 
                'phone' => '081234567893',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dr. Ahmad Zainudin', 
                'email' => 'ahmad@ub.ac.id', 
                'phone' => '081234567894',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dr. Okta Purnawan', 
                'email' => 'okta@ub.ac.id', 
                'phone' => '081234567895',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dr. Rista Putri', 
                'email' => 'rista@ub.ac.id', 
                'phone' => '081234567896',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
