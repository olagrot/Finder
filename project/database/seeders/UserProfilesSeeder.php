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
        /**
         * @var User $seededUser
         */
        $seededUser = DB::table('users')->select(['id'])->where('email', 'tim.doe@gmail.com')->first();
        $seededUserId = $seededUser->id;
        if ($seededUserId) {
            DB::table('user_profiles')->insert([
                'name' => 'Tim',
                'surname' => 'Burton',
                'favourite_number' => 45,
                'favourite_function' => "Euler's function",
                'user_id' => $seededUserId
            ]);
        }
        /**
         * @var User $seededUser
         */
        $seededUser = DB::table('users')->select(['id'])->where('email', 'elonora.doe@gmail.com')->first();
        $seededUserId = $seededUser->id;
        if ($seededUserId) {
            DB::table('user_profiles')->insert([
                'name' => 'Elenora',
                'surname' => 'asd',
                'favourite_number' => 11,
                'favourite_function' => "Riemann's dzeta function",
                'user_id' => $seededUserId
            ]);
        }
        /**
         * @var User $seededUser
         */
        $seededUser = DB::table('users')->select(['id'])->where('email', 'anne.doe@gmail.com')->first();
        $seededUserId = $seededUser->id;
        if ($seededUserId) {
            DB::table('user_profiles')->insert([
                'name' => 'Anne',
                'surname' => 'Mercedes',
                'favourite_number' => 12,
                'favourite_function' => 'birthday',
                'user_id' => $seededUserId
            ]);
        }
    }
}
