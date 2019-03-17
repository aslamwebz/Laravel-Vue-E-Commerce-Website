<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; 

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'Dell Inspiron 15 3000 series-3576 (8th Gen. Core i3)',
            'product_cost' => '899',
            'product_price' => '999',
            'product_quantity' => '50',
            'product_image' => 'dell.jpg',
            'product_description' => '◾Dell Inspiron 15 3000 series-3576 (8th Gen. Core i3)
            TYPE-Intel
            SPEED-UP-TO- ◾2.2 GHz 
            MODEL-◾Core™ i3-8130U
            GENERATION-◾8th gen
            DISPLAY TYPE-◾LCD - TL HDF, Non-TCh
            SCREEN SIZE-◾15.6”
            RAM CAPACITY-◾4 GB 2400 MHz DDR4
            STORAGE CAPACITY-◾1TB HDD 5400 RPM
            GRAPHIC TYPE-◾Intel UHD Graphics 620 Onboard 2GB
            OPERATING SYSTEM- ◾Windows 10 Home
            WEB CAM- ◾HD 720P Webcam with Single digital microphone
            DVD WRITER- ◾Yes
            CONNECTIONS & EXPANSIONS-
            ◾1 x COMBO audio jack
            ◾2 x USB3.1
            ◾1 x USB2.0
            ◾1 x HDMI 
            ◾1 x RJ45 LAN Jack for LAN insert
            ◾1 x SD Card Reader (SD, SDHC, SDXC)
            WEIGHT- ◾2.13 Kg
            KEYBOARD & MOUSE- ◾English Non Backlit Keyboard
            WIRELESS-◾Wireless: 802.11ac ◾Bluetooth: 4.1
            AUDIO- ◾Stereo speakers professional tuned with maxxAudio (R) pro
            BATTERY- ◾4-cell Battery (removable)',
        ]);
        
        DB::table('products')->insert([
            'product_name' => 'Black Copper thermal Pos reciept printer',
            'product_cost' => '899',
            'product_price' => '999',
            'product_quantity' => '50',
            'product_image' => 'printer.jpg',
            'product_description' => '◾WARRANTY: 1 YEAR
            BRAND NAME: BLACK COPPER
            MODEL NO: BC98AC
            80mm thermal pos reciept printer
            INTERFACE: USB
            PRINT SPEED: 250MM/SEC
            PAPER WIDTH: 80MM
            WITH AUTO CUTTING FEATURE
            BEST DURABLE & FAST THERMAL RECIEPT POS PRINTER IN MARKET',
        ]);

        DB::table('products')->insert([
            'product_name' => 'MSI Z370 Gaming Plus Motherboard',
            'product_cost' => '899',
            'product_price' => '999',
            'product_quantity' => '50',
            'product_image' => 'dell.jpg',
            'product_description' => 'This Very Hi-End MSI Gaming Motherboard

            Supports Intel 8th Gen & 9th Gen Processors
            Supports DDR4 RAM (Upto 64GB)
            RED LED System
            DirectX 12 Support
            Support Multy GPU with AMD CrossFire Technology
            Display Outputs -DVI / HDMI
            1nos M.2 SSD Slot',
        ]);

        DB::table('products')->insert([
            'product_name' => 'G9 Black Gaming Casings',
            'product_cost' => '899',
            'product_price' => '999',
            'product_quantity' => '50',
            'product_image' => 'dell.jpg',
            'product_description' => 'Specifications:
                Product size: 456*187*437mm
                Packing size: 478*226*505mm
                M/B: ATX\MICRO ATX
                • 5.25" Drive bays: 1 x external
                • 3.5" Drive bays: 2 x internal
                • PCI slot: 7x
                Fan space: 4x
                Front I/O: USB3.0 x 1; USB2.0 x 1, Audiox1
                N.W.: 4.0
                G.W.: 4.8
                
                Features:
                - USB3.0 
                - SSD supported.
                - Bottom-placed power supply, better 
                stability and cooling.
                - Multiple fan space
                - Cable managment back cable routing capability
                - Large metal mesh area, better ventilation',
        ]);

        DB::table('products')->insert([
            'product_name' => 'Wireless Keyboard Combo (Logitec K220)',
            'product_cost' => '899',
            'product_price' => '999',
            'product_quantity' => '50',
            'product_image' => 'dell.jpg',
            'product_description' => 'Brand : Logitech
            Product Line : Logitech Wireless Combo
            Model : K220
            Max Operating Distance : 36 fts
            Included : full size wireless keyboard, mouse and receiver
            OS Supported : Winodws XP and above
            Compliant Standards : plug and play
            Battery life time : 6 months
            Keyboard : US English
            
            *** As new as brandnew
            *** Direct purchased from authorized dealer
            *** 3 units available (each 6,500 LKR)
            *** Suitable for Software developers, Graphics designers, Executives
            *** ideally use for the typesetting',
        ]);

        DB::table('products')->insert([
            'product_name' => 'WD Portable USB 3.0 Hard Disk Case',
            'product_cost' => '899',
            'product_price' => '999',
            'product_quantity' => '50',
            'product_image' => 'dell.jpg',
            'product_description' => 'Features

             Hi speed USB 3.0
             Plug and Play
             Simple & Easy Setup.
             Brand : WD
             Interface type: external USB 3.0
             Support capacity : 1 TB - 4 TB
             Color : Black
             Disc size : 2.5 inches
             Shape size : 111 mm * 82 mm * 15 mm
            
            3 MONTH WARRANTY',
        ]);

        DB::table('products')->insert([
            'product_name' => 'Gaming 600 W Power Supply',
            'product_cost' => '899',
            'product_price' => '999',
            'product_quantity' => '50',
            'product_image' => 'dell.jpg',
            'product_description' => '600W GAMING POWER SUPPLY AVAIABLE.........

            SPECIFICATION FOR 600W POWER SUPPLY
            
            GAMING 6 PIN 2 AVAILABLE.....
            GAMING 8 PIN AVAILABLE........
            SATA 6 PORT AVAILABLE........
            IDE 4 PORT AVAILABLE.......
            24 PIN PORT
            8 PIN & 4 PIN FOR MOTHER BOARD PORT',
        ]);

        DB::table('products')->insert([
            'product_name' => 'LITEON PREMIUM DVD WRITER',
            'product_cost' => '899',
            'product_price' => '999',
            'product_quantity' => '50',
            'product_image' => 'dell.jpg',
            'product_description' => 'DVD Family
            Write Speed DVD+R 16X* maximum
            DVD-R 16X* maximum
            DVD+R DL 8X maximum
            DVD-R DL 8X maximum
            Read Speed DVD-ROM 16X maximum
            
            ReWrite Speed DVD+RW 8X maximum
            DVD-RW 6X maximum
            Random Access Time 200ms
            
            CD Family
            
            Write Speed CD-R 48X maximum
            Read Speed CD-ROM 48X maximum
            ReWrite Speed CD-RW 24X maximum
            Random Access Time 140ms 　
            
            PC Required 
            1GHz or faster CPU recommended.
            Windows 8/10 requires SSE2, PAE and NX-bit Support.
            1GB RAM and 16GB free disk space required under 32-bit OS ( 2GB RAM and 20GB space under 64-bit OS ) for creating DVD Disc.
            Available SATA port required.
            
            Compatibility
            DOS 6.xx, Windows10/ 8 / Windows 7 / XP / 2003 / Vista and Linux operating system',
        ]);

        DB::table('products')->insert([
            'product_name' => 'D-Link 171 Wireless Dual Brand Mini Adapter AC 600',
            'product_cost' => '899',
            'product_price' => '999',
            'product_quantity' => '50',
            'product_image' => 'dell.jpg',
            'product_description' => 'AC600 Wireless Dual Band Mini Adapter
            Super-Fast Wireless AC
            -Simple Setup
            -Highly Portable
            Blazing-fast Bandwidth Speed. Simple Setup. And Highly Portable
            
            The DWA-171 AC600 MU-MIMO Wi-Fi USB Adapter lets you experience faster wireless speeds than ever before by delivering powerful Wireless AC technology to your desktop or notebook computer. Simply plug the adapter into an available USB port and connect to a wireless network with an Internet connection, and right away you‘ll be browsing the web and chatting to your friends.',
        ]);

        DB::table('products')->insert([
            'product_name' => '300 MBPS PCI Express Wi-Fi Card',
            'product_cost' => '899',
            'product_price' => '999',
            'product_quantity' => '50',
            'product_image' => 'dell.jpg',
            'product_description' => 'BRAND: EDIMAX
            MODEL NO: EW7612P1N VERSION 2
            **********special price********
            + COMPLIES WITH 802.IIB/g/n WIRELESS STANDARDS
            + WIRELESS DATA RATES UP TO 300NBPS
            + FEATURES EZmax MULTI-LANGUAGE SETUP WIZARD
            + WIRELESS SPEED UP TO 12 TIMES FASTER AND COVERAGE 5 TIMES FURTHER
            + FEATURES A HARDWARE WPS (WI-FI PROTECTED SETUP) BUTTON
            + INCLUDES A LOW- PROFILE BRACKET FOR SMALL COMPUTERS',
        ]);

        DB::table('products')->insert([
            'product_name' => 'D-Link 24 Port Gigabit Cat6 Patch Panel',
            'product_cost' => '899',
            'product_price' => '999',
            'product_quantity' => '50',
            'product_image' => 'dell.jpg',
            'product_description' => 'BRAND: D-LINK
            MODEL NO: NPP-C61BLK241
            
            + MEETS & EXCEEDS ANSI/TIA 568 C.2 CAT.6/CAT.5e SPECIFICATION
            + IDC COMPATIBLE FOR 110 & KRONE TOOLS
            + TERMINATING 4 PAIRS, 22-26 AWG, UNSHIELDED CABLES',
        ]);
        
    }
}
