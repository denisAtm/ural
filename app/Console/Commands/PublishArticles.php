<?php

namespace App\Console\Commands;

use App\Models\Articles;
use Illuminate\Console\Command;

class PublishArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'articles:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish articles when publish_at < then now()';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $articles = Articles::where('status_id','5')->get();
        foreach($articles as $article){
            if($article->publish_at < now()){
                $article->status_id = 1;
                $article->save();
                \Log::info("Article id=".$article->id." published");
            }
        }
    }
}
