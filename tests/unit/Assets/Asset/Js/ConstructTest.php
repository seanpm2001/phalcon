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

namespace Phalcon\Tests\Unit\Assets\Asset\Js;

use Codeception\Example;
use Phalcon\Assets\Asset\Js;
use Phalcon\Tests\Fixtures\Traits\AssetsTrait;
use Phalcon\Tests\UnitTestCase;

final class ConstructTest extends UnitTestCase
{
    use AssetsTrait;

    /**
     * Tests Phalcon\Assets\Asset\Js :: __construct() - local
     *
     * @dataProvider providerJs
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2020-09-09
     */
    public function testAssetsAssetJsConstructLocal(
        string $path,
        bool $local
    ): void {
        $asset = new Js($path, $local);

        $expected = $local;
        $actual   = $asset->isLocal();

        $this->assertSame($expected, $actual);
    }

    /**
     * Tests Phalcon\Assets\Asset\Js :: __construct() - filter
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function testAssetsAssetJsConstructFilter(): void
    {
        $asset = new Js('js/jquery.js');

        $actual = $asset->getFilter();
        $this->assertTrue($actual);
    }

    /**
     * Tests Phalcon\Assets\Asset\Js :: __construct() - filter set
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function testAssetsAssetJsConstructFilterSet(): void
    {
        $asset = new Js('js/jquery.js', true, false);

        $actual = $asset->getFilter();
        $this->assertFalse($actual);
    }

    /**
     * Tests Phalcon\Assets\Asset\Js :: __construct() - attributes
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function testAssetsAssetJsConstructAttributes(): void
    {
        $asset = new Js('js/jquery.js');

        $expected = [];
        $actual   = $asset->getAttributes();
        $this->assertSame($expected, $actual);
    }

    /**
     * Tests Phalcon\Assets\Asset\Js :: __construct() - attributes set
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function testAssetsAssetJsConstructAttributesSet(): void
    {
        $attributes = [
            'data' => 'phalcon',
        ];

        $asset = new Js(
            'js/jquery.js',
            true,
            true,
            $attributes
        );

        $expected = $attributes;
        $actual   = $asset->getAttributes();
        $this->assertSame($expected, $actual);
    }
}