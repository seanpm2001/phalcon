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

namespace Phalcon\Tests\Unit\Session\Bag;

use Phalcon\Session\Bag;
use Phalcon\Tests\Fixtures\Traits\DiTrait;
use Phalcon\Tests\AbstractUnitTestCase;

/**
 * Class SerializeTest extends AbstractUnitTestCase
 *
 * @package Phalcon\Tests\Unit\Session\Bag
 */
final class SerializeTest extends AbstractUnitTestCase
{
    use DiTrait;

    /**
     * Tests Phalcon\Session\Bag :: serialize()
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function testSessionBagSerialize(): void
    {
        $this->setNewFactoryDefault();
        $this->setDiService('sessionStream');
        $data = [
            'one'   => 'two',
            'three' => 'four',
            'five'  => 'six',
        ];

        $collection = new Bag($this->container->get("session"), 'BagTest');

        $collection->init($data);

        $expected = serialize($data);
        $actual   = $collection->serialize();
        $this->assertEquals($expected, $actual);
    }
}
