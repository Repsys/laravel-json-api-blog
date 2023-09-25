<?php

namespace App\Domain\Test\Jobs;

use App\Domain\Support\Jobs\AbstractJob;
use Illuminate\Redis\Connections\Connection as RedisConnection;
use Illuminate\Redis\Connections\PredisConnection;
use Illuminate\Support\Facades\Redis;
use Throwable;

class TestJob extends AbstractJob
{
    /** @var PredisConnection */
    private RedisConnection $redis;

    public function __construct()
    {
//        $this->queue = 'test';
    }

    public function init()
    {
        $this->redis = Redis::resolve();
    }

    public function execute()
    {
        $this->log("Job started");

        $key = 'testkey';
        $this->redis->set($key, random_int(0, 10000));
        $this->log("Redis - " . $key . ' = ' . $this->redis->get($key));
        $this->redis->del($key);

        $this->log("Job ended");
    }

    public function handleException(Throwable $exception)
    {
        $this->log("Catch exception");
    }
}
