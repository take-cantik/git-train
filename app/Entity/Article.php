<?php

namespace App\Entity;

class Article
{
    /**
     * @param string $articleId
     * @param string $title
     * @param string $body
     * @param User $author
     */
    public function __construct(
        public string $articleId,
        public string $title,
        public string $body,
        public User $author
    ) {}
}