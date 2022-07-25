<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Beranda;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Beranda::factory(0)->create();

        DB::table('berandas')
            ->update([
                'harga' => 20000,
                'stok' => 10,
            ]);

        Category::create([
            'name' => 'Sepatu',
            'slug' => 'kategori-Sepatu',
            'image' => "category-images/eiger-python.jpg"
        ]);

        Category::create([
            'name' => 'Tas',
            'slug' => 'kategori-Tas',
            'image' => "category-images/eiger-eliptic-lunaris-55l-backpack.jpg"
        ]);

        Category::create([
            'name' => 'Tenda',
            'slug' => 'kategori-Tenda',
            'image' => "category-images/eiger-flash-2p.jpg"
        ]);

        Category::create([
            'name' => 'Tongkat Hiking',
            'slug' => 'kategori-Tongkat-Hiking',
            'image' => "category-images/eiger-trekking-pole-3.jpg"
        ]);

        Category::create([
            'name' => 'Sleeping Bag',
            'slug' => 'kategori-Sleeping-Bag',
            'image' => "category-images/eiger-lake-side.jpg"
        ]);

        DB::table('role')->insert(
            [
                [
                    'role' => 'admin'
                ],
                [
                    'role' => 'user'
                ]
            ]
        );

        DB::table('payment_methods')->insert([
            [
                'method' => 'BRI - 1829383',
            ],
            [
                'method' => 'BCA - 0288383',
            ],
        ]);

        DB::table('users')->insert(
            [
                [
                    'name' => 'Admin',
                    'username' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('admin123'),
                    'role_id' => 1,
                    'alamat' => '',
                ],
                [
                    'nama_lengkap' => 'Muhammad',
                    'username' => 'Muhammad',
                    'email' => 'muhammad@gmail.com',
                    'password' => Hash::make('12345678'),
                    'role_id' => 2,
                    'alamat' => 'Bekasi Timur',
                ],
            ]
        );

        Beranda::create([

            'title' => 'Eiger Python',
            'category_id' => 1,
            'slug' => 'eiger-python',
            'image' => "post-images/eiger-python.jpg",
            'excerpt' => 'PYTHON adalah high-cut shoes yang hadir untuk memberikan keamanan dan kenyamanan untuk kegiatan penjelajahan di iklim tropis.',
            'body' => '<div><ul>
                <strong> Fitur: </strong>
                <li> Sepatu dirancang dengan booties construction dengan waterproof membrane sehingga menjaga agar air, lumpur, dan pasir tidak masuk ke dalam sepatu </li>
                <li> Material bagian atas sepatu terbuat dari bahan nubuck leather dan Cordura® yang memiliki ketahanan terhadap gesekan dan abrasi </li>
                <li> Dilengkapi Vibram Winkler outsole yang memberikan traksi dan daya cengkram kuat di berbagai medan </li>
                <li> Ortholite insole untuk kenyamanan dan sebagai anti bakteri sehingga kaki tetap segar dan mengurangi bau </li>
                <li> Rubber sheet toe cap dan backcounter untuk melindungi area kaki bagian depan dan belakang dari benturan </li>
                <li> Size : 38 - 45 cm </li>
                <strong> NOTED : konfirmasi size terlebih dahulu </strong>
            </ul></div>',
            'harga' => 50000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Eiger Lora',
            'category_id' => 1,
            'slug' => 'eiger-lora',
            'image' => "post-images/eiger-lora.jpg",
            'excerpt' => 'Tampilan tangguh sepatu mid-cut Lora dirancang khusus untuk kegiatan hiking.',
            'body' => '<div> <ul>
                <strong> Fitur: </strong>
                <li> Bagian upper terbuat dari bahan kulit nubuck dengan proteksi anti air </li>
                <li> Berfungsi untuk memastikan perlindungan pada kaki bagian depan dari benturan keras </li>
                <li> Insole Ortholite </li>
                <li> Outsole Vibram </li>
                <li> Size : 36 - 41 cm </li>
                <strong> NOTED : konfirmasi size terlebih dahulu </strong>
            </ul></div>',
            'harga' => 50000,
            'stok' => 10,
        ]);

        Beranda::create([

            'title' => 'Eiger Eagle Plum',
            'category_id' => 1,
            'slug' => 'eiger-eagle-plum',
            'image' => "post-images/eiger-eagle-plum.jpg",
            'excerpt' => 'Eagle Plum 2,0 adalah sepatu mid cut yang dirancang untuk kegiatan hiking.',
            'body' => '<div><ul>
                Eagle Plum 2,0 adalah sepatu mid cut yang dirancang untuk kegiatan hiking. Teknologi Tropic Waterproof pada sepatu berfungsi untuk mencegah langsung masuknya air dari bagian atas sepatu. Insole Ortholite mempercepat pengeringan serta sebagai bantalan untuk menjaga kaki tetap nyaman saat berjalan. Sepatu ini juga didukung outsole Vibram untuk cengkraman yang lebih baik di berbagai medan.
                
                <strong> Detail : </strong>
                <li> Tropic Waterproof di bagian atas sepatu </li>
                <li> Adhesive print di bagian samping dan tengah sepatu </li>
                <li> Pelindung jari kaki berbahan karet </li>
                <li> Insole Ortholite </li>
                <li> Outsole Vibram 564k Skeleton Trek, dirancang untuk petualangan di medan seperti tanah, lumpur, kerikil, berbatu, dan rerumputan </li>
                <li> Size : 38, 40, 45 cm </li>
                <strong> NOTED : konfirmasi size terlebih dahulu </strong>
            </ul></div>',
            'harga' => 50000,
            'stok' => 10,
        ]);

        Beranda::create([

            'title' => 'Eiger Anaconda',
            'category_id' => 1,
            'slug' => 'eiger-anaconda',
            'image' => "post-images/eiger-anaconda.jpg",
            'excerpt' => 'Anaconda 2,5 adalah sepatu approach low-cut yang dirancang untuk kegiatan approach (rock climbing).',
            'body' => '<div><ul>
                Anaconda 2,5 adalah sepatu approach low-cut yang dirancang untuk kegiatan approach (rock climbing). Sistem konstruksi gusset pada sepatu berfungsi untuk mencegah langsung masuknya elemen seperti kerikil ataupun air dari bagian atas sepatu. Bagian dalam sepatu didukung insole Ortholite yang memberikan bantalan, breathable (memiliki daya evaporasi tinggi yang mampu menguapkan kelembapan sehingga mudah kering), dan ringan untuk menjaga kaki tetap nyaman.

                <strong> Fitur : </strong>
                <li> Konstruksi gusset dengan waterproof membrane untuk mencegah langsung masuknya air </li>
                <li> Outsole Vibram </li>
                <li> Insole Ortholite </li>
                <li> Pelindung jari kaki dari karet </li>
                <li> Size : 38-45 cm </li>
                <strong> NOTED : konfirmasi size terlebih dahulu </strong>
            </ul></div>',
            'harga' => 50000,
            'stok' => 10,
        ]);

        Beranda::create([

            'title' => 'Eiger Tarantula',
            'category_id' => 1,
            'slug' => 'eiger-tarantula',
            'image' => "post-images/eiger-tarantula.jpg",
            'excerpt' => 'Tarantula 2,0 adalah mid-cut hybrid shoes yang dirancang untuk kegiatan hiking dan approacH Material utama sepatu ini adalah Nubuck leather yang menawarkan ketahanan.',
            'body' => '<div><ul>
                Tarantula 2,0 adalah mid-cut hybrid shoes yang dirancang untuk kegiatan hiking dan approacH Material utama sepatu ini adalah Nubuck leather yang menawarkan ketahanan. Sepatu ini menggunakan outsole Vibram Predator 625K dan insole Ortholite untuk bantalan yang lebih baik.

                <strong> Fitur : </strong>
                <li> Sepatu dirancang dengan booties construction dengan waterproof membrane untuk mencegah langsung masuknya air sehingga memungkinkan permukaan kulit kaki terhindar dari basah </li>
                <li> Vibram Predator outsole </li>
                <li> Insole Ortholite </li>
                <li> Pelindung jari kaki dari karet </li>
                <li> Size : 38-45 cm </li>
                <strong> NOTED : konfirmasi size terlebih dahulu </strong>
            </ul></div>',
            'harga' => 50000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Eiger Phalanger 35 WS',
            'category_id' => 2,
            'slug' => 'eiger-phalanger-35-ws',
            'image' => "post-images/eiger-phalanger-35-ws.jpg",
            'excerpt' => 'Phalanger 35 WS adalah backpack berkapasitas 35 liter yang dirancang untuk menemani kegiatan hiking Anda.',
            'body' => 'Phalanger 35 WS adalah backpack berkapasitas 35 liter yang dirancang untuk menemani kegiatan hiking Anda. Untuk memberikan kenyamanan saat membawa beban, tas ini didukung oleh tali bahu yang dirancang secara ergonomis agar pas dipakai mengikuti tubuh wanita dan teknologi backsystem Fit Light. Phalanger 35 memiliki banyak tempat penyimpanan, diantaranya kompartemen utama, saku tutup atas, dan dua saku depan untuk menjaga barang bawaan Anda terorganisir dan mudah diakses. Dilengkapi juga dengan rain cover untuk menjaga barang bawaan Anda tetap terlindungi dari hujan.',
            'harga' => 50000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Eiger Rhinos 60L Backpack',
            'category_id' => 2,
            'slug' => 'eiger-rhinos-60l-backpack',
            'image' => "post-images/eiger-rhinos-60l-backpack.jpg",
            'excerpt' => 'Rhinos Series hadir untuk memenuhi kebutuhan para petualang yang dirancang untuk menghadapi medan dan iklim tropis.',
            'body' => 'Rhinos Series hadir untuk memenuhi kebutuhan para petualang yang dirancang untuk menghadapi medan dan iklim tropis. Rhinos Series ini sudah melewati serangkaian tahap uji coba oleh tim ahli EIGER, salah satunya melalui kegiatan Mountain and Jungle Course (MJC) yang telah berhasil membuktikan ketangguhan, keamanan, serta kenyamanan dari Rhinos Series ini.',
            'harga' => 50000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Eiger Eliptic Lunaris 55L Backpack',
            'category_id' => 2,
            'slug' => 'eiger-eliptic-lunaris-55l-backpack',
            'image' => "post-images/eiger-eliptic-lunaris-55l-backpack.jpg",
            'excerpt' => 'Eliptic Solaris 55L adalah tas carrier berkapasitas 55 liter yang dirancang untuk kegiatan hiking berdurasi menengah.',
            'body' => '<div><ul>
                <strong> Fitur : </strong>
                <li> Kompartemen utama </li>
                <li> Saku depan </li>
                <li> Tali kompresi samping </li>
                <li> Dua saku samping berbahan mesh </li>
                <li> Saku tutup atas </li>
                <li> Kompartemen khusus untuk menyimpan water bladder </li>
                <li> Saku hip belt </li>
                <li> Rain Cover </li>
                <li> Pengikat trekking pole </li>
                <li> Sirkulasi udara pada bagian punggung memiliki peranan penting untuk menjaga kenyamanan dan mencegah keluar keringat berlebih sehingga dapat menjaga suhu tubuh. Rancangan Aerovoid V memiliki alur sirkulasi udara optimal pada bantalan punggung. </li>
                <li> Tali gendong dirancang menyesuaikan dengan anatomi tubuh wanita </li>
            </ul></div>',
            'harga' => 50000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Consina 60L',
            'category_id' => 2,
            'slug' => 'consina-60l',
            'image' => "post-images/consina-60l.jpg",
            'excerpt' => 'Consina Bering 60L adalah backpack berkapasitas 60 liter yang dirancang untuk menemani kegiatan hiking Anda',
            'body' => '<div><ul>
                <strong> Fitur : </strong>
                <li> Top pocket </li>
                <li> 2 side bottle pocket </li>
                <li> 2 side long pocket </li>
                <li> 2 alumunium frame inside </li>
                <li> Cover bag compartment on upper side </li>
                <li> Sternum strap with whistle </li>
                <li> Detachable hip belt </li>
                <li> Hydration hose port </li>
                <li> Water baldder compartment </li>
                <li> Detachable toplid </li>
                <li> New padded foam backsystem and hipbelt </li>
                <li> Cover bag included </li>
            </ul></div>',
            'harga' => 50000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Consina Ranger 65L',
            'category_id' => 2,
            'slug' => 'consina-ranger-65l',
            'image' => "post-images/consina-ranger-65l.jpg",
            'excerpt' => 'Consina Ranger 65L adalah backpack berkapasitas 65 liter yang dirancang untuk menemani kegiatan hiking Anda',
            'body' => '<div><ul>
                <strong> Fitur : </strong>
                <li> Top pocket </li>
                <li> 2 side bottle pocket </li>
                <li> 2 side long pocket </li>
                <li> 2 alumunium frame inside </li>
                <li> Cover bag compartment on upper side </li>
                <li> Sternum strap with whistle </li>
                <li> Detachable hip belt </li>
                <li> Hydration hose port </li>
                <li> Water baldder compartment </li>
                <li> Detachable toplid </li>
                <li> New padded foam backsystem and hipbelt </li>
                <li> Cover bag included </li>
            </ul></div>',
            'harga' => 50000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Eiger Shira 1P',
            'category_id' => 3,
            'slug' => 'eiger-shira-1p',
            'image' => "post-images/eiger-shira-1p.jpg",
            'excerpt' => 'Shira 1P adalah tenda kemah untuk kapasitas 1 orang yang cocok digunakan untuk kegiatan berkemah.',
            'body' => '<div><ul>
                Shira 1P adalah tenda kemah untuk kapasitas 1 orang yang cocok digunakan untuk kegiatan berkemah. Tenda ini memiliki tiang rangka berbahan aluminium yang mudah dipasangkan, satu akses pintu masuk dan mesh sebagai ventilasi. Ketika tidak dipakai, Anda bisa menyimpannya kembali di carry bag.
                <strong> Fitur : </strong>
                <li> Tiang rangka aluminium </li>
                <li> Satu akses pintu masuk </li>
                <li> Mudah dipasang </li>
                <li> Mesh untuk ventilasi </li>
                <strong> Material : </strong>
                <li> Fly: 210T Polyester Ripstop Three Grids PU Coated 3000 mm </li>
                <li> Inner: 190T Polyester B/R, Mesh : B3 </li>
                <li> Floor: 210D Oxford Fabric PU 5000mm </li>
                <li> Pole: Aluminium Pole Diameter 8,5 mm </li>
                <li> Size: 220x130x100 cm </li>
            </ul></div>',
            'harga' => 100000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Eiger X-Casuarina 6P',
            'category_id' => 3,
            'slug' => 'eiger-x-casuarina-6p',
            'image' => "post-images/eiger-x-casuarina-6p.jpg",
            'excerpt' => 'Memilki desain yang cukup luas dan nyaman, tenda Casuarina 6P siap menemani petualangan berkemah Anda bersama teman dan keluarga.',
            'body' => 'Memilki desain yang cukup luas dan nyaman, tenda Casuarina 6P siap menemani petualangan berkemah Anda bersama teman dan keluarga. Ideal untuk kapasitas enam orang, tenda Casuarina 6P ini hadir dengan desain satu pintu masuk dan teras tenda memanjang yang menawarkan kemudahan untuk menyimpan peralatan Anda. Terbuat dari material waterproof polyester dengan konstruksi double-layer serta dilengkapi triangular rag, tenda Casuarina 6P ini menawarkan perlindungan yang tahan terhadap kondisi cuaca hujan ataupun berangin. Selain mudah dipasang dan multifungsi, tenda Casuarina 6P juga dilenkapi dengan breathable panel mesh yang memberikan ventilasi sekaligus menawarkan akses untuk menikmati pemandangan alam yang menakjubkan. Ketika selesai dipakai, Anda dapat menyimpannya kembali di carry bag',
            'harga' => 100000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Eiger Shipton 3P',
            'category_id' => 3,
            'slug' => 'eiger-shipton-3p',
            'image' => "post-images/eiger-shipton-3p.jpg",
            'excerpt' => 'Shipton 3P adalah tenda kemah untuk kapasitas 3 orang yang cocok digunakan untuk kegiatan berkemah dan hiking.',
            'body' => '<div><ul>
                Shipton 3P adalah tenda kemah untuk kapasitas 3 orang yang cocok digunakan untuk kegiatan berkemah dan hiking. Tenda ini memiliki tiang rangka berbahan duraluminium yang mudah dipasangkan, satu akses pintu masuk dan mesh sebagai ventilasi. Ketika tidak dipakai, Anda bisa menyimpannya kembali di carry bag. Inner tent: (210+50) x 180cm x 120cm, Packing size: 62x48x30 cm
                <strong> Fitur : </strong>
                <li> Tiang rangka aluminium </li>
                <li> Satu akses pintu masuk </li>
                <li> Mudah dipasang </li>
                <li> Mesh untuk ventilasi </li>
            </ul></div>',
            'harga' => 100000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Eiger Flash 2P',
            'category_id' => 3,
            'slug' => 'eiger-flash-2p',
            'image' => "post-images/eiger-flash-2p.jpg",
            'excerpt' => 'Flash 2P adalah tenda kemah untuk kapasitas 2 orang yang cocok digunakan untuk kegiatan berkemah.',
            'body' => '<div><ul>
                Flash 2P adalah tenda kemah untuk kapasitas 2 orang yang cocok digunakan untuk kegiatan berkemah. Tenda ini memiliki tiang rangka berbahan aluminium yang mudah dipasangkan, satu akses pintu masuk dan mesh sebagai ventilasi. Ketika tidak dipakai, Anda bisa menyimpannya kembali di carry bag.
                <strong> Material : </strong>
                <li> Fly: 210T Polyester Ripstop Three Grids PU Coated 3000mm </li>
                <li> Inner: 190T Polyester B/R, Mesh: B3 </li>
                <li> Floor: 210D Oxford Fabric PU 5000mm </li>
                <li> Pole: 2x Dia 8,5mm Aluminium pole </li>
                <li> Dimension: (60+210) x 150 x 110 cm </li>
            </ul></div>',
            'harga' => 100000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Consina Tent Magnum 6 Tenda Camping',
            'category_id' => 3,
            'slug' => 'consina-tent-magnum-6-tenda-camping',
            'image' => "post-images/consina-tent-magnum-6-tenda-camping.jpg",
            'excerpt' => 'Consina Tent Magnum adalah tenda kemah untuk kapasitas 6 orang yang cocok digunakan untuk kegiatan berkemah.',
            'body' => '<div><ul>
                <li> Yang tersedia warna Hijau dan Biru </li>
                <li> Kapasitas 6 orang </li>
                <strong> Fitur : </strong>
                <li> Size:220cmx270cmx180cm + 100cm </li>
                <li> Inner : 170T polyester PA 300MM & Breathable  </li>
                <li> Floor: PE  </li>
                <li> Frame : Fiber (Frame Utama 2 Set = 11 Ruas/set 53,7 Cm x 1,1 Cm)(Frame Teras 1 Set = 9 Ruas/set 53,4 Cm x 1,0 Cm) </li>
                <li> Weight : 5.50 kg </li>
            </ul></div>',
            'harga' => 100000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Taiyi tongkat hiking trekking e4102',
            'category_id' => 4,
            'slug' => 'taiyi-tongkat-hiking-trekking-e4102',
            'image' => "post-images/taiyi-tongkat-hiking-trekking-e4102.jpeg",
            'excerpt' => 'Tongkat trekking telescopic ini merupakan alat yang dapat membantu Anda pada saat melakukan pendakian gunung,
            melewati jalanan yang curam dan memudahkan Anda melewati jalan yang tidak mulus pada saat perjalanan.',
            'body' => '<div><ul>
                <strong> Fitur : </strong>
                <li> Sistem Teleskopik, Tongkat Pendakian ini memiliki mode telescopic dimana Anda dapat mensetting tongkat menjadi ukuran yang Anda inginkan, dan menyesuaikan kondisi jalanan yang sulit. Selain itu Anda dapat memendekan tongkat untuk menghemat tempat ketika akan dibawa. </li>
                <li> Pegangan Non Slip, Desain pegangan tongkat yang nyaman membuat pegangan Anda tetap kuat. Tongkat gunung ini juga disertakan dengan strap yang dapat diatur sesuai dengan kenyamanan Anda saat menggenggam tongkat. Dengan hadirnya strap ini, membuat tongkat tidak akan terlepas dan terjatuh ketika Anda melepaskan genggaman sesaat. Dapat Disesuaikan Anda dapat menyesuaikan tinggi dari tongkat ini hingga 110 cm sesuai dengan kebutuhan aktivitas outdoor Anda. </li>
                <li> Tip Tahan Lama, Tongkat yang dikenal dengan sebutan alpenstock ini disertai dengan tip yang kuat pada bagian bawah guna mendapatkan tekanan yang kuat pada tanah sehingga membantu menopang berat tubuh Anda pada saat mendaki ataupun menuruni lereng gunung. </li>
                <li> Bahan Berkualitas Tinggi, Tongkat terbuat dari material aluminium berkualitas dan gagang ABS yang kokoh dan sangat kuat sehingga cocok untuk penggunaan jangka panjang. </li>
            </ul> </div>',
            'harga' => 30000,
            'stok' => 8,
        ]);

        Beranda::create([
            'title' => 'Tongkat hiking trekking alpenstocks pole 7075',
            'category_id' => 4,
            'slug' => 'tongkat-hiking-trekking-alpenstocks-pole-7075',
            'image' => "post-images/tongkat-hiking-trekking-alpenstocks-pole-7075.jpeg",
            'excerpt' => 'Tongkat stik ini merupakan alat yang dapat membantu anda pada saat melakukan pendakian gunung, melewati jalanan yang curam dan memudahkan anda melewati jalan yang tidak mulus pada saat perjalanan.',
            'body' => '<div><ul>
                <strong> Fitur : </strong>
                <li>Sistem Teleskopik, Tongkat pendakian ini memiliki mode teleskopik di mana Anda dapat mengatur tongkat menjadi ukuran yang Anda inginkan, dan menyesuaikan kondisi jalanan yang sulit.</li>
                <li>Gagang anti licin, desain pegangan tongkat yang terbuat dari bahan plastik yang kesat membuatnya nyaman saat dipegang. Tongkat gunung ini juga menyertakan strap yang dapat diatur sesuai dengan kenyamanan anda saat menggenggam tongkat. 
                Dengan hadirnya strap ini, membuat tongkat tidak akan terlepas dan terjatuh ketika anda melepaskan genggaman sesaat. </li>
                <li>Desain anti getar, dilengkapi dengan per pada bagian dalam tongkat yang membuat tongkat tidak mudah terguncang saat anda menjejakkan pada tanah. </li>
                <li>Ujung tongkat yang kuat, tongkat yang dikenal dengan sebutan alpenstock ini disertai dengan ujung tongkat yang kuat sehingga tetap kokoh saat dihadapkan tekanan yang kuat pada tanah, membantu menopang berat tubuh anda pada saat mendaki ataupun menuruni lereng gunung. </li>
                <li>Bahan Berkualitas, tongkat terbuat dari material alumunium, dan plastik ABS yang berkualitas sehingga sangat kuat dan tahan lama, bisa menjadi teman mendaki Anda dalam waktu yang lama.</li>
                </ul></div>',
            'harga' => 55000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Eiger Trekking Pole 3',
            'category_id' => 4,
            'slug' => 'eiger-trekking-pole-3',
            'image' => "post-images/eiger-trekking-pole-3.jpg",
            'excerpt' => '3 Section Trekking Pole adalah perlengkapan penting bagi para hiker dan pendaki gunung.',
            'body' => '<div><ul>
                <strong> Fitur : </strong>
                <li>Pegangan berbahan EVA untuk kenyamanan karena lebih mudah menyerap keringat sehingga tangan tidak mudah licin</li>
                <li>Tali pegangan yang dapat disesuaikan, sehingga memudahkan memegang pole (tongkat)</li>
                <li>Terbuat dari bahan aluminium alloy yang dikenal akan kekuatan dan daya tahannya -Mekanisme penguncian model quick lock</li>
                <li>Basket, memiliki bentuk seperti mangkok dengan cekungan menghadap ke bawah, yang berfungsi untuk mencegah trekking pole menancap terlalu dalam. Cocok digunakan untuk kondisi medan berlumpur dan juga mencegah tongkat tersangkut di tanah.</li>
                <li>Ujung berbahan rubber yang berfungsi untuk menghadapi medan apapun</li>
                </ul></div>',
            'harga' => 55000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Cleye alat bantu mendaki alpenstocks climbing tool odin',
            'category_id' => 4,
            'slug' => 'cleye-alat-bantu-mendaki-alpenstocks-climbing-tool-odin',
            'image' => "post-images/cleye-alat-bantu-mendaki-alpenstocks-climbing-tool-odin.jpg",
            'excerpt' => 'Alat yang dapat membantu anda pada saat melakukan pendakian gunung, melewati jalanan yang curam dan memudahkan Anda melewati jalan yang tidak mulus pada saat perjalanan.',
            'body' => '<div><ul>
                <strong> Fitur : </strong>
                <li>Telescopic, System tongkat pendakian ini memiliki mode telescopic dimana anda dapat mensetting tongkat menjadi ukuran yang Anda inginkan, dan menyesuaikan kondisi jalanan yang sulit.</li>
                <li>3 Section Adjustable, Design tongkat yang dapat di atur menjadi 3 mode perubahan yang dapat anda sesuaikan dengan kondisi jalan.</li>
                <li>Enhanced Carbon Tip, dilengkapi dengan ujung karbon yang runcing memantapkan anda ketika akan berpijak pada jalan yang curam.</li>
                </ul></div>',
            'harga' => 46000,
            'stok' => 6,
        ]);

        Beranda::create([
            'title' => 'Naturehike ST06 NH17D006-D Trekking Pole Karbon Alumunium Ringan',
            'category_id' => 4,
            'slug' => 'naturehike-st06-nh17d006-d-trekking-pole-karbon-alumunium-ringan',
            'image' => "post-images/naturehike-st06-nh17d006-d-trekking-pole-karbon-alumunium-ringan.jpg",
            'excerpt' => 'Trekking Pole dari Naturehike dengan gabungan material carbon dan aluminium alloy, sehingga menjadi lebih ringan daripada trekking pole dengan bahan full alloy.',
            'body' => '<div><ul>
                <strong> Fitur : </strong>
                <li>Berbahan Carbon dan Aluminium Alloy, ringan, kokoh, tahan lama, anti karat.</li>
                <li>Dapat dipendekkan sehingga mudah dibawa-bawa.</li>
                <li>Tali pergelangan yang adjustable dan nyaman digunakan.</li>
                <li>Fast outer lock yang mempercepat dan memudahkan pengguna untuk mengatur panjang trekking pole.</li>
                <li>Ujung tongkat yang tahan lama dengan bahan carbon steel.</li>
                <li>Gagang berbahan EVA yang nyaman digenggam dan tidak licin.</li>
                <li>Mud Stopper di bagian ujung tongkat untuk di tanah berpasir atau berlumpur.</li>
                <li>Cocok digunakan untuk trekking, hiking, alat bantu berjalan, maupun sehari-hari.</li>
                </ul></div>',
            'harga' => 46000,
            'stok' => 6,
        ]);

        Beranda::create([
            'title' => 'Eiger Lake Side',
            'category_id' => 5,
            'slug' => 'eiger-lake-side',
            'image' => "post-images/eiger-lake-side.jpg",
            'excerpt' => 'Bagi Anda penggemar kegiatan outdoor, kantong tidur (sleeping bag) adalah salah satu kebutuhan utama yang tidak boleh dilewatkan.',
            'body' => 'Bagi Anda penggemar kegiatan outdoor, kantong tidur (sleeping bag) adalah salah satu kebutuhan utama yang tidak boleh dilewatkan. Maka dari itu, Eiger menghadirkan produk sleeping bag Lake Side untuk kenyamanan dan keamanan saat tidur di alam terbuka. Produk ini dapat menjaga tubuh tetap hangat ketika suhu menjadi dingin terutama ketika Anda sedang berada di alam terbuka, khususnya di daerah tropis dengan suhu 15',
            'harga' => 50000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Merapi Mountain',
            'category_id' => 5,
            'slug' => 'merapi-mountain',
            'image' => "post-images/merapi-mountain.jpg",
            'excerpt' => 'Dreampod adalah sleeping bag yang menggunakan bahan isolasi sintetis “ecodown”',
            'body' => 'Dreampod adalah sleeping bag yang menggunakan bahan isolasi sintetis “ecodown”. Bahan isolasi ecodown ini mirip cara kerja isolasi dengan bahan down (bulu angsa) namun lebih tahan terhadap cuaca lembab dan bahan ini tidak menggumpal-gumpal setelah di cuci dan lebih cepat kering dari pada bahan down. Ecodown terbuat dari bahan botol plastik bekas, bagi anda pecinta lingkungan dan binatang sangat cocok menggunakan sleeping bag dreampod ini karena tidak saja sesuai dengan prinsip cinta lingkungan dan binatang. Juga lebih murah harganya dari pada sleeping bag down namun kwalitas isolasi juga tidak kalah.',
            'harga' => 50000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Sleeping Bag Mummy Quechua',
            'category_id' => 5,
            'slug' => 'sleeping-bag-mummy-quechua',
            'image' => "post-images/sleeping-bag-mummy-quechua.jpeg",
            'excerpt' => 'Sleeping bag mummy quechua merupakan kantung tidur yang tidak menghasilkan panas tetapi mempertahankan panas yang dihasilkan tubuh.',
            'body' => '<div>
                <ul>
                    <strong> Fitur : </strong>
                    <li>Hangat, Suhu yang nyaman 0 C/ Batas suhu -5 C</li>
                    <li>Praktis, Berat 1625 g/ Volume 14,9 L (ukuran L) / Tas barang</li>
                    <li>Kompatibilitas, dapat disambung untuk 2 orang: kantong resleting kembar kanan khaki dengan satu ritsleting merah dikiri</li>
                    <li>Size tersedia M, L dan XL</li>
                </ul></div>',
            'harga' => 550000,
            'stok' => 10,
        ]);

        Beranda::create([
            'title' => 'Sleeping Bag Gunung Outdoor SB Hikemore Camp Warmer',
            'category_id' => 5,
            'slug' => 'sleeping-bag-gunung-outdoor-sb-hikemore-camp-warmer',
            'image' => "post-images/sleeping-bag-gunung-outdoor-sb-hikemore-camp-warmer.jpeg",
            'excerpt' => 'Cocok digunakan untuk Hiking Ultralight, piknik, camping, travelling, trip bisnis, maupun sehari-hari, dll.',
            'body' => '<div>
                <ul>
                    <strong> Fitur : </strong>
                    <li>Dilengkapi Dengan Zipper panjang dan ada tali serut dibagian kupluk/penutup kepala, Zipper dapat dibuka lebar sehingga dapat digunakan menjadi tikar</li>
                    <li>Dapat digunakan pada Suhu nyaman 12 ° C, Limit suhu 7 ° C, dan Suhu Extreme 2 ° C</li>
                    <li>Dimensi sleeping bag = 200 x 75 cm</li>
                    <li>Mudah dibawa : Berat +/- 1250 gr</li>
                </ul></div>',
            'harga' => 200000,
            'stok' => 9,
        ]);

        Beranda::create([
            'title' => 'Polar Arei Outdoorgear',
            'category_id' => 5,
            'slug' => 'polar-arei-outdoorgear',
            'image' => "post-images/polar-arei-outdoorgear.jpg",
            'excerpt' => 'Cocok digunakan untuk beristirahat saat melakukan aktifitas Outdoor seperti Camping,Trekking, maupun aktifitas Outdoor lainnya.',
            'body' => '<div>
                <ul>
                    <strong> Material : </strong>
                    <li>Bahan shell : Polyester</li>
                    <li>Bahan inner : dakron + polar fleece</li>
                    <li>Berat : 800gram</li>
                </ul></div>',
            'harga' => 200000,
            'stok' => 9,
        ]);
    }
}
