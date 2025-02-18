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

namespace Phalcon\Tests\Unit\Support\Helper\Str;

use Phalcon\Support\Helper\Str\Suffix;
use Phalcon\Tests\AbstractUnitTestCase;
use PHPUnit\Framework\Attributes\Test;

final class SuffixTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Support\Helper\Str :: suffix()
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    #[Test]
    public function testSupportHelperStrSuffix(): void
    {
        $object = new Suffix();

        $expected = 'ClassConstants';
        $actual   = $object('Class', 'Constants');
        $this->assertSame($expected, $actual);
    }
}
