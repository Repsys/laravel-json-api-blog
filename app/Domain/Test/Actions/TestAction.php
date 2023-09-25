<?php

namespace App\Domain\Test\Actions;

use App\Domain\Test\Jobs\TestJob;

class TestAction
{
    public function execute(): array
    {
        TestJob::dispatch();

        return [
            'Hello' => 'World'
        ];
    }
}
