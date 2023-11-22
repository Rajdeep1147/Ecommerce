<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Merchant;
use App\Models\Customer;

class DefaultData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchant = [
            'name'=> 'Test Info',
            'email' => 'test@lawsikho.in',
            'password' => bcrypt(123456),
            'login_at' =>date('Y-m-d H:i:s'),
        ];
        Merchant::create($merchant);
        $customer = [
            'name'=> 'Test Info',
            'email' => 'test@lawsikho.in',
            'password' => bcrypt(123456),
            'login_at' =>date('Y-m-d H:i:s'),
        ];
        Customer::create($customer);

    }
}
