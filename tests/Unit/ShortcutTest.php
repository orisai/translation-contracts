<?php declare(strict_types = 1);

namespace Tests\Orisai\TranslationContracts\Unit;

use Orisai\Exceptions\Logic\InvalidState;
use Orisai\TranslationContracts\SimpleTranslatorGetter;
use Orisai\TranslationContracts\TranslatableMessage;
use Orisai\TranslationContracts\TranslatorHolder;
use PHPUnit\Framework\TestCase;
use Tests\Orisai\TranslationContracts\Doubles\TestTranslatable;
use Tests\Orisai\TranslationContracts\Doubles\TestTranslator;
use function Orisai\TranslationContracts\t;
use function Orisai\TranslationContracts\tm;

/**
 * @runTestsInSeparateProcesses
 */
final class ShortcutTest extends TestCase
{

	public function testNotSet(): void
	{
		$this->expectException(InvalidState::class);
		$this->expectExceptionMessage(
			"Call 'Orisai\TranslationContracts\TranslatorHolder::setTranslatorGetter()' "
			. 'to use Orisai\TranslationContracts\TranslatorHolder::getTranslator(), '
			. 'Orisai\TranslationContracts\t() and Orisai\TranslationContracts\tm().',
		);

		t('test');
	}

	public function testTranslate(): void
	{
		$translator = new TestTranslator();
		TranslatorHolder::setTranslatorGetter(new SimpleTranslatorGetter($translator));

		self::assertSame('t_a', t('a'));
		self::assertSame('t_b', tm(new TranslatableMessage('b')));

		self::assertSame('t_a', t('a', ['p1' => 'v1']));
		self::assertSame('t_b', tm(new TranslatableMessage('b', ['p1' => 'v1'])));

		self::assertSame('t_a', t('a', [], 'en'));
		self::assertSame('t_b', tm(new TranslatableMessage('b', [], 'en')));
		self::assertSame('t_b', tm(new TranslatableMessage('b', []), 'en'));
		self::assertSame('t_b', tm(new TranslatableMessage('b', [], 'en'), 'cs'));

		self::assertSame('t_id', tm(new TestTranslatable()));

		self::assertSame(
			[
				['t_a', [], null],
				['t_b', [], null],
				['t_a', ['p1' => 'v1'], null],
				['t_b', ['p1' => 'v1'], null],
				['t_a', [], 'en'],
				['t_b', [], 'en'],
				['t_b', [], 'en'],
				['t_b', [], 'cs'],
				['t_id', ['a' => 'b'], 'cs'],
			],
			$translator->getTranslated(),
		);
	}

}
