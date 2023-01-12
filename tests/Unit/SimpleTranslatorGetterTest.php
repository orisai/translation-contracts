<?php declare(strict_types = 1);

namespace Tests\Orisai\TranslationContracts\Unit;

use Orisai\TranslationContracts\SimpleTranslatorGetter;
use PHPUnit\Framework\TestCase;
use Tests\Orisai\TranslationContracts\Doubles\TestTranslator;

final class SimpleTranslatorGetterTest extends TestCase
{

	public function test(): void
	{
		$translator = new TestTranslator();
		$getter = new SimpleTranslatorGetter($translator);

		self::assertSame($translator, $getter->get());
	}

}
