<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->truncate();
        $id = DB::table('category')->insertGetId(['category_name'=>'Elektronik','slug'=>'elektronik']);
        DB::table('category')->insert(['category_name'=>'Bilgisayar-Tablet','slug'=>'bilgisayar-tablet', 'up_id'=>$id]);
        DB::table('category')->insert(['category_name'=>'Kamera','slug'=>'kamera', 'up_id'=>$id]);
        DB::table('category')->insert(['category_name'=>'Telefon','slug'=>'telefon', 'up_id'=>$id]);


        $id = DB::table('category')->insertGetId(['category_name'=>'Kitap','slug'=>'kitap']);
        DB::table('category')->insert(['category_name'=>'Roman','slug'=>'roman', 'up_id'=>$id]);
        DB::table('category')->insert(['category_name'=>'Tarih','slug'=>'tarih', 'up_id'=>$id]);
        DB::table('category')->insert(['category_name'=>'Psikoloji','slug'=>'psikoloji', 'up_id'=>$id]);


        $id = DB::table('category')->insertGetId(['category_name'=>'Dergi','slug'=>'dergi']);
        DB::table('category')->insert(['category_name'=>'Spor','slug'=>'spor', 'up_id'=>$id]);
        DB::table('category')->insert(['category_name'=>'Araba','slug'=>'araba', 'up_id'=>$id]);
        DB::table('category')->insert(['category_name'=>'Kadın','slug'=>'kadın', 'up_id'=>$id]);


        $id = DB::table('category')->insertGetId(['category_name'=>'Mobilya','slug'=>'Mobilya']);
        DB::table('category')->insert(['category_name'=>'Mutfak','slug'=>'Mutfak', 'up_id'=>$id]);
        DB::table('category')->insert(['category_name'=>'Masa','slug'=>'masa', 'up_id'=>$id]);
        DB::table('category')->insert(['category_name'=>'Sandalye','slug'=>'sandalye', 'up_id'=>$id]);
    }
}
