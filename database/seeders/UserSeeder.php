<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Fake 10 users
    // Trong DatabaseSeeder hoặc bất kỳ nơi nào bạn sử dụng factory
    User::factory()->count(50)->create();
  }
}
