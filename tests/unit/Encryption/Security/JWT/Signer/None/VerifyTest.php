<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Tests\Unit\Encryption\Security\JWT\Signer\None;

use Phalcon\Encryption\Security\JWT\Signer\None;
use Phalcon\Tests\AbstractUnitTestCase;

final class VerifyTest extends AbstractUnitTestCase
{
    /**
     * Unit Tests Phalcon\Encryption\Security\JWT\Signer\None :: verify()
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function testEncryptionSecurityJWTSignerNoneVerify(): void
    {
        $signer = new None();

        $payload    = 'test payload';
        $passphrase = '12345';

        $actual = $signer->verify('', $payload, $passphrase);
        $this->assertTrue($actual);
    }
}
