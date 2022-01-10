-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 10:06 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hp` varchar(30) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `nama`, `hp`, `provinsi`, `kota`, `kecamatan`, `alamat`, `catatan`, `id`) VALUES
(6, 'uray', '081348522320', 'Kalimantan Barat', 'Pontianak', 'Pontianak Kota', 'Jl. Sungai raya dalam komp. sejahtera 1 No. A5\nJl. Sungai raya dalam komp. sejahtera 1 No. A5', '', 12);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `value` int(255) NOT NULL,
  `cart` varchar(10) NOT NULL DEFAULT 'No',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `value`, `cart`, `id`) VALUES
(6, 1, 1, 'No', 16);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` int(255) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL,
  `item_cart` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`, `item_cart`, `description`) VALUES
(1, 'Power', 'Adaptor LG 12v 2A', 30000, 'Adaptor_LG_12v_2A.jpg', NULL, 'Adaptor_LG_12v_2A.jpg', 'AC/DC Adaptor merk LG\r\ninput : 100v-240Vac 50/60hz, 0,59A\r\noutput : 12V 2A\r\njack output DC diameter lingkaran 5.5mm*2.1mm'),
(2, 'Mikrokontroller', 'Arduino Nano', 53000, 'arduino_nano.jpg', NULL, 'arduino_nano.jpg', 'Microcontroller: Atmel ATmega328\r\nOperating Voltage (logic level): 5 V\r\nInput Voltage (recommended): 7-12 V\r\nInput Voltage (limits): 6-20 V\r\nDigital I/O Pins: 14 (of which 6 provide PWM output)\r\nAnalog Input Pins: 8\r\nDC Current per I/O Pin: 40 mA\r\nFla'),
(3, 'Support Item', 'BreadBoard 830 Tie Points', 45000, 'BreadBoard_830_tie-points.jpg', NULL, 'BreadBoard_830_tie-points.jpg', 'Jumlah lubang: 830\r\nDiameter lubang: 0.8 mm\r\nUkuran: 16.5 cm x 5.5 cm'),
(4, 'Aktuator', 'Buzzer Continuous Tune 12v DC', 6000, 'Buzzer_Continuous_Tune_12v_DC.jpg', NULL, 'Buzzer_Continuous_Tune_12v_DC.jpg', '- Rated Voltage : 12V\r\n- Operating Voltage : 2V~28V\r\n- Rated Current : 5mA\r\n- Fundamental Frequency : 3600Hz\r\n- Min. Sound Pressure Level : 85dB Min At10cm\r\n- Operating Temp : -2060\r\n- Storage Temp : -30~70\r\n- Dimension : 30 x H5.5mm/1.18x0.22 inch\r\n- Ins'),
(5, 'Support Item', 'Kabel Jumper Male to Male 20Cm', 15000, 'Kabel_Jumper Male_to_Male.jpg', NULL, 'Kabel_Jumper Male_to_Male.jpg', 'Jumper Male to Male 40 pin\r\n\r\nPanjang : 20 cm'),
(6, 'Support Item', 'Kabel Jumper Female to Female 20Cm', 15000, 'Kabel_Jumper_Female_to_Female.jpg', NULL, 'Kabel_Jumper_Female_to_Female.jpg', 'Jumper Female to Female 40 pin Panjang : 20 cm'),
(7, 'Aktuator', 'Mini Water pump 2.5-6v', 24000, 'Mini_water_pump_2.5-6v.jpg', NULL, 'Mini_water_pump_2.5-6v.jpg', '- DC Voltage: 3-6V\r\n- Working current: 130-220mA\r\n- Power: 0.4-1.5W\r\n- Maximum lift: 40-110cm / 15.75\"-43.4\"\r\n- Flow rate: 80-120L/H\r\n- Outside diameter of water outlet: approx. 7.5mm / 0.3\"\r\n- Inside diameter of water outlet: approx. 4.7mm / 0.18\"\r\n- Dia'),
(8, 'Aktuator', 'Module Laser KY 008', 9000, 'Module_Sensor_Laser_KY_008.jpg', NULL, 'Module_Sensor_Laser_KY_008.jpg', 'Modul transmitter dengan menggunakan laser\r\nketerangan pin \r\npin S (paling atas) : sinyal diberi logik 1 atau 0 atau PWM\r\nPin tengah diberi tegangan VCC +5V atau +3.3V\r\npin - (paling bawah) diberi GND'),
(9, 'Aktuator', 'Motor Servo 9g', 15000, 'Motor_Servo.jpg', NULL, 'Motor_Servo.jpg', 'Model: SG90\r\nYg tersedia merk : microservo\r\nTechnical data given by the manufacturers:\r\nSize: 21.5mmX11.8mmX22.7mm\r\nWeight: 9 grams\r\nNo-load speed: 0.12 seconds / 60 degrees (4.8V)\r\nStall torque of 1.2 - 1.4 kg / cm (4.8V)\r\nOperating temperature: -30 to +60 degrees Celsius\r\nDead-set: 7 microseconds\r\nOperating voltage: 4.8V-6V'),
(10, 'Support Item', 'Resistor 220 OHM', 1000, 'Resistor_220_OHM_1_per_4_Watt.jpg', NULL, 'Resistor_220_OHM_1_per_4_Watt.jpg', 'Resistor 1/4watt, toleransi 5%'),
(11, 'Sensor', 'Sensor Inframerah', 7500, 'Sensor_Inframerah.jpg', NULL, 'Sensor_Inframerah.jpg', 'sensor ini memiliki sepasang pemancar dan penerima inframerah. Frekwensi inframerah yang dipancarkan mengenai permukaan halangan/rintangan (objek terdeteksi) akan dipantulkan kembali dan diterima oleh bagian penerima inframerah. Setelah diproses oleh rangkaian pembanding (comparator), lampu hijau akan menyala dan mengeluarkan sinyal digital (Digital Output) rendah.'),
(12, 'Support Item', 'USB Cable data for Arduino Nano', 15000, 'USB_Cable_data_for_Arduino_Nano.jpg', NULL, 'USB_Cable_data_for_Arduino_Nano.jpg', 'USB A (male) to Mini USB B (male) v2.0 5pin 30cm\r\nSpesifikasi:\r\nBentuk port: USB A -- Mini B\r\nPanjang: +/- 30cm\r\nWarna: Biru'),
(13, 'Mikrokontroller', 'arduino Uno R3', 110000, 'arduino_uno_r3.jpg', NULL, 'arduino_uno_r3.jpg', 'Deskripsi Uno R3 - Arduino Uno Complatible Atmega328p\r\nMerupakan modul mikrokontroller yg compatible dengan Arduino Uno.\r\nMenggunakan chip Atmel ATMega328P.\r\nMenggunakan Chip Atmega328P bentuk SMD dan driver serial nya CH340.\r\nProduct ini dijual tanpa disertai kabel USB.\r\nSpesifikasi;\r\nMicrocontroller: ATMEGA 328p\r\nSerial Chip : CH340G'),
(14, 'Mikrokontroller', 'ARM mbed NXP LPC1768 Development Board', 1150000, 'ARM_mbed_NXP_LPC1768_Development_Board.jpg', NULL, 'ARM_mbed_NXP_LPC1768_Development_Board.jpg', 'The mbed NXP LPC1768 development board from ARM enables quick and easy creation of high-performance prototypes. Based on the powerful NXP LPC1768 Cortex-M3 processor, which runs at 96 MHz and offers 512 KB flash and 32 KB SRAM, the 32-bit mbed can handily outperform popular 8-bit prototyping platforms like theArduinoandBasic Stamp.\r\nFeature:\r\nCan be powered by USB or an external 4.5 9 V supply (supply voltages up to 12V should generally be safe, but at these voltages the regulator may start to overheat if used to power external components)\r\nCompact module: 54 mm 26 mm\r\nConvenient form-factor: 40-pin DIP (0.9\" row spacing), 0.1\" pitch\r\nDrag-and-drop programming, with the board represented as a USB drive\r\nBest-in-class Cortex-M3 hardware\r\n96 MHz ARM with 32 KB of SRAM, 512 KB of Flash\r\nEthernet, USB OTG'),
(15, 'Sensor', 'Gas Sensor', 25000, 'gas_sensor.jpg', NULL, 'gas_sensor.jpg', 'Sensor tipe MQ-2 mempunyai karateristik deteksi gas yang luas, mencakup gas yang mudah terbakar dan berbahaya seperti LPG, butane, methane, alcohol, propane, hydrogen, smoke, dll.\r\nSpesifkasi:\r\nMQ-2 MQ2 Smoke Gas LPG Butane Hydrogen Gas Sensor Detector\r\n100% band new and high quality\r\nSize: 32mm x 22mm x 27mm\r\nMain Chip: The LM393\r\nWorking Voltage: DC 5V\r\nGreat for home or factory gas leakage detection\r\nUse for Detecting: Combustible gas such as LPG, butane, methane, alcohol, propane, hydrogen, smoke, etc'),
(16, 'Support Item', 'Kabel Female to Male 20Cm', 15000, 'kabel_female_to_male.jpg', NULL, 'kabel_female_to_male.jpg', 'Jumper Female to Male 40 pin Panjang : 20 cm'),
(17, 'Display', 'Modul Display LCD 16x2', 36000, 'modul_display_LCD_16x2.jpg', NULL, 'modul_display_LCD_16x2.jpg', 'LCD 16Ã—2 (Liquid Crystal Display) merupakan modul penampil data yang mepergunakan kristal cair sebagai bahan untuk penampil data yang berupa tulisan maupun gambar. Pengaplikasian pada kehidupan sehari â€“ hari yang mudah dijumpai antara lain pada kalkulator, gamebot, televisi, atau pun layar komputer.'),
(18, 'Sensor', 'Modul Sensor Cahaya LDR', 8000, 'Modul_Sensor_Cahaya_LDR.jpg', NULL, 'Modul_Sensor_Cahaya_LDR.jpg', 'Fungsi modul sensor ini adalah untuk mendeteksi adanya cahaya / mengukur intensitas cahaya, dan hasilnya dilaporkan di bagian port out.'),
(19, 'Sensor', 'Modul Sensor Suhu dan Kelembaban DHT11', 17000, 'Modul_Sensor_Suhu_dan_Kelembaban_DHT11.jpg', NULL, 'Modul_Sensor_Suhu_dan_Kelembaban_DHT11.jpg', 'Menggunakan sensor DHT11\r\nRentang pengukuran kelembaban: 20% 95% dengan toleransi +/- 5%\r\nRentang pengukuran suhu: 0-50 C dengan tolerasi +/- 2 C\r\nTegangan kerja: 3.3-5V\r\nSinyal output dalam bentuk digital\r\nDengan lobang baut, utk kemudahan pemasangan\r\nukuran kecil 3.2cm x 1.4cm\r\n\r\nKeterangan terminal:\r\nVCC: supply + 3.3-5V\r\nGND: supply\r\nDATA: digital output, ke port I/O microcontroller'),
(20, 'Sensor', 'Pir Sensor', 20000, 'pir_sensor.jpg', NULL, 'pir_sensor.jpg', 'Sensor PIR merupakan sensor yang dapat mendeteksi pergerakan, dalam hal ini sensor PIR banyak digunakan untuk mengetahui apakah ada pergerakan manusia dalam daerah yang mampu dijangkau oleh sensor PIR. Sensor ini memiliki ukuran yang kecil, murah, hanya membutuhkan daya yang kecil, dan mudah untuk digunakan. Oleh sebab itu, sensor ini banyak digunakan pada skala rumah maupun bisnis. Sensor PIR ini sendiri merupakan kependekan dari â€œPassive InfraRedâ€ sensor.'),
(21, 'Mikrokontroller', 'Raspberry Pi Microcontroller RP-PICO', 150000, 'Raspberry_Pi®_Microcontroller_RP-PICO_Raspberry_Pi®_Pico.jpg', NULL, 'Raspberry_Pi®_Microcontroller_RP-PICO_Raspberry_Pi®_Pico.jpg', 'Dual-Core, 32-bit ARM Cortex M0+ Processor\r\nClocked at 48MHz (default), configurable max to 133MHz.\r\nReady with USB Micro B receptor for Power and Data\r\nSupport USB 1.1 Host and Device\r\nConnected to the USB port and it will appear as USB Mass Storage by default, no driver is needed\r\nSupports MicroPython, C and C++ Programming Language'),
(22, 'Sensor', 'Sensor Suhu lm35', 14000, 'Sensor_suhu_lm35.jpg', NULL, 'Sensor_suhu_lm35.jpg', 'Sensor suhu LM35 adalah komponen elektronika yang memiliki fungsi untuk mengubah besaran suhu menjadi besaran listrik dalam bentuk tegangan. Sensor Suhu LM35 yang dipakai dalam penelitian ini berupa komponen elektronika yang diproduksi oleh National Semiconductor.'),
(23, 'Mikrokontroller', 'STM32 F030', 40000, 'STM32_F030.jpg', NULL, 'STM32_F030.jpg', 'The STM32F030 Value Line Discovery kit (32F0308DISCOVERY) helps you to discover the \r\ndevice features and to develop your applications easily. It is based on STM32F030R8T6, an \r\nSTM32 F0 series 32-bit ARMÂ® Cortexâ„¢-M0 microcontroller, and includes an ST-LINK/V2 embedded debug tool, LEDs, push buttons and a prototyping board.'),
(24, 'Sensor', 'Ultrasonic Sensor', 15000, 'ultrasonic_sensor.jpg', NULL, 'ultrasonic_sensor.jpg', 'Fitur & Spesifikasi:\r\n- Tegangan : 5V\r\n- Arus Statik: < 2mA.\r\n- Sinyal Output : high level 5V, low level 0V.\r\n- Sudut Sensor: < 15d\r\n- Jarak deteksi : 2cm-450cm.\r\n- Kepresisian : 0.3cm\r\n- Sinyal triger input: 10us TTL impulse\r\n- Sinyal Echo : sinyal output TTL PWL\r\n- Warna : Biru\r\n- Dimensi : 44 x 20 x 15mm'),
(25, 'Support Item', 'BMS 3S Charger 18650 Lithium LI Ion Battery  12.6V', 15000, 'BMS_3S_CHARGER_18650_LITHIUM_LI-ION_BATTERY_12.6V.jpg', NULL, 'BMS_3S_CHARGER_18650_LITHIUM_LI-ION_BATTERY_12.6V.jpg', 'Module name: 3S 12.6V Li-ion Lithium Battery 18650 Charger Protection PCB Board\r\nSuitable range: For nominal voltage 3.6V 3.7V lithium battery(Including 18650,26650, lithium polymer batteries)\r\nProduct Size: 64mmx20mmx3.4mm\r\nMaterial:Metal\r\nCharging voltage: 12.6V\r\nMaximum output current: 20A\r\nMaximum output power / charging power: 252W\r\n\r\nPrecautions:\r\n1.Strictly according to the diagram wiring: 0V/4.2V/8.4V/12.6V,Otherwise it will cause damage to the chip.\r\n2.After connection,it need to first charge activation, then will have the output.'),
(26, 'Support Item', 'DC Female Power Adapter Board', 5000, 'DC_Female_Power_Adapter_Board.jpg', NULL, 'DC_Female_Power_Adapter_Board.jpg', 'Features:\r\n1.One-Step Molding Technology\r\n2.Light Weight\r\n3.Durable And Break-Resistant.\r\n4.Burn-Resisting.'),
(27, 'Mikrokontroller', 'ESP32 Wifi Bluetooth', 85000, 'ESP32_ESP-32_DOIT_WIFI_BLUETOOTH.jpg', NULL, 'ESP32_ESP-32_DOIT_WIFI_BLUETOOTH.jpg', 'ESP32 ESP-32 IOT Wireless Bluetooth Arduino Internet of Things'),
(28, 'Sensor', 'Light Sensor', 14000, 'light_sensor.jpg', NULL, 'light_sensor.jpg', 'Spesifikasi:\r\n- Sensor CTRT5000 yang sangat sensitif dan stabil\r\n- Sensor garis untuk aplikasi robotik\r\n- Menggunakan sinar inframerah\r\n- Voltase: 5v.\r\n- Garis hitam output LOW, garis putih output HIGH\r\n- Jarak deteksi: 10MM\r\n- Ukuran: 4.22 x 0.90 x 1.25cm'),
(29, 'Sensor', 'Magnetic Door Sensor', 8000, 'magnetic_door_sensor.jpg', NULL, 'magnetic_door_sensor.jpg', 'Features\r\n\r\n- Housing: Alloy zinc material\r\n- Gap: 25 - 35 mm, 30 - 40 mm\r\n- Alarm Output: N.C, N.O, or COM Type\r\n- Dimension 48 x 19mm'),
(30, 'Aktuator', 'Modul Relay 5V', 6100, 'modul_relay.jpg', NULL, 'modul_relay.jpg', 'Spesifikasi:\r\n5V 1-Channel Relay interface board, arus sink 15 mA - bisa langsung dari pin mikrokontroler;\r\nKapasitas relay, AC250V 10A ; DC30V 10A;\r\nInterface standard TTL logic langsung dikendalikan mikrokontroler (Arduino , 8051, AVR, PIC, DSP, ARM, ARM, MSP430, TTL logic)\r\nRangkaian proteksi (arus kickback) sudah termasuk di dalamnya - aman dan siap digunakan\r\nLED indikator untuk menandakan channel yang aktif'),
(31, 'Support Item', 'Optocoupler 4 Channel Optical Isolation', 17000, 'Optocoupler_4-Channel_Optical_Isolation.jpg', NULL, 'Optocoupler_4-Channel_Optical_Isolation.jpg', 'Spesifikasi:\r\n- Input port voltage: 3.6-24V\r\n- Output Port Voltage Port: 3.6-30V\r\n- Jumper Cap Can Achieve Output Port Is High POtential Or Pull Down Output\r\n- Onboard 4-Channel 817 Are Independent: can achieve different voltage control at\r\nthen same time'),
(32, 'Support Item', 'PCB Dot Matrix Single Layer 9X15Cm', 11000, 'PCB_DOT_MATRIX_THRU_HOLE_SINGLE_LAYER_9X15CM_915CM_LUBANG_BOLONG_PLAT.jpg', NULL, 'PCB_DOT_MATRIX_THRU_HOLE_SINGLE_LAYER_9X15CM_915CM_LUBANG_BOLONG_PLAT.jpg', 'PCB Dot Matrix lubang Single Layer Through Hole 9x15cm FR4 protoboard\r\n\r\nMaterial : FR 4 + Silver Coating + Masking\r\n\r\nPitch Hole : 0.1inch / 2.54mm\r\nSesuai jarak kaki IC,Hole atas dan bawah terhubung melalui Silver Troughole\r\n\r\nUkuran PCB : 9cm x 15cm\r\nHarga tertera untuk 1pc PCB.'),
(33, 'Support Item', 'Push Botton', 500, 'push_botton.jpg', NULL, 'push_botton.jpg', 'Tombol yang mendeteksi jika ditekan, dan tidak mendeteksi ketika dilepas.'),
(34, 'Support Item', 'SIM800L', 44000, 'SIM800L_Quad_Band.jpg', NULL, 'SIM800L_Quad_Band.jpg', 'Size:49mm x 47mm\r\nNet Weight:28g\r\nWeight: 38g\r\nPackage Included:\r\n1 x SIM900A V4.0 kit\r\n1x Power Cable\r\n1x Antenna'),
(35, 'Support Item', 'TEA5767 FM Stereo Module', 70000, 'TEA5767_FM_Stereo_Module.jpg', NULL, 'TEA5767_FM_Stereo_Module.jpg', 'TEA5767 FM Stereo Radio Module 76-108MHZ With Antenna\r\nPower Supply: 5V\r\n\r\n- Frequency range: 76-108MHZ\r\n- PCB size: 31*30mm\r\n- With reverse polarity protection diode\r\n- With power output filtering sensor\r\n- Directly plug antenna interface\r\n- I2C bus communication\r\n- Multi capacitor combined filter\r\n- Blue LED power indicator\r\n- FM chip module TEA5767\r\n- Onboard 3.5mm audio interface\r\n- If connects with singlechip, only connect the Power Ground and two I2C\r\ncommunication cable'),
(36, 'Sensor', 'Turbidity Sensor Modul', 150000, 'Turbidity_Sensor_Modul.jpg', NULL, 'Turbidity_Sensor_Modul.jpg', 'Spesifikasi:\r\n- Operating Voltage: 5V DC\r\n- Operating Current: 40mA (MAX)\r\n- Response Time : <500ms\r\n- Visit Tokodu1no\r\n- Insulation Resistance: 100M (Min)\r\n- Output Method:\r\nAnalog output: 0-4.5V\r\nDigital Output: High/Low level signal (you can adjust the threshold value by adjusting the potentiometer)\r\n- Operating Temperature: 5â„ƒ~90â„ƒ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` varchar(10) DEFAULT 'No',
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT 'Nama Kamu',
  `birthdate` varchar(30) NOT NULL DEFAULT 'Tanggal Lahir Kamu',
  `gender` varchar(30) NOT NULL DEFAULT 'Jenis Kelamin Kamu',
  `photo` varchar(255) NOT NULL DEFAULT 'account/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `name`, `birthdate`, `gender`, `photo`) VALUES
(12, 'No', 'ucupgg', 'urayherdian@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nama Kamu', 'Tanggal Lahir Kamu', 'Jenis Kelamin Kamu', 'account/ucupgg/ucupgg.png'),
(14, 'No', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Nama Kamu', 'Tanggal Lahir Kamu', 'Jenis Kelamin Kamu', 'account/default.png'),
(15, 'Yes', 'adminmanshop', 'manshop@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Nama Kamu', 'Tanggal Lahir Kamu', 'Jenis Kelamin Kamu', 'account/default.png'),
(16, 'No', 'rfl', 'rfl@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nama Kamu', 'Tanggal Lahir Kamu', 'Jenis Kelamin Kamu', 'account/rfl/rfl.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `users_fk` (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_cart_fk` (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`),
  ADD KEY `checkout_user_fk` (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `users_fk` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `user_cart_fk` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_user_fk` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
