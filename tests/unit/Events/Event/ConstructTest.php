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

namespace Phalcon\Tests\Unit\Events\Event;

use Phalcon\Events\Event;
use Phalcon\Events\EventInterface;
use Phalcon\Tests\AbstractUnitTestCase;

final class ConstructTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Events\Event :: __construct()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-06
     * @issue  https://github.com/phalcon/cphalcon/issues/15133
     */
    public function testEventsEventConstruct(): void
    {
        $event = new Event('test', $this);

        $class = EventInterface::class;
        $this->assertInstanceOf($class, $event);

        $event = new Event('test');

        $class = EventInterface::class;
        $this->assertInstanceOf($class, $event);
    }
}
