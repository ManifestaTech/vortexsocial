<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Guru;
use Stan;
use Profile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Guru::factory(11)
            ->create()
            ->each(function ($guru) {
                $userId = $guru->user_id;
                Profile::factory()->create(['user_id' => $userId]);
            });
        Stan::factory(11)
            ->create()
            ->each(function ($stan) {
                $userId = $stan->user_id;
                Profile::factory()->create(['user_id' => $userId]);
            });

    }
}
