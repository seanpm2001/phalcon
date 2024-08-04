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

namespace Phalcon\Tests\Unit\Logger\Adapter\Syslog;

use Phalcon\Logger\Adapter\Syslog;
use Phalcon\Tests\UnitTestCase;

final class RollbackTest extends UnitTestCase
{
    /**
     * Tests Phalcon\Logger\Adapter\Syslog :: rollback()
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function testLoggerAdapterSyslogRollback(): void
    {
        $streamName = $this->getNewFileName('log', 'log');

        $adapter = new Syslog($streamName);

        $adapter->begin();

        $this->assertTrue(
            $adapter->inTransaction()
        );

        $adapter->rollback();

        $this->assertFalse(
            $adapter->inTransaction()
        );
    }
}