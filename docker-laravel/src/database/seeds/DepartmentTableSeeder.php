<?php

	use Illuminate\Database\Seeder;

	class ArticlesTableSeeder extends Seeder
	{

	    public function run()
	    {
	        DB::table('department')->truncate();

	        DB::table('department')->insert([
	            [
	                'title'      => 'Laozi',
	                'body'       => 'When there is no desire, all things are at peace.',
	                'created_at' => '2015-01-31 23:59:59',
	                'updated_at' => '2015-01-31 23:59:59',
	            ],
	            [
	                'title'      => 'Leonardo da Vinci',
	                'body'       => 'Simplicity is the ultimate sophistication.',
	                'created_at' => '2015-02-01 00:00:00',
	                'updated_at' => '2015-02-01 00:00:00',
	            ],
	            [
	                'title'      => 'Cedric Bledsoe',
	                'body'       => 'Simplicity is the essence of happiness.',
	                'created_at' => '2015-02-01 00:00:01',
	                'updated_at' => '2015-02-01 00:00:01',
	            ],
	        ]);

	    }

	}
