<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Monolog\Handler\AmqpHandler;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Postold
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function (){ // les post sont stockés indéfiniment
            return collect(File::files(resource_path("posts")))
                ->map(fn($file) => YamlFrontMatter::parseFile($file)) //lis chaque poste et crée un document
                ->map(fn($document) => new Postold( // utilise le document créer chaque objet post
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                ))
                ->sortByDesc('date');
        });
        // cache()->forget(key) pour supprimer le cache

    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug); // retourne le poste correspondant au slug passé

    }

    public static function findOrFail($slug){
        return static::find($slug) ?? throw new ModelNotFoundException();
    }
}
