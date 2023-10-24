<?php

declare(strict_types=1);

namespace App\UseCase;

use App\Entity\Article;
use app\Repository\ArticleRepository;
use app\Repository\UserRepository;

class CreateArticleUseCase
{
    /**
     * @param UserRepository $userRepository
     * @param ArticleRepository $articleRepository
     */
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly ArticleRepository $articleRepository
    ) {}

    /**
     * @param object $createArticleDto
     * @return void
     * @throws \Exception
     */
    public function execute(object $createArticleDto): void
    {
        $pdo = new \PDO('');

        $pdo->beginTransaction();

        try {
            $accessUser = $this->userRepository->findById($createArticleDto->userId);

            if (!$accessUser) {
                throw new \Exception('Not Found User');
            }

            if (!$accessUser->isSubscriber()) {
                throw new \Exception('Permission Denied');
            }

            $article = new Article(
                articleId: 'uuidを作成したことにして欲しい',
                title: $createArticleDto->title,
                body: $createArticleDto->body,
                author: $accessUser
            );

            $this->articleRepository->save($article);

            $pdo->commit();
        } catch (\Exception $exception) {
            $pdo->rollBack();
            throw $exception;
        }
    }
}
