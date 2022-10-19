<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product::factory(50)->create();
        Product::firstOrCreate([
            'name' => "Chiki Ball Keju 200 Gr - 3 Pcs",
            'category_id' => 1,
            'detail'=> "Isi paket : 3 x Chiki Ball Keju 200 GrChiki Ball Keju 200 Gr merupakan makanan ringan yang terbuat dari jagung pilihan dengan kualitas terbaik dari Indofood. Cocok untuk segala jenis kegiatan bersama teman teman dan keluarga. Wujudkan kegembiraan saat berkumpul dengan menyediakan",
            'price'=> 51500,
            'photo' => "1.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "PAKET ISI 2 - Mujigae Topokki 300gr / Teokbokki Instan / Tokpoki",
            'category_id' => 1,
            'detail'=> "Topokki by Mujigae ( Tteokbokki )
            Terdiri dari: 120 gram Topokki dan 180 gram Saus, Fish Cake, Dobu",
            'price'=> 70200,
            'photo' => "2.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Momogi Snack Jagung Bakar Box Isi 20 Pcs 20Pcs",
            'category_id' => 1,
            'detail'=> "Momogi Jagung Bakar Isi 20.
            SELALU READY STOCK boleh langsung dipesan.
            Expire date lama, barang rutin datang.",
            'price'=> 8890,
            'photo' => "3.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Mi Gemez Enaak Siantar Top 1Pack isi 20 sachet",
            'category_id' => 1,
            'detail'=> "Mi Gemez Enaak Siantar Top 1 pack isi 20 sachet X 18 Gram. Expired minimal 01/23",
            'price'=> 18500,
            'photo' => "4.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Mujigae Topokki 170gr / Tteokbokki Instan / Tokpoki / Topoki",
            'category_id' => 1,
            'detail'=> "Mujigae Topokki 170 gr / Teokbokki Instan / Tokpoki / Tteokbokki / Topoki / makanan instan / cemilan instan / topoki instan halal
            Halal, Tanpa Bahan Pengawet, dan Dapat Dikirim ke Seluruh indonesia (Dapat disimpan hingga 1 tahun).",
            'price'=> 19500,
            'photo' => "5.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Paket Duo Fun Butter (2FM, 1BOB) - Jolly Time Mircowave Popcorn",
            'category_id' => 1,
            'detail'=> "2 Porsi (serving) Microwave Popcorn Gourmet rasa manis dan asin seperti di karnival-karnival dan
            1 porsi Popcorn mentega terbaik kami dengan gaya popcorn bioskop dengan rasa ekstra mentega dalam 1 paket.",
            'price'=> 64500,
            'photo' => "6.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Sushi Nori Seaweed Rumput Laut Panggang HALAL 5/10/20/50 Sheets/lembar - 20 Lembar",
            'category_id' => 1,
            'detail'=> "Sushi Nori java superfood adalah Sushi Nori / Rumput Laut panggang yang terbuat dari bahan - bahan yang berkualitas serta memiliki rasa yang enak dan lezat",
            'price'=> 33000,
            'photo' => "7.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Cimol Spesial K.y.l Kylafood",
            'category_id' => 1,
            'detail'=> "Cimol k.y.l, Tekstur cimol yang renyah dan gurih menjadi ciri khas rasa dari cimol k.y.l, dengan isian keju dan ditabur dengan bumbu khas dari k.y.l adalah kenikmatan tiada tara.",
            'price'=> 24924,
            'photo' => "8.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "BOCI (Bakso Aci) Khas Garut - Mantap Jiwa",
            'category_id' => 1,
            'detail'=> "Transaksi yg masuk berarti setuju, no complain, kami berusaha selalu memberikan yang terbaik, tetapi kadang ada kendala di ekspedisi yang di luar kuasa",
            'price'=> 15800,
            'photo' => "9.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Mainan Robot Transformers Deformation Toy Aoyi Mech SS38 Optimus Prime",
            'category_id' => 2,
            'detail'=> "BmB AOYI MECH Optimus Prime SS38 Studio Series 
            - Barang sesuai gambar
            - Pengiriman cepat",
            'price'=> 159000,
            'photo' => "11.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Baby Groot Guardian of Galaxy Avengers Flower Pot Bunga tempat pen - 3",
            'category_id' => 2,
            'detail'=> "Figure GROOT Marvel Guardian of Galaxy
            READY LAGI but LIMITED STOCK YAH
            SEMUA NOMER READYY YAHHH",
            'price'=> 45000,
            'photo' => "12.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Iron Man Mark 50 Action Figure Recast",
            'category_id' => 2,
            'detail'=> "100% BARU DAH READY STOCK YAHH...
            tidak perlu confirm.. JAMINAN READYYY kami stock dlm jumlah bnyak..
            dan klo udah abis pasti pindah jadi STOCK KOSONG",
            'price'=> 78000,
            'photo' => "13.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Godzilla Action Figure / Mainan Godzilla",
            'category_id' => 2,
            'detail'=> "Harga yang tertera adalah harga per Pc / Satuan
            +Dimension: 14.5x 9. x 17 cm ( MediumSize)
            +Bahan :Pvc Vynil Halus
            +Detail Sangat Bagus Sesuai Foto",
            'price'=> 69500,
            'photo' => "14.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "mainan anak action figure ultraman monster set hiasan kue topper cake - Set 10",
            'category_id' => 2,
            'detail'=> "Ultraman set isi 5
            Harga utk 1 set isi 5 pcs
            Tinggi +/- 11 - 14,5 cm
            Bahan: PVC
            Berat total produk +/- 248 gr
            Loose pack",
            'price'=> 85500,
            'photo' => "15.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "ACTION FIGURE SPIDERMAN IRONSPIDER MARVEL AVENGERS INFINITY WAR MAINAN",
            'category_id' => 2,
            'detail'=> "Packaging : Loose Pack No Box
            +Detail Sangat Bagus (Sesuai Foto)
            +Ukuran ±17cm Medium Size
            +Artikulasi Siku Tangan Kaki Bisa Digerakan
            +Terdapat 4 Mechanical Arm Cangkang yang bisa",
            'price'=> 88500,
            'photo' => "16.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Super Mario Bros Figure and Friends - Mario",
            'category_id' => 2,
            'detail'=> "Selalu cantumkan pilihannya pada saat order, Tanpa keterangan atau memilih produk sold out maka akan kami kirim random ( NO Komplain, No Retur ) kecuali ada keterangan kosong Cancel.",
            'price'=> 51500,
            'photo' => "17.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Jurassic World Snap Squad Attitudes Dimorphodon - Mainan Action Figure",
            'category_id' => 2,
            'detail'=> "-Kumpulkan, mainkan, dan tampilkan Koleksi Sikap Snap Squad ini yang terinspirasi oleh serial animasi, Jurassic World: Camp Cretaceous!
            -Koleksi skala kecil menampilkan tampilan sengit dinosaurus Jurassic World tetapi dengan desain gaya yang lucu berdasarkan adegan utama dari seri!
            -Mulut pada setiap gambar terbuka untuk jari, pakaian, dan aksesori lainnya sementara kaki",
            'price'=> 63310,
            'photo' => "18.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "ACTION FIGURE KIMETSU NO YAIBA DEMON SLAYER TANJIRO NEZUKO KOCHO - Netzuko",
            'category_id' => 2,
            'detail'=> "Packaging : Loose Pack No Box
            +Detail Sangat Bagus, Presisi dan Modern
            +Tinggi ± 16-19cm medium size
            +Material High Quality Pvc, Padat+Lentur+Anti pecah
            +Finishing halus warna cerah
            +Standar SNI
            +Sangat layak untuk dikoleksi,buat pajangan,objek foto, hiasan kue dan lain lain
            + Pengiriman AMAN (FREE BUBBLE WRAP)",
            'price'=> 54000,
            'photo' => "19.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "LAIQA: After Wedding Agreement",
            'category_id' => 3,
            'detail'=> "Pernikahan itu membahagiakan istri. Walau masih banyak hal tentang perempuan yang masih jadi misteri bagi Bian, sudah menjadi tugasnya sebagai suami untuk membuat istrinya bahagia. Kalau bukan dia, siapa lagi? Pernikahan itu ibadah. Surga seorang istri ada pada suaminya. Tari mencoba mengingat semua itu. Dan ia berharap bisa terus bersama Bian, bukan hanya di dunia",
            'price'=> 75000,
            'photo' => "21.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Bardugo - Six of Crows (Intl Ed)",
            'category_id' => 3,
            'detail'=> "Bardugo - Six of Crows (Intl Ed) - 9781250076960 - Buku Ori Periplus",
            'price'=> 198000,
            'photo' => "22.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "User Friendly",
            'category_id' => 3,
            'detail'=> "Format Paperback | 416 pages
            Dimensions 128 x 198 x 25mm | 284g
            Publication date 24 Sep 2020
            Publisher Ebury Publishing
            Imprint W H Allen
            Publication City/Country London, United Kingdom",
            'price'=> 258000,
            'photo' => "23.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "The Travelling Cat Chronicles",
            'category_id' => 3,
            'detail'=> "Bahan Sampul : Paperback
            Penerbit : Transworld Publishers Ltd
            Tanggal Publish : 2017-11-02
            Pengarang : Arikawa, Hiro
            ISBN-13 : 9780857524195
            Bahasa : English
            Halaman : 256",
            'price'=> 198000,
            'photo' => "24.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Murakami - Colorless Tsukuru Tazaki & His Years",
            'category_id' => 3,
            'detail'=> "Format Paperback | 304 pages
            Dimensions 129 x 198 x 19mm | 213g
            Publication date 02 Jul 2015
            Publisher Vintage Publishing
            Imprint VINTAGE",
            'price'=> 198000,
            'photo' => "25.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Mahurin- Serpent & Dove",
            'category_id' => 3,
            'detail'=> "Mahurin- Serpent & Dove - 9780062878038 - Buku Ori Periplus",
            'price'=> 210000,
            'photo' => "26.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Shine A novel",
            'category_id' => 3,
            'detail'=> "Publisher: Simon & Schuster Books for Young Readers
            Language: English",
            'price'=> 189000,
            'photo' => "27.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Bridgerton: The Viscount Who Loved Me (Bridgertons Book 2)",
            'category_id' => 3,
            'detail'=> "Product details
            Format Paperback | 384 pages
            Dimensions 126 x 196 x 32mm | 240g
            Publication date 11 Feb 2021
            Publisher Little, Brown Book Group
            Imprint PIATKUS BOOKS
            Publication City/Country London",
            'price'=> 168000,
            'photo' => "28.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Killing Commendatore",
            'category_id' => 3,
            'detail'=> "Name : Killing Commendatore
            Binding : Paperback
            Publication Date : 2019-10-01
            Author : Murakami, Haruki
            Publisher : Vintage
            ISBN-13 : 9780525435761
            Language : English",
            'price'=> 267000,
            'photo' => "29.jpg",
        ]);

        Product::firstOrCreate([
            'name' => "Harry Potter: Courage : A guided journal for cultivating your inner Gr",
            'category_id' => 3,
            'detail'=> "Product details
            Format Hardback | 224 pages
            Dimensions 150 x 230 x 22mm | 535g
            Publication date 19 Nov 2020
            Publisher Templar Publishing
            Publication City/Country London, United Kingdom
            Language English",
            'price'=> 298000,
            'photo' => "30.jpg",
        ]);
    }
}
