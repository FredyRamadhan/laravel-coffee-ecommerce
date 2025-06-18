<?php

namespace Database\Seeders;

use App\Models\ShippingCost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingCostSeeder extends Seeder
{
    
    public function run(): void
    {
        ShippingCost::truncate();
        $shippingCosts = [
            [
                "kota" => "Kota Yogyakarta",
                "cost" => 5000
            ],
            [
                "kota" => "Kabupaten Bantul",
                "cost" => 5000
            ],
            [
                "kota" => "Kabupaten Gunungkidul",
                "cost" => 5000
            ],
            [
                "kota" => "Kabupaten Kulon Progo",
                "cost" => 5000
            ],
            [
                "kota" => "Kabupaten Sleman",
                "cost" => 5000
            ],
            [
                "kota" => "Kota Magelang",
                "cost" => 5000
            ],
            [
                "kota" => "Kota Pekalongan",
                "cost" => 16000
            ],
            [
                "kota" => "Kota Salatiga",
                "cost" => 5000
            ],
            [
                "kota" => "Kota Semarang",
                "cost" => 12300
            ],
            [
                "kota" => "Kota Surakarta",
                "cost" => 6500
            ],
            [
                "kota" => "Kota Tegal",
                "cost" => 29300
            ],
            [
                "kota" => "Kabupaten Banjarnegara",
                "cost" => 11600
            ],
            [
                "kota" => "Kabupaten Banyumas",
                "cost" => 16500
            ],
            [
                "kota" => "Kabupaten Batang",
                "cost" => 16000
            ],
            [
                "kota" => "Kabupaten Blora",
                "cost" => 16800
            ],
            [
                "kota" => "Kabupaten Boyolali",
                "cost" => 6300
            ],
            [
                "kota" => "Kabupaten Brebes",
                "cost" => 27200
            ],
            [
                "kota" => "Kabupaten Cilacap",
                "cost" => 19600
            ],
            [
                "kota" => "Kabupaten Demak",
                "cost" => 14900
            ],
            [
                "kota" => "Kabupaten Grobogan",
                "cost" => 12000
            ],
            [
                "kota" => "Kabupaten Jepara",
                "cost" => 18000
            ],
            [
                "kota" => "Kabupaten Karanganyar",
                "cost" => 8300
            ],
            [
                "kota" => "Kabupaten Kebumen",
                "cost" => 11800
            ],
            [
                "kota" => "Kabupaten Kendal",
                "cost" => 14500
            ],
            [
                "kota" => "Kabupaten Klaten",
                "cost" => 5000
            ],
            [
                "kota" => "Kabupaten Kudus",
                "cost" => 16000
            ],
            [
                "kota" => "Kabupaten Magelang",
                "cost" => 5000
            ],
            [
                "kota" => "Kabupaten Pati",
                "cost" => 16300
            ],
            [
                "kota" => "Kabupaten Pekalongan",
                "cost" => 17000
            ],
            [
                "kota" => "Kabupaten Pemalang",
                "cost" => 20000
            ],
            [
                "kota" => "Kabupaten Purbalingga",
                "cost" => 14600
            ],
            [
                "kota" => "Kabupaten Purworejo",
                "cost" => 6100
            ],
            [
                "kota" => "Kabupaten Rembang",
                "cost" => 19800
            ],
            [
                "kota" => "Kabupaten Semarang",
                "cost" => 9000
            ],
            [
                "kota" => "Kabupaten Sragen",
                "cost" => 9500
            ],
            [
                "kota" => "Kabupaten Sukoharjo",
                "cost" => 5500
            ],
            [
                "kota" => "Kabupaten Tegal",
                "cost" => 27600
            ],
            [
                "kota" => "Kabupaten Temanggung",
                "cost" => 6500
            ],
            [
                "kota" => "Kabupaten Wonogiri",
                "cost" => 9700
            ],
            [
                "kota" => "Kabupaten Wonosobo",
                "cost" => 9300
            ],
            [
                "kota" => "Kota Batu",
                "cost" => 30000
            ],
            [
                "kota" => "Kota Blitar",
                "cost" => 23000
            ],
            [
                "kota" => "Kota Kediri",
                "cost" => 22000
            ],
            [
                "kota" => "Kota Madiun",
                "cost" => 16700
            ],
            [
                "kota" => "Kota Malang",
                "cost" => 32000
            ],
            [
                "kota" => "Kota Mojokerto",
                "cost" => 26000
            ],
            [
                "kota" => "Kota Pasuruan",
                "cost" => 35500
            ],
            [
                "kota" => "Kota Probolinggo",
                "cost" => 39400
            ],
            [
                "kota" => "Kota Surabaya",
                "cost" => 31300
            ],
            [
                "kota" => "Kabupaten Bangkalan",
                "cost" => 33700
            ],
            [
                "kota" => "Kabupaten Banyuwangi",
                "cost" => 54000
            ],
            [
                "kota" => "Kabupaten Blitar",
                "cost" => 21800
            ],
            [
                "kota" => "Kabupaten Bojonegoro",
                "cost" => 21500
            ],
            [
                "kota" => "Kabupaten Bondowoso",
                "cost" => 47000
            ],
            [
                "kota" => "Kabupaten Gresik",
                "cost" => 31200
            ],
            [
                "kota" => "Kabupaten Jember",
                "cost" => 46000
            ],
            [
                "kota" => "Kabupaten Jombang",
                "cost" => 23700
            ],
            [
                "kota" => "Kabupaten Kediri",
                "cost" => 20400
            ],
            [
                "kota" => "Kabupaten Lamongan",
                "cost" => 28000
            ],
            [
                "kota" => "Kabupaten Lumajang",
                "cost" => 42500
            ],
            [
                "kota" => "Kabupaten Madiun",
                "cost" => 16000
            ],
            [
                "kota" => "Kabupaten Magetan",
                "cost" => 14000
            ],
            [
                "kota" => "Kabupaten Malang",
                "cost" => 31100
            ],
            [
                "kota" => "Kabupaten Mojokerto",
                "cost" => 25000
            ],
            [
                "kota" => "Kabupaten Nganjuk",
                "cost" => 18800
            ],
            [
                "kota" => "Kabupaten Ngawi",
                "cost" => 15000
            ],
            [
                "kota" => "Kabupaten Pacitan",
                "cost" => 13500
            ],
            [
                "kota" => "Kabupaten Pamekasan",
                "cost" => 42000
            ],
            [
                "kota" => "Kabupaten Pasuruan",
                "cost" => 34500
            ],
            [
                "kota" => "Kabupaten Ponorogo",
                "cost" => 13400
            ],
            [
                "kota" => "Kabupaten Probolinggo",
                "cost" => 38500
            ],
            [
                "kota" => "Kabupaten Sampang",
                "cost" => 38000
            ],
            [
                "kota" => "Kabupaten Sidoarjo",
                "cost" => 30000
            ],
            [
                "kota" => "Kabupaten Situbondo",
                "cost" => 50000
            ],
            [
                "kota" => "Kabupaten Sumenep",
                "cost" => 47500
            ],
            [
                "kota" => "Kabupaten Trenggalek",
                "cost" => 18500
            ],
            [
                "kota" => "Kabupaten Tuban",
                "cost" => 25500
            ],
            [
                "kota" => "Kabupaten Tulungagung",
                "cost" => 20000
            ],
            [
                "kota" => "Kabupaten Serang",
                "cost" => 53000
            ],
            [
                "kota" => "Kabupaten Tangerang",
                "cost" => 55000
            ],
            [
                "kota" => "Kabupaten Lebak",
                "cost" => 49000
            ],
            [
                "kota" => "Kabupaten Pandeglang",
                "cost" => 59000
            ],
            [
                "kota" => "Kota Cilegon",
                "cost" => 55000
            ],
            [
                "kota" => "Kota Serang",
                "cost" => 54000
            ],
            [
                "kota" => "Kota Tangerang",
                "cost" => 56000
            ],
            [
                "kota" => "Kota Tangerang Selatan",
                "cost" => 54500
            ],
            [
                "kota" => "Kabupaten Bandung",
                "cost" => 43500
            ],
            [
                "kota" => "Kabupaten Bandung Barat",
                "cost" => 45000
            ],
            [
                "kota" => "Kabupaten Bekasi",
                "cost" => 53000
            ],
            [
                "kota" => "Kabupaten Bogor",
                "cost" => 50000
            ],
            [
                "kota" => "Kabupaten Ciamis",
                "cost" => 31000
            ],
            [
                "kota" => "Kabupaten Cianjur",
                "cost" => 45000
            ],
            [
                "kota" => "Kabupaten Cirebon",
                "cost" => 26000
            ],
            [
                "kota" => "Kabupaten Garut",
                "cost" => 37000
            ],
            [
                "kota" => "Kabupaten Indramayu",
                "cost" => 32000
            ],
            [
                "kota" => "Kabupaten Karawang",
                "cost" => 47500
            ],
            [
                "kota" => "Kabupaten Kuningan",
                "cost" => 26500
            ],
            [
                "kota" => "Kabupaten Majalengka",
                "cost" => 29000
            ],
            [
                "kota" => "Kabupaten Pangandaran",
                "cost" => 30000
            ],
            [
                "kota" => "Kabupaten Purwakarta",
                "cost" => 45000
            ],
            [
                "kota" => "Kabupaten Subang",
                "cost" => 42000
            ],
            [
                "kota" => "Kabupaten Sukabumi",
                "cost" => 51000
            ],
            [
                "kota" => "Kabupaten Sumedang",
                "cost" => 38000
            ],
            [
                "kota" => "Kabupaten Tasikmalaya",
                "cost" => 34000
            ],
            [
                "kota" => "Kota Bandung",
                "cost" => 44000
            ],
            [
                "kota" => "Kota Banjar",
                "cost" => 29500
            ],
            [
                "kota" => "Kota Bekasi",
                "cost" => 54000
            ],
            [
                "kota" => "Kota Bogor",
                "cost" => 51000
            ],
            [
                "kota" => "Kota Cimahi",
                "cost" => 44500
            ],
            [
                "kota" => "Kota Cirebon",
                "cost" => 27000
            ],
            [
                "kota" => "Kota Depok",
                "cost" => 53000
            ],
            [
                "kota" => "Kota Sukabumi",
                "cost" => 52000
            ],
            [
                "kota" => "Kota Tasikmalaya",
                "cost" => 35000
            ],
            [
                "kota" => "Kabupaten Administratif Kepulauan Seribu",
                "cost" => 60000
            ],
            [
                "kota" => "Kota Administratif Jakarta Barat",
                "cost" => 56000
            ],
            [
                "kota" => "Kota Administratif Jakarta Pusat",
                "cost" => 55500
            ],
            [
                "kota" => "Kota Administratif Jakarta Selatan",
                "cost" => 54500
            ],
            [
                "kota" => "Kota Administratif Jakarta Timur",
                "cost" => 54000
            ],
            [
                "kota" => "Kota Administratif Jakarta Utara",
                "cost" => 56500
            ]
        ];

        // Iterate over each shipping cost in the data and create a record
        foreach ($shippingCosts as $shippingCost) {
            ShippingCost::create([
                "kota" => $shippingCost['kota'],
                "cost" => $shippingCost['cost']
            ]);
        }
    }
}
