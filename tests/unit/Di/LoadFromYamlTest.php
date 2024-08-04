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

namespace Phalcon\Tests\Unit\Di;

use Phalcon\Config\Config;
use Phalcon\Config\ConfigInterface;
use Phalcon\Di\Di;
use Phalcon\Di\Exception;
use Phalcon\Tests\UnitTestCase;

class LoadFromYamlTest extends UnitTestCase
{
    /**
     * Unit Tests Phalcon\Di :: loadFromYaml()
     *
     * @return void
     *
     * @throws Exception
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2019-09-09
     */
    public function testDiLoadFromYaml(): void
    {
        $container = new Di();

        // load yaml
        $container->loadFromYaml(dataDir('fixtures/Di/services.yml'));

        // there are 3
        $this->assertCount(3, $container->getServices());

        // check some services
        $actual = $container->get('config');
        $this->assertInstanceOf(Config::class, $actual);
        $this->assertInstanceOf(ConfigInterface::class, $actual);

        $this->assertTrue($container->has('config'));
        $this->assertTrue($container->has('unit-test'));
        $this->assertTrue($container->has('component'));
    }
}