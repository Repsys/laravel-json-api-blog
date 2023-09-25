<?php

namespace App\JsonApi\Blog;

use App\JsonApi\Blog\Comments\CommentSchema;
use App\JsonApi\Blog\Posts\PostSchema;
use App\JsonApi\Blog\Tags\TagSchema;
use App\JsonApi\Blog\Users\UserSchema;
use LaravelJsonApi\Core\Server\Server as BaseServer;

class Server extends BaseServer
{

    /**
     * The base URI namespace for this server.
     *
     * @var string
     */
    protected string $baseUri = '/api/blog';

    /**
     * Bootstrap the server when it is handling an HTTP request.
     *
     * @return void
     */
    public function serving(): void
    {
        // no-op
    }

    /**
     * Get the server's list of schemas.
     *
     * @return array
     */
    protected function allSchemas(): array
    {
        return [
            UserSchema::class,
            PostSchema::class,
            TagSchema::class,
            CommentSchema::class,
        ];
    }
}
