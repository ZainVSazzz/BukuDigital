<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bank::query()->insert([
            [
                'name' => 'BCA',
                'account_name' => 'CV. Buku Digital Nusantara',
                'account_number' => '541203195',
                'image' => 'img/bank/bca.png',
            ],
            [
                'name' => 'BNI',
                'account_name' => 'CV. Buku Digital Nusantara',
                'account_number' => '810280128789318',
                'image' => 'img/bank/bni.png',
            ],
            [
                'name' => 'BRI',
                'account_name' => 'CV. Buku Digital Nusantara',
                'account_number' => '60012839817296391',
                'image' => 'img/bank/bri.png',
            ],
            [
                'name' => 'Bank Syariah Indonesia',
                'account_name' => 'CV. Buku Digital Nusantara',
                'account_number' => '701723981648721',
                'image' => 'img/bank/bsi.png',
            ],
            [
                'name' => 'Mandiri',
                'account_name' => 'CV. Buku Digital Nusantara',
                'account_number' => '128937981273',
                'image' => 'img/bank/mandiri.png',
            ],
            [
                'name' => 'Permata',
                'account_name' => 'CV. Buku Digital Nusantara',
                'account_number' => '58792047123',
                'image' => 'img/bank/permata.png',
            ],
        ]);
    }
}
