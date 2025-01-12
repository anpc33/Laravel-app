<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserFactory extends Factory
{
  protected $model = User::class;

  public function definition(): array
  {
    // Tạo ngày sinh ngẫu nhiên
    $dateOfBirth = $this->faker->date();

    // Tính tuổi từ ngày sinh
    $age = Carbon::parse($dateOfBirth)->age;

    return [
      'name' => $this->faker->name(),
      'email' => $this->faker->unique()->safeEmail(),
      'email_verified_at' => now(),
      'password' => bcrypt('password'), // mật khẩu mặc định
      'phone' => $this->faker->phoneNumber(),
      'address' => $this->faker->address(),
      'date_of_birth' => $dateOfBirth,
      'status' => 1,
      'avatar' => $this->faker->imageUrl(100, 100, 'people'),
      'gender' => $this->faker->randomElement(['M', 'F', 'O']),
      'remember_token' => Str::random(10),
      'age' => $age,  // Thêm trường age
    ];
  }
}
