<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class GenderMemberSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::where('id', '<', 15)->update(['gender' => 'L']);
        Member::where('id', '>=', 15)->update(['gender' => 'P']);
    }
}
