<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Tests\Unit\Support\Debug;

use Phalcon\Support\Debug;
use Phalcon\Support\Debug\Exception;
use Phalcon\Tests\AbstractUnitTestCase;
use PHPUnit\Framework\Attributes\Test;

final class HaltTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Debug :: halt()
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    #[Test]
    public function testSupportDebugHalt(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Halted request');
        $debug = new Debug();
        $debug->halt();
    }
}
