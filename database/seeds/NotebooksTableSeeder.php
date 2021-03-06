<?php

use Illuminate\Database\Seeder;
use App\Notebook;
class NotebooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Notebook::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few notebooks in our database:
        for ($i = 0; $i < 50; $i++) {
            Notebook::create([
                'heading' => $faker->sentence,
                'description' => $faker->paragraph,
                'date' => $faker->sentence       
            ]);
        }
    }
}

   
