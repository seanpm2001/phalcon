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

namespace Phalcon\Tests\Unit\Image\Adapter\Imagick;

use Phalcon\Tests\Fixtures\Traits\ImagickTrait;
use Phalcon\Tests\AbstractUnitTestCase;

final class BlurTest extends AbstractUnitTestCase
{
    use ImagickTrait;

    /**
     * Tests Phalcon\Image\Adapter\Imagick :: blur()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2016-02-19
     */
    public function testImageAdapterImagickBlur(): void
    {
        $this->markTestSkipped('Need implementation');
    }
}
