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

namespace Phalcon\Tests\Fixtures\Annotations;

/**
 * This class has annotations but it's in a namespace
 *
 * @Simple
 * @SingleParam("Param")
 * @MultipleParams("First", Second, 1, 1.1, -10, false, true, null)
 * @Params({"key1", "key2", "key3"});
 * @HashParams({"key1": "value", "key2": "value", "key3": "value"});
 * @NamedParams(first=some, second=other);
 * @AlternativeNamedParams(first: some, second: other);
 * @AlternativeHashParams({key1="value", "key2"=value, "key3"="value"});
 * @RecursiveHash({key1="value", "key2"=value, "key3"=[1, 2, 3, 4]});
 */
class AnnotationsTestClassNs
{
}
