<?php namespace Modules\Galleria\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GalleriaDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		\DB::table('galleria__galleries')->insert(['id' => 1, 'title'=>'default']);

	}

}
