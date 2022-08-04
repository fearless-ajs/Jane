<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user  = User::where('email', 'admin@jane.com')->first();
        $currency = Currency::first();
        return [
            'user_id'               => $user->id,
            'app_name'              => 'Janemart',
            'app_email'             => 'system@jane.com',
            'app_currency'          =>  $currency->id,
            'app_country'           => 'USA',
            'app_logo'              => 'app-avatar.png',
        ];
    }
}
