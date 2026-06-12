CREATE DATABASE wiki_solo_leveling;

USE wiki_solo_leveling;

-- Create Tables
CREATE TABLE users(
    username VARCHAR(50) NOT NULL PRIMARY KEY UNIQUE,
    password TEXT NOT NULL,
    role ENUM('user', 'admin')
);
CREATE TABLE humans(
    char_id VARCHAR(6) NOT NULL PRIMARY KEY UNIQUE,
    char_name VARCHAR(100) NOT NULL,
    char_rank VARCHAR(15),
    char_description TEXT,
    char_image TEXT,
    char_guild VARCHAR(100),
    char_va VARCHAR(100)
);
CREATE TABLE dungeons(
    dungeon_id VARCHAR(6) NOT NULL PRIMARY KEY UNIQUE,
    dungeon_name VARCHAR(100) NOT NULL,
    dungeon_rank TEXT,
    dungeon_description TEXT,
    dungeon_image TEXT
);
CREATE TABLE monsters(
    char_id VARCHAR(6) NOT NULL PRIMARY KEY UNIQUE,
    char_name VARCHAR(100) NOT NULL,
    char_species VARCHAR(50),
    dungeon_id VARCHAR(6) NOT NULL,
    char_description TEXT,
    char_image TEXT,
    char_va VARCHAR(100),
    FOREIGN KEY (dungeon_id) REFERENCES dungeons(dungeon_id)
);
CREATE TABLE abilities(
    id VARCHAR(6) NOT NULL PRIMARY KEY UNIQUE,
    owner_id VARCHAR(6) NOT NULL,
    ability_name VARCHAR(100) NOT NULL,
    ability_type VARCHAR(30),
    ability_description TEXT
);

-- Insert Tables
INSERT INTO users VALUES
('admin', '$argon2i$v=19$m=65536,t=4,p=1$VENlQnNFN0JWWHZQN3pMNQ$f+112q/6LaZcPtU1fbVmPWyWLc9R5V9CeP/CF0UBXjA', 'admin');

-- id, name, rank, desc, image, guild, va
INSERT INTO humans VALUES
('849000', 'Sung Jinwoo', 'S-Rank Hunter', 'Seorang pemburu istimewa yang bisa "naik level". Setelah Insiden Double Dungeon, mantan pemburu peringkat E ini mendapatkan akses ke sebuah "sistem" yang membantunya menjadi lebih kuat. Meskipun dulu dijuluki "Pemburu Terlemah di Seluruh Umat Manusia", kini ia memiliki kemampuan untuk mengubah orang mati menjadi Pasukan Bayangannya.', '../public/images/Sung_Jinwoo.webp', 'Ahjin', 'Min Seung-woo | Taito Ban | Aleks Le'),
('4469e1', 'Sung Jinah', 'None', 'Jinah adalah seorang gadis yang ceria, lincah, dan rajin, dengan rasa kekeluargaan yang kuat serta hubungan yang erat dengan kakaknya, karena sang kakak telah menafkahinya dan hampir seperti mengasuhnya sendiri setelah ayah mereka hilang dan ibu mereka koma. Salah satu lelucon khas dari karakternya adalah kebiasaannya yang buruk, yaitu menendang Jinwoo dengan kakinya saat kesal, namun justru berakhir dengan dirinya sendiri yang terluka karena tubuh Jinwoo yang sangat tangguh.', '../public/images/Sung_Jinah.webp', 'None', 'Haruna Mikawa | Rebecca Wang'),
('64ad03', 'Cha Hae-In', 'S-Rank Hunter', 'Cha Hae-In (차해인) adalah seorang Pemburu peringkat S asal Korea dan Wakil Ketua Persekutuan Pemburu. Ia juga merupakan istri Sung Jinwoo dan ibu dari putra mereka, Sung Suho.', '../public/images/Cha_Hae-In.webp', 'Hunters', 'Yu-Yoeng | Reina Ueda | Michelle Rojas'),
('a4e4d3', 'Go Gunhee', 'S-Rank Hunter', 'Go Gunhee (고건희) adalah seorang Pemburu Peringkat S asal Korea dan Ketua Asosiasi Pemburu Korea.', '../public/images/Go_Gunhee.webp', 'None', 'Jun-seok Song | Banjō Ginga | Kent Williams'),
('e52e45', 'Baek Yoonho', 'S-Rank Hunter', 'Baek Yoonho (백윤호) adalah seorang Pemburu peringkat S asal Korea dan Ketua Guild White Tiger.', '../public/images/Baek_Yoonho.webp', 'White Tiger', 'Han Bok-hyun | Hiroki Tōchi | Christopher Sabat'),
('af1556', 'Choi Jong-In', 'S-Rank Hunter', 'Choi Jong-In (최종인) adalah seorang Pemburu peringkat S asal Korea dan Ketua Hunter Guild.', '../public/images/Choi_Jong-In.webp', 'Hunters', 'Daisuke Hirakawa | Ian Sinclair'),
('be6967', 'Woo Jinchul', 'A-Rank Hunter', 'Woo Jinchul (우진철) adalah seorang Pemburu Peringkat A asal Korea dan Ketua Asosiasi Pemburu Korea saat ini. Sebelum menduduki jabatan ini, ia menjabat sebagai Kepala Inspektur Tim Pengawasan Asosiasi Pemburu di bawah kepemimpinan Ketua sebelumnya, Go Gunhee.', '../public/images/Woo_Jinchul.webp', 'None', 'Beom-sik Shin | Makoto Furukawa | SungWon Cho'),
('d9f7f7', 'Kang Taeshik', 'B-Rank Hunter', 'Kang Taeshik (강태식) adalah seorang Pemburu Peringkat B yang bekerja sebagai inspektur di Tim Pengawasan Asosiasi Pemburu Korea sekaligus sebagai pembunuh bayaran.', '../public/images/Kang_Taeshik.webp', 'None', 'Gyu-hyeok Shim | Koki Uchiyama | Koki Uchiyama'),
('f2e443', 'Lee Joohee', 'B-Rank Hunter', 'Lee Joohee (이주희) adalah seorang penyembuh peringkat B asal Korea. Ia juga merupakan salah satu teman lama Jinwoo, yang telah mengenalnya sejak Jinwoo masih berstatus sebagai Pemburu peringkat E, serta salah satu dari enam orang yang selamat dari insiden Double Dungeon pertama.', '../public/images/Lee_Joohee.webp', 'Knights', 'Rina Honnizumi | Dani Chambers'),
('f2dc96', 'Hwang Dongsuk', 'C-Rank Hunter', 'Hwang Dongsuk (황동석) adalah seorang Lizard dan kakak laki-laki Hwang Dongsoo.', '../public/images/Hwang_Dongsuk.webp', 'None', 'Yasuhiro Mamiya | Jarrod Greene'),
('bf0978', 'Song Chi-Yul', 'C-Rank Hunter', 'Song Chi-Yul (송치열) adalah seorang Pemburu Peringkat C asal Korea dan guru kumdo. Ia juga merupakan salah satu teman lama Jinwoo, yang telah mengenalnya sejak Jinwoo masih berstatus sebagai Pemburu Peringkat E, serta salah satu dari enam orang yang selamat dari insiden Double Dungeon pertama.', '../public/images/Song_Chiyul.webp', 'None', 'Eiji Hanawa | Sean Hennigan'),
('e956e5', 'Kim Sangshik', 'D-Rank Hunter', 'Kim biasanya bersikap ramah dan suka minum kopi di pagi hari. Namun, dia juga egois dan lebih mementingkan kehidupannya sendiri daripada kehidupan orang lain, seperti yang terlihat saat dia meninggalkan Jinwoo sendirian di dalam Double Dungeon untuk mati demi keluarganya.', '../public/images/Kim_Sangshik.webp', 'None', 'None'),
('952fbc', 'Yoo Jinho', 'D-Rank Hunter', 'Yoo Jinho (유진호) adalah seorang Pemburu peringkat D asal Korea. Ia juga merupakan pengembang video game terkenal dan CEO Ahjin Soft.', '../public/images/Yoo_Jinho.webp', 'Ahjin', 'Gyu-hyeok Shim | Genta Nakamura | Justin Briner'),
('55e269', 'Bahtiar Rizky E.', 'K-Rank Hunter', 'Bahtiar Rizky Effendy (그냥 아무 아이) merupakan mahasiswa dari Universitas Jendaral Soedirman berasal dari kota Cilacap. Sebelum menjadi apa dia dulunya juga apa coba.', '../public/images/bahtar.jpg', 'Cilacap', 'Bahtiar');

-- id, name, species, dungeon id, desc, image url, va
INSERT INTO monsters VALUES
('fb83c9', 'Kandiaru', 'Magic Beast-Demonic Spectre', '92a421', 'Kandiaru (칸디아루), yang juga dikenal sebagai Arsitek (건축가), adalah bos tersembunyi di Double Dungeon dan pengatur Sistem. Ia kemudian menjadi Raja baru para Hantu Iblis sebagai Penguasa Dunia Bawah.', '../public/images/Architect1.webp', 'None'),
('d5fe43', 'Ant King', 'Magic Beast-Insect', '4aea86', 'Ant King  (개미왕) adalah bos tersembunyi di Gerbang Peringkat S Pulau Jeju dan salah satu monster terkuat yang pernah muncul di seluruh seri. Ia sendirian bertanggung jawab atas tewasnya lebih dari delapan dari 16 Pemburu Peringkat S yang ikut serta dalam Serangan Pulau Jeju ke-4, termasuk Goto Ryuji, pemburu terhebat di Jepang.', '../public/images/Ant_King.webp', 'Akira Ishida | Jason Liebrecht'),
('5758f9', 'Vulcan', 'Magic Beast-Demon', 'e9dbdd', 'Vulcan (볼칸) adalah bos kedua di Demon Castle dan Penguasa Lantai Bawah. Ia juga dikenal sebagai Vulcan yang Serakah karena keserakahannya yang luar biasa dan kekuatannya yang besar.', '../public/images/Vulkan.webp', 'Shota Yamamoto'),
('a7fe95', 'Baruka', 'Magic Beast-Snow Folk', '54844e', 'Baruka (바루카) adalah pemimpin para Peri Es dan bos dari Dungeon Gerbang Merah. Sama seperti anggota sukunya yang lain, Baruka bersifat egois dan sadis; ia sering memamerkan kekuatan dan kemampuan bertarungnya yang unggul selama pertempuran, serta merasa sangat senang saat membunuh manusia.', '../public/images/Baruka.webp', 'Ryuuji Satou | Daman Mills'),
('90b28e', 'Blood-Red Commander Igris', 'Magic Beast-Humanoid', '34869f', 'Komandan Igris Si Darah Merah (기사단장 핏빛의 이그리트) adalah bos di Dungeon Misi Perubahan Profesi. Setelah dikalahkan oleh Sung Jinwoo, ia diubah menjadi prajurit bayangan di bawah komando Jinwoo dan diberi nama Igris.', '../public/images/Igris_the_Bloodred.webp', 'None');

-- id, name, rank, desc, image url
INSERT INTO dungeons VALUES
('92a421', 'Cartenon Temple', 'S-Rank' , 'Kuil Cartenon, yang juga dikenal sebagai Double Dungeon, adalah sebuah dungeon tersembunyi yang misterius yang muncul di dalam dua dungeon peringkat D yang berbeda sepanjang alur cerita. Tempat ini juga berfungsi sebagai markas operasi Kandiaru, yang juga dikenal sebagai Sang Arsitek, dan digunakan oleh Ashborn untuk mencari seorang manusia yang layak menjadi tuan rumahnya serta mewarisi kekuatannya sebagai Raja Bayangan.','../public/images/Cartenon_Temple.webp'),
('e9dbdd', 'Demon Castle', 'S-Rank', 'Demon Castle tampak seperti versi Seoul yang hancur, dipenuhi bangunan-bangunan reruntuhan dan dilalap api. Kastil tersebut memiliki total 100 lantai dan empat bos. Seperti yang kemudian diungkapkan oleh Raja Bayangan Ashborn, penampilan Kastil Iblis sebenarnya terinspirasi dari versi Seoul di garis waktu alternatif, di mana perang antara Para Penguasa dan Para Raja telah menghancurkan dunia manusia dan memusnahkan seluruh umat manusia.', '../public/images/Demon_Castle.webp'),
('b4d196', 'Hapjeong Subway Station', 'E-Rank', 'Dungeon Hapjeong Subway Station digambarkan sebagai sebuah dungeon yang tangguh dan berbahaya yang muncul di dalam stasiun kereta bawah tanah Hapjeong di Seoul, Korea Selatan. Dungeon ini dikenal karena tingkat kesulitannya yang tinggi, dipenuhi monster-monster kuat dan jebakan-jebakan yang mampu menantang bahkan para Pemburu paling terampil sekalipun. Lingkungan di dalam dungeon ini gelap, menyeramkan, dan dipenuhi berbagai ancaman yang membutuhkan pemikiran strategis serta keahlian bertarung untuk dapat melewatinya.', '../public/images/Hapjeong_Subway_Station.webp'),
('34869f', 'Job Change Quest Dungeon', 'Tidak Diketahui', 'Dungeon ini mirip dengan bagian dalam sebuah kastil abad pertengahan, dipenuhi dengan makhluk ajaib bertema abad pertengahan. Di sinilah Jinwoo mengalahkan Komandan Igris yang Berwarna Merah Darah. Tempat ini dibuat untuk memberi Sung Jinwoo gambaran tentang apa yang dapat dilakukan oleh seorang penguasa bayangan, serta untuk memberinya Bayangan pertamanya, terutama Igris.', '../public/images/Job_Change_Quest_Dungeon.webp'),
('45db71', 'Penalty Zone', 'Tidak Diketahui', 'Penalty Zone adalah gurun luas tempat hamparan pasir tak berujung membentang hingga cakrawala. Di zona ini tak ada angin, matahari, bulan, maupun bintang. Langitnya kosong, bagaikan tinta hitam yang tumpah di atas kanvas. Meskipun tak ada sumber cahaya, kamu tetap dapat melihat sekeliling dengan jelas.', '../public/images/Penalty_Zone.webp'),
('4aea86', 'Jeju Island', 'S-Rank', 'Gerbang itu muncul di Pulau Jeju sekitar empat tahun sebelum peristiwa dalam alur cerita utama. Asosiasi Pemburu Korea meluncurkan misi pencarian dan penghancuran untuk membersihkan gerbang tersebut, namun misi tersebut berakhir dengan kegagalan. Akibatnya, mereka tidak mampu mencegah gerbang tersebut menjadi dungeon break tujuh hari kemudian dan monster semut di dalam gerbang tersebut menyeberang ke dunia manusia, yang mengakibatkan ribuan korban jiwa di kalangan warga sipil dan mengubah pulau tersebut menjadi gurun tandus yang tidak lagi layak huni bagi manusia.', '../public/images/JejuGate.webp'),
('54844e', 'Red Gate', 'A-Rank', 'Insiden Red Gate adalah peristiwa tragis di mana sebuah Gerbang Peringkat C yang dibeli oleh White Tiger Guild ternyata adalah Gerbang Merah.', '../public/images/Red_Gate.webp');

-- id, owner, name, type, desc
INSERT INTO abilities VALUES
('375745', '849000', 'Kekuatan Tak Terukur', 'Ability', 'Jinwoo memiliki jumlah kekuatan fisik yang luar biasa.'),
('ec24bc', '849000', 'Kecepatan Tak Terukur', 'Ability', 'Jinwoo sangat cepat dan dapat bergerak dengan kecepatan yang sangat tinggi sehingga sebagian besar lawan tidak dapat melacak pergerakannya.'),
('faf7e9', '849000', 'Daya Tahan Luar Biasa', 'Ability', 'Jinwoo sangat tangguh terhadap kerusakan fisik.'),
('9a8deb', '849000', 'Penguasaan Pertarungan', 'Ability', 'Jinwoo adalah seorang ahli dalam pertarungan jarak dekat dan keterampilan bertarungnya sangat halus sehingga ia dapat mengimbangi musuh yang memiliki lebih banyak pengalaman bertarung darinya dengan sangat mudah.'),
('c88c7c', '849000', 'Tidak Menua (Awet Muda)', 'Ability', 'Sebagai efek dari mewarisi kekuatan Ashborn, Jinwoo tidak lagi menua secara alami dan harus mengubah tubuhnya secara biologis untuk terlihat sesuai dengan usia yang ia inginkan.'),
('012504', '849000', 'Perkembangan yang Dipercepat', 'Ability', 'Kemampuan Jinwoo yang paling menakjubkan adalah tingkat pertumbuhannya yang eksplosif, sebuah kekuatan yang tidak tertandingi oleh siapa pun di dunia.'),
('a85af2', '849000', 'Umbrakinesis (Pengendalian Bayangan)', 'Ability', 'Jinwoo memiliki kendali mutlak atas bayangan dan kegelapan, serta dapat membentuknya menjadi wujud apa pun yang ia inginkan, seperti yang ditunjukkan saat ia menciptakan lapisan zirah hitam yang terbuat dari bayangan di tubuhnya.'),
('f26a5f', '849000', 'Manipulasi Ingatan', 'Ability', 'Jinwoo dapat memanipulasi ingatan manusia lain sampai batas tertentu dengan melakukan kontak fisik dengan mereka.'),
('e81fb7', '849000', 'Hipnosis', 'Ability', 'Jinwoo dapat menghipnotis orang untuk mengikuti perintah yang ia berikan dengan menjentikkan jarinya, seperti yang ditunjukkan saat ia menghipnotis Kim Chul agar membiarkannya pergi dan menjadi orang yang lebih baik saat mereka bertemu di garis waktu yang baru.'),
('aa01ae', '849000', 'Penciptaan Gerbang', 'Ability', 'Jinwoo dapat membuka gerbang (portal) ke dunia lain.'),
('0259d7', '849000', 'Inventaris Tak Terbatas', 'Ability', 'Jinwoo dapat menyimpan barang dalam jumlah tak terbatas di dalam bayangannya dan mengeluarkan barang-barang tersebut dalam jumlah berapa pun untuk ia gunakan sendiri kapan saja.'),
('05c7ae', '849000', 'Kefasihan Bahasa Monster', 'Ability', 'Jinwoo dapat berbicara dan memahami bahasa monster, yang ia gunakan untuk berkomunikasi dengan prajurit bayangannya dan monster musuh yang ia temui dalam pertempuran.'),
('8752fe', '64ad03', 'Penciuman Mana', 'Ability', 'Hae-In sangat sensitif terhadap bau mana, yang menyebabkan para hunter dan monster berbau busuk baginya. Jinwoo adalah satu-satunya hunter yang diketahui tidak berbau busuk baginya, karena statusnya sebagai Pemain (Player) dari Sistem.'),
('7eeea3', '64ad03', 'Penguasaan Pedang', 'Ability', 'Hae-In mahir dalam ilmu pedang dan mampu menemukan cara yang kreatif serta tidak biasa untuk membunuh monster dengan efisien.'),
('ac937b', '64ad03', 'Peningkatan Kekuatan', 'Ability', 'Hae-In memiliki kekuatan fisik yang besar, seperti yang ditunjukkan saat ia dengan mudah mengalahkan Igris selama pertandingan latih tanding mereka, meninju wajah Kumamoto dengan kekuatan yang cukup untuk membuatnya berdarah, dan memenggal Ratu Semut (Ant Queen) hanya dengan satu ayunan pedangnya.'),
('0ac8f2', '64ad03', 'Peningkatan Kecepatan', 'Ability', 'Hae-In dapat bergerak dengan kecepatan luar biasa dan sangat terkenal di kalangan komunitas hunter Korea karena kecepatannya dalam bertempur. Ia juga mampu dengan mudah menghindari serangan Igris (yang kekuatan aslinya sebenarnya sedang disegel), meninju wajah Kumamoto sebelum ia bahkan sempat bereaksi, membuat Kanae kewalahan dengan gerakannya, dan bahkan menghindari beberapa serangan Beru selama latih tanding mereka (meskipun perlu dicatat bahwa Beru saat itu menahan diri).'),
('829f61', '64ad03', 'Peningkatan Daya Tahan', 'Ability', 'Hae-In memiliki ketahanan fisik yang hebat, seperti yang ditunjukkan dari bagaimana ia mampu bertahan hidup untuk waktu yang cukup lama setelah Raja Semut (Ant King) merusak beberapa organ tubuhnya, dan tetap terus bergerak dengan kecepatan penuh bahkan setelah Kandiaru menebas bahunya.'),
('e0f44e', '64ad03', 'Tarian Pedang', 'Ability', 'Hae-In secara signifikan meningkatkan kecepatan serangannya, memberinya gerakan yang indah menyerupai tarian.'),
('1f5592', '64ad03', 'Pedang Cahaya', 'Ability', 'Hae-In mengubah pedangnya menjadi cahaya murni, yang secara signifikan meningkatkan daya potong (tebas) pedangnya.'),
('43b0ee', '64ad03', 'Gempa Provokasi', 'Ability', 'Hae-In menancapkan pedangnya ke tanah, menciptakan gempa bumi kecil yang akan melukai musuh mana pun yang berada di dalam radiusnya.'),
('e19e10', 'a4e4d3', 'Kekuatan Luar Biasa', 'Ability', 'Gunhee memiliki kekuatan fisik yang luar biasa. Ia cukup kuat untuk menghancurkan lapisan es yang besar dengan satu sundulan dan dengan mudah menangkis ledakan energi dari Sillad dengan tangan kosongnya.'),
('3119db', 'a4e4d3', 'Kecepatan Luar Biasa', 'Ability', 'Gunhee sangat cepat dan dapat bergerak dengan kecepatan yang luar biasa. Ia mampu mengimbangi Sillad dalam pertempuran singkat mereka dan terbukti cukup tangkas untuk bahkan menghindari beberapa serangan Sillad dari jarak dekat.'),
('6a6231', 'a4e4d3', 'Otoritas Penguasa', 'Ability', 'Gunhee mampu mengendalikan dan memindahkan objek melalui telekinesis.'),
('14f7b4', 'e52e45', 'Peningkatan Kekuatan', 'Ability', 'Baek memiliki kekuatan fisik yang besar, seperti yang ditunjukkan dari bagaimana ia mampu bertarung seimbang melawan Ma Dongwook tanpa sepenuhnya berubah wujud dan mengimbangi Kumamoto selama pertarungan latih tanding mereka tanpa banyak kesulitan. Kemampuan transformasinya juga dikatakan meningkatkan kekuatannya hingga pada titik di mana ia akan dapat dengan mudah menaklukkan Dongwook dalam pertarungan 1 lawan 1.'),
('31197e', 'e52e45', 'Peningkatan Kecepatan', 'Ability', 'Baek dapat bergerak dengan kecepatan luar biasa, seperti yang ditunjukkan dari bagaimana ia mampu bereaksi tepat waktu terhadap serangan Kumamoto dan mengimbangi pergerakannya untuk waktu yang singkat.'),
('c0caa5', 'e52e45', 'Peningkatan Daya Tahan', 'Ability', 'Baek memiliki ketahanan fisik yang hebat, seperti yang ditunjukkan dari bagaimana ia mampu tetap sadar dan terus bergerak dengan kecepatan yang relatif normal bahkan setelah dipukuli habis-habisan dan dicekik oleh Raja Semut (Ant King).'),
('46e6bf', 'e52e45', 'Transformasi', 'Ability', 'Baek mampu berubah menjadi monster humanoid mirip harimau dengan bulu putih, rambut putih murni, cakar tajam, dan taring yang menonjol, yang secara signifikan meningkatkan kekuatan dan kecepatannya. Ia juga mampu bertransformasi secara parsial dan memilih bagian tubuh tertentu mana yang akan diubah, seperti yang ditunjukkan saat ia hanya mengubah tangan dan rambutnya selama pertandingan latih tandingnya dengan Kumamoto.'),
('1594c9', 'e52e45', 'Mata Binatang Buas', 'Ability', 'Baek mampu memasuki "Kondisi Tercerahkan" dan mengukur tingkat kekuatan monster atau hunter lain secara akurat dengan matanya. Sebagai bonus, keterampilan ini juga meningkatkan refleksnya.'),
('bd18ba', 'af1556', 'Sihir Api', 'Ability', 'Choi adalah pengguna api terbaik di Korea dan dikabarkan mampu menghancurkan gedung tinggi dengan satu mantra. Apinya cukup kuat untuk memusnahkan seluruh gerombolan semut dan membakar sekelompok besar raksasa bumi hingga menjadi abu. Ia mampu mengatur suhu api, membentuk wujudnya, mengendalikannya, dan menghilangkannya, tetapi tidak mampu membuat orang lain kebal terhadap api.'),
('b05d19', 'af1556', 'Peningkatan Daya Tahan', 'Ability', 'Choi memiliki daya tahan fisik yang hebat meskipun ia adalah tipe penyihir (mage), seperti yang ditunjukkan dari bagaimana ia mampu tetap sadar dan terus bergerak dengan kecepatan tempur kelas S yang wajar bahkan setelah Raja Semut (Ant King) menebas dadanya dan melukainya dengan parah.'),
('def6fc', 'af1556', 'Peningkatan Kecepatan', 'Ability', 'Choi dapat bergerak dengan kecepatan luar biasa, seperti yang ditunjukkan dari bagaimana ia berhasil menghindari serangan penglihatan panas (heat vision) dari Patung Dewa dengan tipis.'),
('79e84b', 'af1556', 'Kapasitas Mana', 'Ability', 'Choi memiliki jumlah mana yang sangat besar, melampaui sebagian besar karakter, yang ditunjukkan melalui kemampuannya mempertahankan daya serang api yang masif secara terus-menerus selama Penyerbuan Pulau Jeju (Jeju Island Raid). Disiratkan bahwa di antara hunter tipe Penyihir (Mage) dan Penyembuh (Healer), hanya Jinwoo dengan Hati Hitam (Black Heart), mendiang penyembuh kelas S Min Byung-Gyu, dan Hunter Tingkat Nasional seperti Christopher Reed yang melampaui kapasitas mananya.'),
('3122c4', 'af1556', 'Tombak Api', 'Ability', 'Choi menciptakan beberapa tombak api dan meluncurkannya ke arah musuh-musuhnya.'),
('2f88b1', 'af1556', 'Ketahanan Api', 'Ability', 'Sebagai pengguna sihir api, Choi tampaknya tidak terpengaruh oleh suhu tinggi dan tidak dapat terluka oleh apinya sendiri.'),
('cbf134', 'af1556', 'Penjara Api', 'Ability', 'Choi mampu menciptakan jaring api berukuran besar untuk tujuan penyerangan maupun pertahanan. Menurut pengakuannya, jaring ini cukup kuat untuk menahan monster (magic beast) tingkat B. Tidak diketahui secara pasti apakah ukuran penjara tersebut memengaruhi kekuatannya.'),
('be2345', 'af1556', 'Naga Api', 'Ability', 'Choi mampu membentuk pusaran massa api menjadi seekor naga kecil, yang kemudian dapat ia gunakan untuk membakar musuh di dekatnya hingga menjadi abu.'),
('6a0e12', 'af1556', 'Panah Api', 'Ability', 'Choi membentuk apinya menjadi wujud busur dan anak panah, lalu melepaskan anak panah api tersebut ke arah musuhnya. Serangan ini cukup kuat untuk mementalkan Monster (Magic Beast) tingkat Boss yang telah diperkuat.'),
('993de1', 'af1556', 'Sihir Pemanggilan', 'Ability', 'Di garis waktu yang telah direvisi, Jong-In telah membuat kontrak dengan makhluk elemen api tak bernama yang berwujud seekor burung api biru.'),
('5415f0', 'be6967', 'Peningkatan Daya Tahan', 'Ability', 'Jinchul mampu meninju salah satu patung Arsitek yang sangat tangguh tanpa mematahkan jari-jarinya.'),
('405869', 'be6967', 'Peningkatan Kecepatan', 'Ability', 'Jinchul mampu menghindari serangan penglihatan panas (heat vision) dari Patung Dewa dengan tipis.'),
('3e96c9', 'be6967', 'Naluri Bertahan Hidup', 'Ability', 'Berevolusi dari Deteksi Krisis dan Toleransi Toksisitas, keduanya didapat dari Batu Rune, yang satu memungkinkannya merasakan bahkan kehadiran seorang Assassin (Pembunuh) dan kebal terhadap racun.'),
('cb8a01', 'be6967', 'Tubuh Kuat', 'Ability', 'Berevolusi dari Kekuatan Manusia Super dan Konsentrasi Mana.'),
('4af618', 'd9f7f7', 'Siluman (Mengendap-endap)', 'Ability', 'Taeshik mampu menyamar dengan sekitarnya dan menyembunyikan semua jejak keberadaannya, pada dasarnya membuat dirinya tidak terlihat baik secara fisik maupun magis.'),
('25729f', 'f2dc96', 'Ejekan', 'Ability', 'Hwang mampu mengejek lawan mana pun yang lebih lemah darinya, secara magis memicu mereka untuk menyerangnya tanpa berpikir.'),
('ce963c', 'f2dc96', 'Penguatan', 'Ability', 'Hwang mampu meningkatkan statistik fisiknya sampai batas tertentu, menyebabkan aura mana terbentuk di sekitar tubuhnya, mengeraskannya seperti baja dan meningkatkan kekuatannya.'),
('fe3a9e', 'bf0978', 'Penguasaan Pedang', 'Ability', 'Chi-Yul adalah seorang master kumdo dan bahkan mampu mengajarkannya kepada Cha Hae-In, serta mampu bertarung dengan tempo yang baik melawan Kang Taeshik untuk beberapa waktu.'),
('7b538e', 'bf0978', 'Daya Tahan', 'Ability', 'Chi-Yul juga memiliki daya tahan yang mengejutkan, karena ia mampu berfungsi secara normal bahkan setelah Patung Dewa menghanguskan lengan kanannya hingga putus.'),
('3cad50', 'bf0978', 'Sihir Api', 'Ability', 'Chi-Yul adalah pengguna api yang kompeten dan jarang mengalami kesulitan di lapangan karenanya, ia mampu membentuk apinya menjadi bola api sederhana atau menciptakan pilar api.'),
('b96951', '55e269', 'Apa Jal Yar', 'Ability', 'Anu takon apakoh deneng ijig-ijig takon nangapa'),
('82df90', 'fb83c9', 'Kekuatan Luar Biasa', 'Ability', 'Kandiaru memiliki kekuatan fisik yang luar biasa. Sebagai buktinya, ia mampu mementalkan Jinwoo hanya dengan satu pukulan dan mendorongnya hingga batas kemampuannya selama pertempuran mereka.'),
('8ea6fa', 'fb83c9', 'Kecepatan Luar Biasa', 'Ability', 'Kandiaru dapat bergerak dengan kecepatan yang luar biasa, seperti yang ditunjukkan dari bagaimana ia mampu bergerak sangat cepat sehingga Jinwoo pada awalnya kesulitan bereaksi tepat waktu terhadap serangannya.'),
('dbb081', 'fb83c9', 'Daya Tahan Luar Biasa', 'Ability', 'Kandiaru memiliki daya tahan yang luar biasa, seperti yang ditunjukkan dari bagaimana ia mampu menahan beberapa luka parah dari Jinwoo selama pertempuran mereka dan terus melawan balik tanpa banyak kesulitan.'),
('3566a1', 'fb83c9', 'Penguasaan Pertarungan', 'Ability', 'Kandiaru adalah petarung yang sangat mahir. Ia juga tampaknya memiliki keahlian yang seimbang baik dalam pertarungan tangan kosong maupun pertarungan berbasis pedang, dan mampu dengan mudah menandingi teknik Jinwoo terlepas dari apakah mereka memegang senjata atau tidak.'),
('38c1a3', 'fb83c9', 'Percakapan', 'Ability', 'Entah bagaimana Kandiaru mampu berbicara dan memahami bahasa Korea dengan sempurna.'),
('2c9d41', 'fb83c9', 'Manipulasi Patung', 'Ability', 'Kandiaru mampu mengendalikan patung-patungnya dengan mudah layaknya boneka.'),
('eb23e5', 'fb83c9', 'Moderasi Sistem', 'Ability', 'Kandiaru memiliki kekuatan yang hampir mutlak atas Sistem dan mampu memanipulasinya sesuka hati, sampai pada titik di mana ia bisa saja melucuti kekuatan Jinwoo seandainya Ashborn tidak menguncinya dari Sistem tersebut terlebih dahulu.'),
('93d6ef', 'fb83c9', 'Otoritas Penguasa', 'Ability', 'Kandiaru mampu memindahkan dan mengendalikan objek secara telekinesis.'),
('964601', 'd5fe43', 'Kekuatan Luar Biasa', 'Ability', 'Raja Semut memiliki kekuatan fisik yang luar biasa.'),
('767e24', 'd5fe43', 'Kecepatan Luar Biasa', 'Ability', 'Raja Semut dapat bergerak dengan kecepatan yang luar biasa, seperti yang ditunjukkan dari bagaimana ia mampu mengimbangi pergerakan Jinwoo selama pertarungan mereka.'),
('8c9398', 'd5fe43', 'Daya Tahan Luar Biasa', 'Ability', 'Raja Semut memiliki daya tahan fisik yang luar biasa, seperti yang ditunjukkan dari bagaimana ia mampu menahan serangan Jinwoo untuk waktu yang cukup lama.'),
('05fdf7', 'd5fe43', 'Kerakusan', 'Ability', 'Raja Semut mampu menyerap keterampilan dan pengetahuan dari mereka yang ia konsumsi.'),
('70346b', 'd5fe43', 'Racun Kelumpuhan', 'Ability', 'Karena telah memakan siput kerucut pada tahap awal kehidupannya, Raja Semut mampu meludahkan racun yang sangat pekat dari mulutnya.'),
('4fff36', 'd5fe43', 'Sihir Penyembuhan', 'Ability', 'Karena telah memakan kepala Min Byung-Gyu, Raja Semut menjadi seorang ahli penyembuh dan mampu menyembuhkan kembali lengan kiri serta sayapnya setelah Jinwoo menebasnya.'),
('2da82c', 'd5fe43', 'Sihir Es', 'Ability', 'Karena telah memakan sebagian tubuh Kei, Raja Semut mampu menghasilkan hamparan es yang sangat besar untuk digunakan dalam pertempuran.'),
('d6be42', 'd5fe43', 'Percakapan', 'Ability', 'Karena telah memakan kepala Min Byung-Gyu, Raja Semut mampu berbicara dan memahami bahasa Korea serta Jepang dengan sempurna.'),
('266f10', 'd5fe43', 'Terbang', 'Ability', 'Raja Semut dapat menggunakan sayapnya untuk terbang dengan kecepatan tinggi.'),
('90b381', 'd5fe43', 'Manipulasi Ukuran', 'Ability', 'Raja Semut mampu meningkatkan kekuatan kasarnya dengan mengorbankan kelincahan dan kecepatannya melalui pembesaran ukuran, dan sebaliknya dengan mengompresi (menyusutkan) tubuhnya.'),
('fcc4e8', '5758f9', 'Peningkatan Kekuatan', 'Ability', 'Vulcan memiliki kekuatan fisik yang besar, terbukti dari bagaimana ia mampu menahan Jinwoo dengan pukulan-pukulannya.'),
('d2e701', '5758f9', 'Peningkatan Kecepatan', 'Ability', 'Meskipun bertubuh gemuk, Vulcan dapat bergerak dengan kecepatan luar biasa, terbukti dari bagaimana Jinwoo tidak dapat bereaksi tepat waktu untuk menghindari serangannya.'),
('b4b42d', '5758f9', 'Peningkatan Daya Tahan', 'Ability', 'Vulcan memiliki daya tahan yang sangat besar, terbukti dari bagaimana ia hampir tidak terluka setelah Jinwoo meninju wajahnya dan membuatnya terpental menembus beberapa bangunan.'),
('116eaf', '5758f9', 'Amarah', 'Ability', 'Vulcan mampu meningkatkan ambang rasa sakitnya dan meningkatkan semua statistiknya sebesar 50%, tanpa batas waktu yang tetap.'),
('99790e', 'a7fe95', 'Penguasaan Belati', 'Ability', 'Baruka mahir dalam menggunakan belatinya, yang ditunjukkan dengan kemampuannya menandingi ilmu pedang Jinwoo dan Igris.'),
('c1febe', 'a7fe95', 'Peningkatan Kekuatan', 'Ability', 'Kekuatan Baruka diakui oleh Jinwoo sendiri yang menyatakan bahwa monster (magic beast) tingkat S itu lebih kuat dari dirinya sendiri.'),
('f145e2', 'a7fe95', 'Peningkatan Ketahanan', 'Ability', 'Baruka mampu menahan serangan langsung dari sihir api milik penyihir bayangan Jinwoo serta menahan efek racun dari Taring Beracun Kasaka.'),
('661cb4', 'a7fe95', 'Peningkatan Kecepatan', 'Ability', 'Bahkan saat terpojok dan kalah jumlah, Baruka masih mampu menghindari serangan yang hampir berakibat fatal dari Jinwoo.'),
('d25597', 'a7fe95', 'Siluman (Mengendap-endap)', 'Ability', 'Baruka mampu menyamar dengan sekitarnya dan menyembunyikan semua jejak keberadaannya, pada dasarnya membuat dirinya tidak terlihat baik secara fisik maupun magis.'),
('cb632f', 'a7fe95', 'Percakapan', 'Ability', 'Baruka adalah satu dari sedikit monster (magic beast) yang ditemui Jinwoo yang mampu berbicara secara langsung, meskipun berbicara dalam bahasa khusus monster yang hanya bisa dipahami oleh Jinwoo di antara semua manusia karena ia menggunakan Sistem.'),
('fff0de', '90b28e', 'Peningkatan Kekuatan', 'Ability', 'Igris memiliki kekuatan yang besar. Ia mampu memotong pilar batu seolah-olah terbuat dari mentega dan dengan mudah menaklukkan Jinwoo dengan kekuatan kasar, seperti yang ditunjukkan dari bagaimana ia mampu melemparnya ke dinding, menyeretnya tanpa kesulitan, dan meninju tanah hingga membentuk kawah besar dengan tampak tanpa banyak usaha.'),
('d2096a', '90b28e', 'Peningkatan Kecepatan', 'Ability', 'Igris memiliki kecepatan yang luar biasa dan mampu membuat Jinwoo lengah dengan pergerakannya.'),
('f38540', '90b28e', 'Peningkatan Daya Tahan', 'Ability', 'Igris memiliki daya tahan yang sangat besar. Ia hampir tidak terluka ketika Jinwoo mencoba memotongnya dengan belatinya dan hanya menerima serangan langsung ketika Jinwoo mengincar matanya. Bahkan saat itu, Igris mampu menahan tusukan berkali-kali di leher sebelum akhirnya tumbang.'),
('2572a7', '90b28e', 'Penguasaan Pertarungan', 'Ability', 'Igris mahir dalam ilmu pedang sampai pada titik di mana Jinwoo tidak mampu menandingi keahliannya dan memutuskan untuk bertarung dengan tangan kosong sebagai gantinya. Ia juga terbukti mahir dalam pertarungan tangan kosong dan kemungkinan besar akan mengalahkan Jinwoo seandainya Jinwoo tidak berhasil melancarkan serangan kejutan padanya pada detik terakhir.'),
('7551d0', '90b28e', 'Tangan Penguasa', 'Ability', 'Igris mampu menggunakan versi yang lebih lemah dari Otoritas Penguasa untuk keuntungannya dalam pertempuran, seperti yang ditunjukkan saat ia memanggil pedangnya kembali ke tangannya dari jarak yang cukup jauh.');