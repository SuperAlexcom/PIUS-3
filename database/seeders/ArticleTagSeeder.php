<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;

class ArticleTagSeeder extends Seeder
{
    public function run()
    {
        
        $articles = Article::all(); // из таблицы Article получаю все записи
        $tags = Tag::all(); // аналогично

        
        foreach ($articles as $article) { // прохожусь по каждой статье и связываю ее с несколькими тегами
            // случайное количество тегов (от 1 до 3)
            $randomTagIds = $tags->random(rand(1, 3))->pluck('id')->toArray(); // создаю массив со случайными айди тегов


            // связываю статью с выбранными тегами с помощью метода
            $article->tags()->sync($randomTagIds);
        }
    }
}