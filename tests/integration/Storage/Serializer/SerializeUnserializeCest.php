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

namespace Phalcon\Tests\Integration\Storage\Serializer;

use Codeception\Example;
use IntegrationTester;
use Phalcon\Storage\Serializer\Base64;
use Phalcon\Storage\Serializer\Igbinary;
use Phalcon\Storage\Serializer\Json;
use Phalcon\Storage\Serializer\MemcachedIgbinary;
use Phalcon\Storage\Serializer\MemcachedJson;
use Phalcon\Storage\Serializer\MemcachedPhp;
use Phalcon\Storage\Serializer\Msgpack;
use Phalcon\Storage\Serializer\None;
use Phalcon\Storage\Serializer\Php;
use Phalcon\Storage\Serializer\RedisIgbinary;
use Phalcon\Storage\Serializer\RedisJson;
use Phalcon\Storage\Serializer\RedisMsgpack;
use Phalcon\Storage\Serializer\RedisNone;
use Phalcon\Storage\Serializer\RedisPhp;
use stdClass;

use function igbinary_serialize;
use function json_encode;
use function serialize;

class SerializeUnserializeCest
{
    /**
     * Tests Phalcon\Storage\Serializer\Igbinary :: serialize()
     *
     * @dataProvider getExamples
     *
     * @param IntegrationTester $I
     * @param Example           $example
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2022-02-24
     */
    public function storageSerializerSerializeUnserialize(
        IntegrationTester $I,
        Example $example
    ) {

        $label    = $example[0];
        $type     = $example[1];
        $class    = $example[2];
        $data     = $example[3];
        $expected = $example[4];

        $I->wantToTest(
            'Storage\Serializer\\' . $label . ' - serialize()/unserialize() - ' . $type
        );

        $serializer = new $class($data);
        $serialized = $serializer->serialize();

        $actual = $serialized;
        $I->assertSame($expected, $actual);

        $serializer = new $class();
        $serializer->unserialize($serialized);

        /**
         * assertEquals here because stdClass will not refer to the same
         * object when unserialized
         */
        $expected = $data;
        $actual   = $serializer->getData();
        $I->assertEquals($expected, $actual);
    }

    /**
     * @return array[]
     */
    private function getExamples(): array
    {
        $stdClass = new stdClass();

        return [
            [
                'Base64',
                'string',
                Base64::class,
                'Phalcon Framework',
                base64_encode('Phalcon Framework'),
            ],
            [
                'Igbinary',
                'null',
                Igbinary::class,
                null,
                null,
            ],
            [
                'Igbinary',
                'true',
                Igbinary::class,
                true,
                true,
            ],
            [
                'Igbinary',
                'false',
                Igbinary::class,
                false,
                false,
            ],
            [
                'Igbinary',
                'integer',
                Igbinary::class,
                1234,
                1234,
            ],
            [
                'Igbinary',
                'float',
                Igbinary::class,
                1.234,
                1.234,
            ],
            [
                'Igbinary',
                'string',
                Igbinary::class,
                'Phalcon Framework',
                igbinary_serialize('Phalcon Framework'),
            ],
            [
                'Igbinary',
                'array',
                Igbinary::class,
                ['Phalcon Framework'],
                igbinary_serialize(['Phalcon Framework']),
            ],
            [
                'Igbinary',
                'object',
                Igbinary::class,
                $stdClass,
                igbinary_serialize($stdClass),
            ],
            [
                'Json',
                'null',
                Json::class,
                null,
                null,
            ],
            [
                'Json',
                'true',
                Json::class,
                true,
                true,
            ],
            [
                'Json',
                'false',
                Json::class,
                false,
                false,
            ],
            [
                'Json',
                'integer',
                Json::class,
                1234,
                1234,
            ],
            [
                'Json',
                'float',
                Json::class,
                1.234,
                1.234,
            ],
            [
                'Json',
                'string',
                Json::class,
                'Phalcon Framework',
                json_encode('Phalcon Framework'),
            ],
            [
                'Json',
                'array',
                Json::class,
                ['Phalcon Framework'],
                json_encode(['Phalcon Framework']),
            ],
            [
                'MemcachedIgbinary',
                'null',
                MemcachedIgbinary::class,
                null,
                null,
            ],
            [
                'MemcachedJson',
                'null',
                MemcachedJson::class,
                null,
                null,
            ],
            [
                'MemcachedPhp',
                'null',
                MemcachedPhp::class,
                null,
                null,
            ],
            [
                'Msgpack',
                'null',
                Msgpack::class,
                null,
                null,
            ],
            [
                'Msgpack',
                'true',
                Msgpack::class,
                true,
                true,
            ],
            [
                'Msgpack',
                'false',
                Msgpack::class,
                false,
                false,
            ],
            [
                'Msgpack',
                'integer',
                Msgpack::class,
                1234,
                1234,
            ],
            [
                'Msgpack',
                'float',
                Msgpack::class,
                1.234,
                1.234,
            ],
            [
                'Msgpack',
                'string',
                Msgpack::class,
                'Phalcon Framework',
                msgpack_pack('Phalcon Framework'),
            ],
            [
                'Msgpack',
                'array',
                Msgpack::class,
                ['Phalcon Framework'],
                msgpack_pack(['Phalcon Framework']),
            ],
            [
                'Msgpack',
                'object',
                Msgpack::class,
                $stdClass,
                msgpack_pack($stdClass),
            ],
            [
                'None',
                'null',
                None::class,
                null,
                null,
            ],
            [
                'None',
                'true',
                None::class,
                true,
                true,
            ],
            [
                'None',
                'false',
                None::class,
                false,
                false,
            ],
            [
                'None',
                'integer',
                None::class,
                1234,
                1234,
            ],
            [
                'None',
                'float',
                None::class,
                1.234,
                1.234,
            ],
            [
                'None',
                'string',
                None::class,
                'Phalcon Framework',
                'Phalcon Framework',
            ],
            [
                'None',
                'array',
                None::class,
                ['Phalcon Framework'],
                ['Phalcon Framework'],
            ],
            [
                'None',
                'object',
                None::class,
                $stdClass,
                $stdClass,
            ],
            [
                'Php',
                'null',
                Php::class,
                null,
                null,
            ],
            [
                'Php',
                'true',
                Php::class,
                true,
                true,
            ],
            [
                'Php',
                'false',
                Php::class,
                false,
                false,
            ],
            [
                'Php',
                'integer',
                Php::class,
                1234,
                1234,
            ],
            [
                'Php',
                'float',
                Php::class,
                1.234,
                1.234,
            ],
            [
                'Php',
                'string',
                Php::class,
                'Phalcon Framework',
                serialize('Phalcon Framework'),
            ],
            [
                'Php',
                'array',
                Php::class,
                ['Phalcon Framework'],
                serialize(['Phalcon Framework']),
            ],
            [
                'Php',
                'object',
                Php::class,
                $stdClass,
                serialize($stdClass),
            ],
            [
                'RedisIgbinary',
                'null',
                RedisIgbinary::class,
                null,
                null,
            ],
            [
                'RedisJson',
                'null',
                RedisJson::class,
                null,
                null,
            ],
            [
                'RedisMsgpack',
                'null',
                RedisMsgpack::class,
                null,
                null,
            ],
            [
                'RedisNone',
                'null',
                RedisNone::class,
                null,
                null,
            ],
            [
                'RedisPhp',
                'null',
                RedisPhp::class,
                null,
                null,
            ],
        ];
    }
}
