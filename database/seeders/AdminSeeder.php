<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::create([
      'name' => 'Admin User',
      'email' => 'admin@example.com',
      'password' => bcrypt('admin123'), // Mật khẩu admin
      'phone' => '123456789',
      'address' => 'Admin Address',
      'date_of_birth' => '2000-01-01',
      'status' => 1,
      'avatar' => null,
      'gender' => 'M',
    ]);
  }
}
