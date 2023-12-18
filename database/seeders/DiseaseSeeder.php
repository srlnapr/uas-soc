<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Disease::create([
            'diseases_code' => 'P00',
            'diseases' => 'Sehat',
            'img' => 'https://unsplash.com/photos/qO-PIF84Vxg',
            'type' => 'Bukan Rabies',
            'description' => 'Anjing kamu tidak terdeteksi rabies, namun kamu
            harus tetap waspada dan berhati hati terkait ancaman rabies'
        ]);
        Disease::create([
            'diseases_code' => 'P01',
            'diseases' => 'Inkubasi',
            'img' => 'https://unsplash.com/photos/EXydBG7Fzes',
            'type' => 'Rabies stadium permulaan ', 
            'description' => 'Periode ini adalah waktu dari paparan virus hingga manifestasi gejala pertama.
             Selama inkubasi, agen patogen penyebab rabies tidak menunjukkan tanda-tanda pada hewan yang 
             terinfeksi, merasa sehat dan tidak menunjukkan gejala penyakit tersebut. Masa inkubasi rabies
              dapat berlangsung hingga enam bulan dalam kasus yang ekstrim, tetapi biasanya memakan waktu
               antara 3 dan 8 minggu.'
        ]);
        Disease::create([
            'diseases_code' => 'P02',
            'diseases' => 'Eksitasi',
            'img' => 'https://unsplash.com/photos/9LkqymZFLrE',
            'type' => 'Rabies ganas',
            'description' => 'Rabies ganas pada anjing adalah bentuk penyakit 
            yang menimbulkan perilaku agresif dan hiperaktif yang mencolok. 
            Anjing yang terinfeksi rabies ganas sering menunjukkan gejala agresi 
            yang tidak terduga, seperti serangan mendadak terhadap orang, hewan, 
            atau objek. Kondisi ini juga dapat disertai dengan hiperaktivitas yang 
            berlebihan dan kegelisahan yang mencolok. Rabies ganas pada anjing bersifat fatal, dan pencegahan yang cepat dan vaksinasi merupakan langkah kunci dalam melawan penyebaran penyakit yang mematikan ini.
            '
        ]);
        Disease::create([
            'diseases_code' => 'P03',
            'diseases' => 'Dumb Rabies',
            'img' => 'https://unsplash.com/photos/TzjMd7i5WQI',
            'type' => 'Rabies Diam',
            'description' => ' Rabies diam pada anjing mencerminkan dampak virus rabies pada 
            sistem saraf pusat, menghasilkan efek yang berbeda dibandingkan dengan bentuk rabies
             ganas. Meskipun kedua bentuk rabies ini sering berakhir fatal, rabies diam pada anjing 
             menampilkan profil gejala yang lebih tenang dan dapat membingungkan, membuat diagnosa dini
              dan tindakan pencegahan menjadi kritis untuk mengatasi penyebaran penyakit ini.'
        ]);
        Disease::create([
            'diseases_code' => 'P04',
            'diseases' => 'Paralisa',
            'img' => 'https://unsplash.com/photos/NE0XGVKTmcA',
            'type' => 'Rabies kelumpuhan',
            'description' => 'merupakan fase terakhir dari virus ini. Dalam hal ini, hewan mengalami kelumpuhan dan kejang di kepala dan leher
             yang bahkan dapat menyebabkan koma, dan kemudian mati karena gagal jantung dan pernapasan. Meskipun dianggap 
            sebagai tahap akhir rabies, sangat umum bagi a
            njing untuk tidak mencapainya, karena mereka mati lebih awal.'
        ]);
    }
}
