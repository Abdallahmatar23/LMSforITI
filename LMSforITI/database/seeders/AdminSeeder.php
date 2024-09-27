<?php

namespace Database\Seeders;
use App\Models\Admin;
use App\Models\Book;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecords=[
            ['name'=>'Admin','password'=>bcrypt(123456789),'email'=>'admin@admin.com','city'=>'tanta','phone'=>01204267500,'image'=>'','type'=>'admin'],
        ];
        Admin::insert($adminRecords);
        $userRecords=[
            ['name'=>'Ali','password'=>bcrypt(123456789),'email'=>'user@user.com','city'=>'tanta','phone'=>01009128305,'image'=>''],
        ];
        User::insert($userRecords);

        $bookRecords=[
            ['title'=>'iti','auther'=>'iti','body'=>'iti iti iti iti','published_at'=>'2003-05-23'],
            ['title'=>'nti','auther'=>'nti','body'=>'nti nti nti nti','published_at'=>'2003-05-23'],
        ];
        Book::insert($bookRecords);
    }
}
