<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Tests\Unit\Encryption\Security\JWT\Validator;

use Phalcon\Encryption\Security\JWT\Validator;
use Phalcon\Tests\Fixtures\Traits\JWTTrait;
use Phalcon\Tests\UnitTestCase;

final class ValidateIssuedAtTest extends UnitTestCase
{
    use JWTTrait;

    /**
     * Unit Tests Phalcon\Encryption\Security\JWT\Validator ::
     * validateIssuedAt()
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function testEncryptionSecurityJWTValidatorValidateIssuedAt(): void
    {
        $token     = $this->newToken();
        $timestamp = strtotime(("-1 day"));
        $validator = new Validator($token);
        $this->assertInstanceOf(Validator::class, $validator);

        $validator->validateIssuedAt($timestamp);

        $expected = ["Validation: the token cannot be used yet (future)"];
        $actual   = $validator->getErrors();
        $this->assertSame($expected, $actual);
    }
}