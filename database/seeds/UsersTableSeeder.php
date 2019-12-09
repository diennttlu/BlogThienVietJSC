<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $address = array(
            'Hoàng Mai, Hà Nội, Việt Nam',
            'Thanh Trì, Hà Nội, Việt Nam',
            'Vĩnh Tường, Vĩnh Phúc, Việt Nam',
            'Từ Sơn, Bắc Ninh, Việt Nam',
            'Đông Đa, Hà Nội, Việt Nam',
            'TP Hải Phòng, Hải Phòng, Việt Nam',
            'Ba Đình, Hà Nội, Việt Nam',
            'Kiến Hưng, Hà Đông, Việt Nam'   
        );

        $description = array(
    		'Bài viết rất hay',
    		'Tôi rất thích bài viết này',
    		'Bài viết này tạm ổn',
    		'Hay quá trời',
    		'Tôi sẽ học thèo bài viết này',
    		'Bài viết này chưa được hay lắm',
    		'Ý kiến của tôi khác so với bài này',
    		'Bài viết này được',
    		'Không thích bài viết này',
    		'Tôi chưa có ý kiến gì'
    	);

        for($i = 1; $i <= 10;$i++)
        {
        	DB::table('users')->insert(
	        	[
	        		'full_name' => 'fullname_'.$i,
	            	'email' => 'user_'.$i.'@gmail.com',
	            	'password' => bcrypt('123456'),
                    'point'=> 0,
                    'role' => rand(0,2),
                    'location' => $address[rand(0,7)],
                    'image' => 'image_'.$i.'jpg',
                    'description' => $description[rand(0,9)],
	            	'created_at' => new DateTime(),
	        	]
        	);
        }
    }
}
