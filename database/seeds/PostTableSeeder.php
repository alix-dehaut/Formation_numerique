<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
    	//on vide le storage
    	// !!!! Attention à bien configurer le fichier config/filesystems!!!!
    	Storage::disk('local')->delete(Storage::allFiles());

        //creations des categories
        App\Category::create([
    		'name'=> 'HTMl5/CSS3'
    	]);
    	App\Category::create([
    		'name'=> 'Javascript'
    	]);
    	App\Category::create([
    		'name'=> 'PHP'
    	]);
    	App\Category::create([
    		'name'=> 'Wordpress'
    	]);
    	App\Category::create([
    		'name'=> 'Laravel'
    	]);

    	//création des posts
        factory(App\Post::class, 15)->create()->each(function($post){

        	//association d'une categorie à un post
        	$category= App\Category::find(rand(1,5));
        	$post->category()->associate($category);
        	$post->save();

        	//création images
        	$link= str_random(12).'.jpg';
        	$file= file_get_contents('http://placeimg.com/250/250/tech'. rand(1,15));
        	Storage::disk('local')->put($link, $file);

        	$post->picture()->create([
        		'title'=>'Default',
        		'link'=>$link
        	]);
        	
    	});
	}
}
