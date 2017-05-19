<?php

namespace App\Models;

class ArticleModel
{
    private $id;
    private $title;
    private $content;
    private $date;
    private $author;


    public function __construct(int $id, string $title, string $content, string $date, string $author)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
        $this->author = $author;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }
}