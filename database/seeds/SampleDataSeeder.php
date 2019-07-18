<?php

use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kedah = \App\State::create(['name' => 'Kedah']);
        $alor_setar = $kedah->districts()->create(['name' => 'Alor Setar']);
        $anakbukit = $alor_setar->parliaments()->create(['name' => 'Anak Bukit']);
        $anakbukit->duns()->create(['name' => 'Air Hitam']);

        $penang = \App\State::create(['name' => 'Pulau Pinang']);
        $seberang_perai = $penang->districts()->create(['name' => 'Seberang Perai']);
        $permatang_pauh = $seberang_perai->parliaments()->create(['name' => 'Permatang Pauh']);
        $permatang_pauh->duns()->create(['name' => 'Masjid Batu']);
    }
}
