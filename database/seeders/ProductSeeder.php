<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();
        $products = [
            [
              "name" => "Arabica Merapi",
              "description" => "Kopi Arabica dari lereng Gunung Merapi, dikenal dengan aroma floral dan keasaman yang seimbang.",
              "price" => 160000,
              "stock" => 50
            ],
            [
              "name" => "Robusta Merapi",
              "description" => "Kopi Robusta dari Merapi yang menawarkan rasa kuat, dan sentuhan nutty, cocok untuk espresso.",
              "price" => 90000,
              "stock" => 50
            ],
            [
              "name" => "Arabica Menoreh",
              "description" => "Kopi Arabica dari Pegunungan Menoreh, Yogyakarta, dengan karakteristik rasa yang bersih dan sedikit rempah.",
              "price" => 160000,
              "stock" => 50
            ],
            [
              "name" => "Robusta Menoreh",
              "description" => "Robusta dari Menoreh yang memiliki body tebal dan rasa cokelat yang kuat, sering digunakan sebagai campuran.",
              "price" => 90000,
              "stock" => 50
            ],
            [
              "name" => "Arabica Temanggung",
              "description" => "Kopi Arabica dari Temanggung, Jawa Tengah, dengan ciri khas aroma tembakau yang unik.",
              "price" => 160000,
              "stock" => 50
            ],
            [
              "name" => "Robusta Temanggung",
              "description" => "Robusta Temanggung dikenal dengan kekuatan rasa dan aroma tembakau yang khas.",
              "price" => 90000,
              "stock" => 50
            ],
            [
              "name" => "Robusta Banaran",
              "description" => "Robusta Banaran menawarkan rasa yang solid dan tekstur yang kuat, seringkali dengan sentuhan cokelat.",
              "price" => 90000,
              "stock" => 50
            ],
            [
              "name" => "Arabica Gayo",
              "description" => "Kopi Arabica dari dataran tinggi Gayo, Aceh, sangat terkenal dengan body tebal, keasaman rendah, dan sentuhan rempah.",
              "price" => 200000,
              "stock" => 50
            ],
            [
              "name" => "Robusta Gayo",
              "description" => "Robusta dari Gayo yang memiliki tekstur kuat, aroma intens, dan rasa cokelat yang dominan, cocok untuk campuran.",
              "price" => 110000,
              "stock" => 50
            ],
            [
              "name" => "Arabica Sidikalang",
              "description" => "Kopi Arabica dari Sidikalang, Sumatera Utara, dikenal dengan body yang kuat, keasaman tinggi, dan rasa earthy yang khas.",
              "price" => 200000,
              "stock" => 50
            ],
            [
              "name" => "Arabica Mandailing",
              "description" => "Kopi Arabica dari Mandailing, Sumatera Utara, terkenal dengan body penuh, keasaman rendah, dan rasa rempah yang kompleks.",
              "price" => 200000,
              "stock" => 50
            ],
            [
              "name" => "Robusta Kerinci",
              "description" => "Robusta dari Kerinci yang kuat dan berani, dengan body yang penuh dan rasa cokelat yang khas.",
              "price" => 100000,
              "stock" => 50
            ],
            [
              "name" => "Robusta Lampung",
              "description" => "Kopi Robusta paling terkenal dari Lampung, dengan body tebal, rasa pahit yang kuat, dan aroma cokelat.",
              "price" => 90000,
              "stock" => 50
            ],
            [
              "name" => "Arabica Preanger",
              "description" => "Kopi Arabica dari Priangan, Jawa Barat, dikenal dengan keasaman yang cerah, aroma manis, dan tekstur sedang.",
              "price" => 190000,
              "stock" => 50
            ],
            [
              "name" => "Arabica Gunung Halu",
              "description" => "Kopi Arabica dari Gunung Halu, Jawa Barat, dengan keasaman yang seimbang, aroma floral, dan rasa manis yang lembut.",
              "price" => 190000,
              "stock" => 50
            ],
            [
              "name" => "Arabica Garut Siliwangi",
              "description" => "Kopi Arabica dari Garut, Jawa Barat, seringkali dengan karakteristik rasa buah-buahan, floral, dan keasaman yang cerah.",
              "price" => 160000,
              "stock" => 50
            ],
            [
              "name" => "Arabica Gunung Ijen",
              "description" => "Kopi Arabica dari lereng Gunung Ijen, Jawa Timur, dikenal dengan aroma rempah, keasaman sedang, dan tekstur yang tebal.",
              "price" => 190000,
              "stock" => 50
            ],
            [
              "name" => "Robusta Gunung Ijen",
              "description" => "Robusta Gunung Ijen memiliki body yang kuat dan rasa yang intens, seringkali dengan sentuhan earthy dan cokelat.",
              "price" => 100000,
              "stock" => 50
            ],
            [
              "name" => "Arabica Gunung Arjuna",
              "description" => "Kopi Arabica dari Gunung Arjuna, Jawa Timur, dengan keasaman cerah, aroma floral, dan sentuhan buah-buahan.",
              "price" => 160000,
              "stock" => 50
            ],
            [
              "name" => "Robusta Gunung Arjuna",
              "description" => "Robusta Gunung Arjuna memiliki tekstur yang solid dan rasa yang kuat, dengan sentuhan cokelat dan nutty.",
              "price" => 90000,
              "stock" => 50
            ],
            [
              "name" => "Arabica Bali Kintamani",
              "description" => "Kopi Arabica dari Kintamani, Bali, sangat terkenal dengan keasaman cerah seperti jeruk, tekstur sedang, dan rasa bersih.",
              "price" => 190000,
              "stock" => 50
            ],
            [
              "name" => "Robusta Bali Kintamani",
              "description" => "Robusta dari Kintamani yang memiliki body kuat, aroma intens, dan rasa cokelat yang dominan, cocok untuk campuran.",
              "price" => 100000,
              "stock" => 50
            ],
            [
              "name" => "Arabica Flores Bajawa",
              "description" => "Kopi Arabica dari Bajawa, Flores, dikenal dengan body penuh, keasaman rendah, dan rasa cokelat serta nutty.",
              "price" => 190000,
              "stock" => 50
            ],
            [
              "name" => "Arabica Toraja",
              "description" => "Kopi Arabica dari Toraja, Sulawesi, terkenal dengan body tebal, keasaman sedang, dan rasa earthy atau rempah yang kuat.",
              "price" => 200000,
              "stock" => 50
            ],
            [
              "name" => "Kopi Excelsa Wonosalam",
              "description" => "Kopi Excelsa dari Wonosalam, Jawa Timur, menawarkan aroma fruity yang kuat, rasa tart, dan tekstur yang kental.",
              "price" => 160000,
              "stock" => 50
            ],
            [
              "name" => "Kopi Impor Brazil, Ethiopia, PNG, Colombia, Peru, Elsavador",
              "description" => "Campuran kopi impor dari berbagai negara penghasil kopi terkemuka, menawarkan kompleksitas rasa dari berbagai origin.",
              "price" => 350000,
              "stock" => 50
            ],
            [
              "name" => "Kopi Lanang (Pea berry)",
              "description" => "Biji kopi tunggal yang bulat (pea berry), dikenal menghasilkan rasa yang lebih intens dan seimbang karena nutrisi terfokus pada satu biji.",
              "price" => 150000,
              "stock" => 50
            ],
            [
              "name" => "Luwak Arabica Sidikalang",
              "description" => "Kopi Luwak dari biji Arabica Sidikalang, menawarkan kombinasi body kuat dan keasaman khas Sidikalang dengan keunikan Luwak.",
              "price" => 600000,
              "stock" => 50
            ],
            [
              "name" => "Wine Arabica Gayo",
              "description" => "Arabica Gayo yang difermentasi seperti wine, menghasilkan profil rasa buah-buahan yang kompleks, keasaman lembut, dan body tebal.",
              "price" => 300000,
              "stock" => 50
            ]
        ];

        // Iterate over each product in the data and create a record
        foreach ($products as $product) {
            Product::create([
                "name" => $product['name'],
                "slug" => Str::slug($product['name']), // Generate slug from product name
                "description" => $product['description'],
                "stock" => $product['stock'],
                "price" => $product['price']
            ]);
        }
    }
}
