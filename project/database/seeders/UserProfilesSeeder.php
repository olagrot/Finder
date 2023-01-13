<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * @var User $seededUser
         */
        $seededUser = DB::table('users')->select(['id'])->where('email', 'john.doe@gmail.com')->first();
        $seededUserId = $seededUser->id;
        if ($seededUserId) {
            DB::table('user_profiles')->insert([
                'name' => 'Jan Paweł',
                'surname' => 'Drugi',
                'favourite_number' => 2137,
                'favourite_function' => 'printf',
                'points' => 2,
                'solved_riddles' => "1,3,",
                'user_id' => $seededUserId
            ]);
        }
    }
}
