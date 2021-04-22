<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('orders')->insert([
        	
                'user_id'=>1,
                'vendor_id'=>1,
                'username' => "Tien Nguyen Thi",
                'phone_number' => '039587356',
                'address'=>'101 Le Huu Trac, Phuoc My, Son Tra, Da Nang',
                'order_time'=>'2021-04-24 08:00',
                'quantity_mam'=>12,
                'note' => 'ko'

        ]);
    }
}
