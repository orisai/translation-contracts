<?php declare(strict_types = 1);

namespace Tests\Orisai\TranslationContracts\Unit;

use Orisai\TranslationContracts\TranslatableMessage;
use PHPUnit\Framework\TestCase;

final class TranslatableMessageTest extends TestCase
{

	public function testBasic(): void
	{
		$message = new TranslatableMessage('id');

		self::assertSame('id', $message->getId());
		self::assertSame([], $message->getParameters());
		self::assertNull($message->getLocale());
	}

	public function testSpecifyLanguage(): void
	{
		$message = new TranslatableMessage('id', ['apples' => 3], 'cs-CZ');

		self::assertSame('id', $message->getId());
		self::assertSame(['apples' => 3], $message->getParameters());
		self::assertSame($message->getLocale(), 'cs-CZ');
	}

}
