<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'title' => 'Perahu Kertas',
                'author' => 'Dewi Lestari (Dee)',
                'publisher' => 'Treudee Pustaka Sejati dan Bentang Pustaka',
                'cover' => '1621084683.jpg',
                'year' => '2010',
                'price' => '80000',
                'stock' => '100',
                'description' => 'Perahu Kertas, sebuah novel fiksi karangan penulis wanita Dewi Lestari atau biasa dipanggil Dee. Dalam bukunya cerita dimulai dengan kisah seorang pria bernama Keenan. Ia adalah remaja yang telah menyelesaikan pendidikan tingkat SMA di Amsterdam, Belanda.',
                'category' => 'Novel',
            ],
            [
                'title' => '5 cm',
                'author' => 'Dhonny Dhirgantoro',
                'publisher' => 'PT. Grasindo, Yogyakarta',
                'cover' => '1621084793.jpg',
                'year' => '2005',
                'price' => '85000',
                'stock' => '100',
                'description' => '5 Cm, sebuah novel fiksi yang berkisah tentang lima orang sahabat yang bernama Zafran, Arial, Ian, Genta, dan Riani sebagai satu-satunya wanita. Mereka memiliki komitmen dan impian masing-masing.Riani adalah sosok wanita yang cantik dan cerdas, ia mempunyai cita-cita untuk bekerja di stasiun televisi. Arial, memiliki perawakan yang tinggi besar dan paling tampan di antara yang lainnya. Zafran, berpostur tubuh kurus yang merupakan anak band, ia memiliki impian menjadi seorang picisan. Genta, salah satu orang di antara mereka yang selalu dianggap “leader”. Ian memiliki perawakan yang lebih dari ideal, ia fanatik dengan bola dan penggemar Happy Salma.',
                'category' => 'Novel',
            ],
            [
                'title' => 'Koala Kumal',
                'author' => 'Raditya Dika',
                'publisher' => 'Gagas Media',
                'cover' => '1621084833.jpg',
                'year' => '2015',
                'price' => '75000',
                'stock' => '100',
                'description' => 'Raditya Dika adalah salah satu insan kreatif Indonesia yang karyanya selalu sukses diterima masyarakat. Kesuksesannya berawal dari aktivitas isengnya, yaitu nge-blogging. Tulisan di blognya lalu diadaptasi menjadi sebuah buku fiksi berjudul Kambing Jantan, yang merupakan hasil karya perdana Raditya Dika.',
                'category' => 'Novel',
            ],
            [
                'title' => 'Corat-coret di Toilet',
                'author' => 'Eka Kurniawan',
                'publisher' => 'Gramedia Pustaka Utama',
                'cover' => '1621085099.jpg',
                'year' => '2016',
                'price' => '45000',
                'stock' => '100',
                'description' => 'Buku Corat-Coret di Toilet merupakan antologi atau kumpulan cerpen yang menceritakan beragam kisah kehidupan manusia kebanyakan. Cerpen pertama yang berjudul Peterpan mengisahkan pemuda idealisme melawan pemerintahan yang diktator, dalam perjuangannya ia mengorbankan banyak hal, namun pengorbanannya itu berakhir sia-sia, idealisme tak mampu melawan yang berkuasa, pemimpin diktator tetap berjaya di singgasananya.',
                'category' => 'Cerpen',
            ],
            [
                'title' => 'Kereta Tidur',
                'author' => 'Avianti Armand',
                'publisher' => 'Gramedia Pustaka Utama',
                'cover' => '1621085170.jpg',
                'year' => '2013',
                'price' => '30000',
                'stock' => '100',
                'description' => 'Agaknya, imajinasi pula yang membuat Kereta Tidur menjadi lebih hidup. Cerita-cerita didalamnya dituliskan dengan kekuatan fiksi imajinatif sehingga mengundang pemaknaan baru atas sebuah cerita. Sekalipun cerita-cerita itu adalah kenyataan dan realitas yang biasa ditemui sehari-hari.',
                'category' => 'Cerpen',
            ],
            [
                'title' => '11:11',
                'author' => 'Fiersa Besari',
                'publisher' => 'Media Kita',
                'cover' => '1621085239.jpg',
                'year' => '2018',
                'price' => '40000',
                'stock' => '100',
                'description' => 'Pilihan paling aman tentu membuat buku serupa tapi tak sama. Ibarat musik, mirip album baru rasa lama. Namun, si Bung enggan melakukan itu. Buku 11:11 berisi sebelas cerita dan sebelas lagu. Setiap cerita punya lagu yang ibarat film adalah soundtrack pengiringnya. Pilihan judul 11:11 ini karena setiap cerita punya tema yang berbeda.',
                'category' => 'Cerpen',
            ],
            [
                'title' => 'Komik 100 Kebiasaan Nabi Seri 1 - Al Kautsar',
                'author' => 'Wawan Kukang &amp',
                'publisher' => 'Straighttedge Dw No ISBN',
                'cover' => '1621085347.jpg',
                'year' => '2002',
                'price' => '29000',
                'stock' => '100',
                'description' => 'Belajar Islam tidak harus bikin kening berkerut. Belajar Islam juga bisa dengan cara yang asyik dan menyenangkan. Komik dalam buku ini mengajarkan kepada kita tentang kebiasaan, anjuran, dan larangan dari Nabi Muhammad saw. yang pasti sangat bermanfaat buat kamu. Komik 100 Kebiasaan Nabi ini membuat tersenyum sekaligus merenung. Kita dihibur sekaligus diingatkan. (Ardian Syaf, Penggambar Komik) Mungkin inilah komik Islami pertama yang betul-betul lahir dari khazanah kultur Indonesia dan mengangkat kearifan lokal bangsa Indonesia.',
                'category' => 'Komik',
            ],
            [
                'title' => 'Detektif Conan 98',
                'author' => 'Aoyama Gosho',
                'publisher' => 'Elex Media Komputindo',
                'cover' => '1621085427.jpg',
                'year' => '2003',
                'price' => '22400',
                'stock' => '100',
                'description' => 'Gara-gara usahanya menyelidiki Ai Haibara, Masumi Sera malah harus berhadapan dengan Subaru Okiya! Sementara itu, Conan sudah semakin dekat mengungkap identitas asli Mary, si “adik perempuan dari luar daerah”!! Shukichi Haneda menjumpai kasus pembunuhan saat membantu kelompok latihan para pemain shogi profesional! Kasus yang rumit itu memaksa Shuichi Akai untuk ikut turun tangan! Dan tidak lupa pertandingan analisis antara Conan dan Heiji yang diatur oleh Momiji Oka untuk memecahkan pesan bersandi seorang ibu untuk keempat anaknya!',
                'category' => 'Komik',
            ],
            [
                'title' => 'RADEN AJENG KARTINI',
                'author' => 'Anom Whani Wicaksono',
                'publisher' => 'C-Klik Media',
                'cover' => '1621088268.png',
                'year' => '2017',
                'price' => '22620',
                'stock' => '100',
                'description' => 'BUKU SEJARAH BIOGRAFI RADEN AJENG KARTINI \r\nTokoh emansipasi tidak lain dan tidak bukan adalah RA. Kartini. Sebagai pionir perjuangan kaum perempuan, sosoknya begitu fenomenal. Oleh karenanya, Sobat wajib mengetahui kisah perjalanan hidup Kartini yang sedemikian hebat, hingga sosoknya masih dikenang hingga kini dan nanti. Dapatkan kisah inspiratifnya yang lengkap hanya di buku “Raden Ajeng Kartini”. Yuk, segera beli biar jiwa kebangsaan Sobat semua semakin membara!',
                'category' => 'Biografi',
            ],
        );
        foreach ($data as $d) {
            Book::create([
                'title' => $d['title'],
                'author' => $d['author'],
                'publisher' => $d['publisher'],
                'cover' => $d['cover'],
                'year' => $d['year'],
                'price' => $d['price'],
                'stock' => $d['stock'],
                'description' => $d['description'],
                'category' => $d['category']
            ]);
        }
    }
}
