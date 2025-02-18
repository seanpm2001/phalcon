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

namespace Phalcon\Tests\Unit\Http\Message\UploadedFileFactory;

use Phalcon\Http\Message\Factories\UploadedFileFactory;
use Phalcon\Http\Message\Interfaces\UploadedFileFactoryInterface;
use Phalcon\Tests\AbstractUnitTestCase;

final class ConstructTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Http\Message\ServerUploadedFileFactory :: __construct()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2019-02-08
     */
    public function testHttpUploadedFileFactoryConstruct(): void
    {
        $factory = new UploadedFileFactory();
        $class   = UploadedFileFactoryInterface::class;
        $this->assertInstanceOf($class, $factory);
    }
}
