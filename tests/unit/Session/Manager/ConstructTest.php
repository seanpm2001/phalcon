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

namespace Phalcon\Tests\Unit\Session\Manager;

use Phalcon\Session\Adapter\Noop;
use Phalcon\Session\Manager;
use Phalcon\Session\ManagerInterface;
use Phalcon\Tests\Fixtures\Session\ExtendedManager;
use Phalcon\Tests\AbstractUnitTestCase;
use SessionHandlerInterface;

final class ConstructTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Session\Manager :: __construct()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2018-11-13
     */
    public function testSessionManagerConstruct(): void
    {
        $manager = new Manager();

        $this->assertInstanceOf(ManagerInterface::class, $manager);
    }

    /**
     * Tests Phalcon\Session\Manager :: __construct() - extended
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-04-05
     * @issue  14933
     */
    public function testSessionManagerConstructExtended(): void
    {
        $manager = new ExtendedManager();

        $this->assertInstanceOf(ManagerInterface::class, $manager);

        $adapter = $manager->getAdapter();
        $this->assertInstanceOf(Noop::class, $adapter);
        $this->assertInstanceOf(SessionHandlerInterface::class, $adapter);
    }
}
