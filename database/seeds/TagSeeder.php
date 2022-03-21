<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['vegan','pesce','carne','gluten-free'];
        foreach($tags as $tag_name){
            $new_tag = new tag();
            $new_tag->name = $tag_name;
            $new_tag->slug = Str::of($tag_name)->slug('-');
            $new_tag->save();
        }
    }
}
