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

namespace Phalcon\Tests\Unit\Http\Message\Uri;

use Phalcon\Http\Message\Uri;
use Phalcon\Tests\AbstractUnitTestCase;

final class GetPortTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Http\Message\Uri :: getPort()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2019-02-09
     */
    public function testHttpMessageUriGetPort(): void
    {
        $query = 'https://phalcon:secret@dev.phalcon.ld:8080/action?param=value#frag';
        $uri   = new Uri($query);

        $expected = 8080;
        $actual   = $uri->getPort();
        $this->assertSame($expected, $actual);
    }

    /**
     * Tests Phalcon\Http\Message\Uri :: getPort() - empty
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2019-02-07
     */
    public function testHttpUriGetPortEmpty(): void
    {
        $query = 'https://phalcon:secret@dev.phalcon.ld/action?param=value';
        $uri   = new Uri($query);

        $actual = $uri->getPort();
        $this->assertNull($actual);
    }
}
