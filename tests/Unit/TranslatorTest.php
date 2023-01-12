<?php declare(strict_types = 1);

namespace Tests\Orisai\TranslationContracts\Unit;

use Orisai\TranslationContracts\TranslatableMessage;
use PHPUnit\Framework\TestCase;
use Tests\Orisai\TranslationContracts\Doubles\TestTranslatable;
use Tests\Orisai\TranslationContracts\Doubles\TestTranslator;

final class TranslatorTest extends TestCase
{

	public function test(): void
	{
		$translator = new TestTranslator();

		self::assertSame('t_a', $translator->translate('a', ['b' => 'c'], 'en-US'));
		self::assertSame('t_b', $translator->translateMessage(new TranslatableMessage('b')));
		self::assertSame('t_id', $translator->translateMessage(new TestTranslatable()));

		self::assertSame(
			[
				['t_a', ['b' => 'c'], 'en-US'],
				['t_b', [], null],
				['t_id', ['a' => 'b'], 'cs'],
			],
			$translator->getTranslated(),
		);
	}

}
