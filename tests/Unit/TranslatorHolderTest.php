<?php declare(strict_types = 1);

namespace Tests\Orisai\TranslationContracts\Unit;

use Orisai\Exceptions\Logic\InvalidState;
use Orisai\TranslationContracts\SimpleTranslatorGetter;
use Orisai\TranslationContracts\TranslatorHolder;
use PHPUnit\Framework\TestCase;
use Tests\Orisai\TranslationContracts\Doubles\TestTranslator;

/**
 * @runTestsInSeparateProcesses
 */
final class TranslatorHolderTest extends TestCase
{

	public function testNotSet(): void
	{
		$this->expectException(InvalidState::class);
		$this->expectExceptionMessage(
			"Call 'Orisai\TranslationContracts\TranslatorHolder::setTranslatorGetter()' "
			. 'to use Orisai\TranslationContracts\TranslatorHolder::getTranslator(), '
			. 'Orisai\TranslationContracts\t() and Orisai\TranslationContracts\tm().',
		);

		TranslatorHolder::getTranslator();
	}

	public function testSet(): void
	{
		$translator = new TestTranslator();

		TranslatorHolder::setTranslatorGetter(new SimpleTranslatorGetter($translator));
		self::assertSame($translator, TranslatorHolder::getTranslator());
	}

}
