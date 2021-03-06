<?php

declare(strict_types=1);

namespace Vitkuz573\FreeId\Tests;

use PHPUnit\Framework\TestCase;
use Vitkuz573\FreeId\Parsers\File\Json;

final class JsonTest extends TestCase
{
    /** @test */
    public function testJson(): void
    {
        $free_id = new Json(__DIR__.'/files/test.json', 'nodes');
        $this->assertTrue($free_id->find() === 3);
    }
}
