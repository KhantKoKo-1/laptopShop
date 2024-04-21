<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$users = [ 
          ['id' => 1, 'name' => 'admin', 'email' => 'admin@gmail.com', 'level' => 2, 'password' => 'Password123', 'image' => 'user01.jpg'],
          ['id' => 2, 'name' => 'khant', 'email' => 'khant@gmail.com', 'level' => 1,'password' => 'Khant123', 'image' => 'user02.jpg']
        ];

if (!isset($_SESSION['users'])) {
      $_SESSION['users'] = $users;
}

$brands = [
          ['id' => 1,'name' => 'MacBook', 'image' => 'macbook.png'],
          ['id' => 2,'name' => 'Acer', 'image' => 'accer.png'],
          ['id' => 3,'name' => 'MSI', 'image' => 'msi.jpg'],
          ['id' => 4,'name' => 'Dell', 'image' => 'dell.png'],
          ['id' => 5,'name' => 'Lenovo', 'image' => 'lenovo.png'],
          ['id' => 6,'name' => 'Asus', 'image' => 'asus.png'],
          ['id' => 7,'name' => 'Razer', 'image' => 'razer.png'],
          ['id' => 8,'name' => 'hp', 'image' => 'hp.jpg'],
         ];

$items = [
            ['id' => 1,'brand_id' => 1, 'name' => 'MacBook Pro 14 (M3, 2023)','quantity' => '10', 'price($)'=> 1500,'image' => 'MacBook Pro 14 (M3, 2023).jpg'],
            ['id' => 2,'brand_id' => 1, 'name' => 'MacBook Air (13 Inch, 2024)','quantity' => '20', 'price($)'=> 2000,'image' => 'MacBook Air (13 Inch, 2024).jpg'],
            ['id' => 3,'brand_id' => 1, 'name' => 'MacBook Air (15 Inch, 2024)','quantity' => '5', 'price($)'=> 2200,'image' => 'MacBook Air (15 Inch, 2024).jpg'],
            ['id' => 4,'brand_id' => 2, 'name' => 'Acer Chromebook Spin 714','quantity' => '15', 'price($)'=> 700,'image' => 'Acer Chromebook Spin 714.jpg'],
            ['id' => 5,'brand_id' => 2, 'name' => 'Acer Chromebook Plus 515','quantity' => '5', 'price($)'=> 900,'image' => 'Acer Chromebook Plus 515.jpg'],
            ['id' => 6,'brand_id' => 2, 'name' => 'Acer Predator Helios 16 (2023)','quantity' => '3', 'price($)'=> 1000,'image' => 'Acer Predator Helios 16 (2023).jpg'],
            ['id' => 7,'brand_id' => 3, 'name' => 'MSI Raider GE78 HX','quantity' => '16', 'price($)'=> 1200,'image' => 'MSI Raider GE78 HX.jpg'],
            ['id' => 8,'brand_id' => 3, 'name' => 'MSI Stealth 14 Studio','quantity' => '20', 'price($)'=> 1300,'image' => 'MSI Stealth 14 Studio.jpg'],
            ['id' => 9,'brand_id' => 3, 'name' => 'MSI Titan GT77 HX (2023)','quantity' => '30', 'price($)'=> 1600,'image' => 'MSI Titan GT77 HX (2023).jpg'],
            ['id' => 10,'brand_id' => 3, 'name' => 'MSI Creator Z16P','quantity' => '10', 'price($)'=> 2000,'image' => 'MSI Creator Z16P.jpg'],
            ['id' => 11,'brand_id' => 4, 'name' => 'Dell Inspiron 16 Plus (7630)','quantity' => '20', 'price($)'=> 1000,'image' => 'Dell Inspiron 16 Plus (7630).jpg'],
            ['id' => 12,'brand_id' => 5, 'name' => 'Lenovo Yoga 9i Gen 8','quantity' => '30', 'price($)'=> 500,'image' => 'Lenovo Yoga 9i Gen 8.jpg'],
            ['id' => 13,'brand_id' => 5, 'name' => 'Lenovo Legion Slim 5 Gen 8','quantity' => '20', 'price($)'=> 600,'image' => 'Lenovo Legion Slim 5 Gen 8.jpg'],
            ['id' => 14,'brand_id' => 6, 'name' => 'Asus ROG Zephyrus G15','quantity' => '34', 'price($)'=> 700,'image' => 'Asus ROG Zephyrus G15.jpg'],
            ['id' => 15,'brand_id' => 6, 'name' => 'Asus Chromebook Flip','quantity' => '22', 'price($)'=> 1200,'image' => 'Asus Chromebook Flip.jpg'],
            ['id' => 16,'brand_id' => 6, 'name' => 'Asus Zenbook S 13 OLED','quantity' => '15', 'price($)'=> 1400,'image' => 'Asus Zenbook S 13 OLED (2023).jpg'],
            ['id' => 17,'brand_id' => 7, 'name' => 'Razer Blade 18 Gaming','quantity' => '10', 'price($)'=> 1600,'image' => 'Razer Blade 18 Gaming.jpg'],
            ['id' => 18,'brand_id' => 8, 'name' => 'HP Spectre x360 Laptop','quantity' => '10', 'price($)'=> 1800,'image' => 'HP Spectre x360 Laptop.jpg']
          ];

?>