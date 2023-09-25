<?php

namespace App\Http\Modules\Test\Controllers;

use App\Domain\Test\Actions\TestAction;
use App\Http\Modules\Test\Resources\TestResource;

class TestController
{
    public function test(TestAction $action): TestResource
    {
        return TestResource::make($action->execute());
    }
}
