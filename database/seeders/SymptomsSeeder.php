<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SymptomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('symptoms')->insert([
            [
                'name' => 'Bawah daun berwarna keperakan',
                'description' => 'Daun cabai berwarna keperakan di bagian bawahnya bisa menjadi tanda adanya masalah. Penyebabnya beragam, mulai dari serangan hama seperti tungau dan thrips, penyakit seperti busuk daun dan embun tepung, hingga kekurangan nutrisi seperti kalium dan magnesium. Gejala ini dapat berakibat fatal bagi tanaman cabai. Fotosintesis terhambat, pertumbuhan terganggu, dan hasil panen menurun. Kualitas cabai pun bisa menjadi rendah. Untuk mengatasinya, lakukan pengamatan rutin, kenali penyebabnya, dan lakukan tindakan pengendalian yang tepat. Gunakan pestisida secara bijaksana dan konsultasikan dengan ahli pertanian jika diperlukan. Jagalah kebersihan kebun dan berikan pupuk yang sesuai untuk mencegah masalah ini muncul kembali.'
            ],
            [
                'name' => 'Bawah daun berwarna tembaga',
                'description' => 'Daun cabai berwarna tembaga di bagian bawahnya merupakan tanda adanya masalah. Beragam faktor bisa menjadi penyebabnya, seperti serangan hama tungau dan thrips, penyakit busuk daun dan embun tepung, hingga kekurangan nutrisi kalium dan magnesium.

                Gejala ini dapat berakibat fatal bagi tanaman cabai. Fotosintesis terhambat, pertumbuhan terganggu, dan hasil panen menurun. Kualitas cabai pun bisa menjadi rendah.
                
                Untuk mengatasinya, lakukan pengamatan rutin, kenali penyebabnya, dan lakukan tindakan pengendalian yang tepat. Gunakan pestisida secara bijaksana dan konsultasikan dengan ahli pertanian jika diperlukan.
                
                Jagalah kebersihan kebun dan berikan pupuk yang sesuai untuk mencegah masalah ini muncul kembali.'  
            ],
            [
                'name' => 'Daun berkerut',
                'description' => ''  
            ],
            [
                'name' => 'Daun keriting',
                'description' => ''  
            ],
            [
                'name' => 'Daun terpuntir',
                'description' => ''  
            ],
            [
                'name' => 'Daun melengkung ke bawah',
                'description' => ''  
            ],
            [
                'name' => 'Daun melengkung ke atas',
                'description' => ''  
            ],
            [
                'name' => 'Buah ada bintik kecil seperti tusukan',
                'description' => ''  
            ],
            [
                'name' => 'Ditemukan ulat di dalam buah',
                'description' => ''  
            ],
            [
                'name' => 'Daun tersisa jaringan epidermis dan tulang daun saja',
                'description' => ''  
            ],
            [
                'name' => 'Buah busuk basah',
                'description' => ''  
            ],
            [
                'name' => 'Buah busuk kering dan di permukaan terdapat bintik coklat kehitaman',
                'description' => ''  
            ],
            [
                'name' => 'Layu dari bagian bawah tanaman menjalar ke atas',
                'description' => ''  
            ],
            [
                'name' => 'Warna batang dan akar kecoklatan',
                'description' => ''  
            ],
            [
                'name' => 'Layu dari bagian atas tanaman, mendadak layu dan permanen',
                'description' => ''  
            ],
            [
                'name' => 'Terdapat bercak bulat berwarna putih/pucat pada daun',
                'description' => ''  
            ],
            [
                'name' => 'Bercak kecoklatan pada pangkal batang, cabang, atau pucuk tanaman',
                'description' => ''  
            ]
        ]);
    }
}
