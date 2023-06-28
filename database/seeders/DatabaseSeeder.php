<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Neuneu',
            'email' => 'Neuneu@admin.fr',
        ]);
        $options = Option::factory(10)->create();
        Property::factory(6)
            ->hasAttached($options->random(3))
            ->create();
    }
}
