<?php declare(strict_types = 1);

namespace Tests\Orisai\TranslationContracts\Unit;

use Orisai\TranslationContracts\TranslatableMessage;
use PHPUnit\Framework\TestCase;
use function serialize;
use function unserialize;

final class TranslatableMessageTest extends TestCase
{

	public function testBasic(): void
	{
		$message = new TranslatableMessage('id');

		self::assertSame('id', $message->getId());
		self::assertSame([], $message->getParameters());
		self::assertNull($message->getLocale());
		self::assertEquals($message, unserialize(serialize($message)));
	}

	public function testSerializationBC(): void
	{
		// phpcs:ignore SlevomatCodingStandard.Files.LineLength.LineTooLong
		$serialized = 'O:47:"Orisai\TranslationContracts\TranslatableMessage":3:{s:2:"id";s:2:"id";s:10:"parameters";a:1:{s:6:"apples";i:3;}s:6:"locale";s:5:"cs-CZ";}';
		$message = unserialize($serialized);

		self::assertInstanceOf(TranslatableMessage::class, $message);
		self::assertSame('id', $message->getId());
		self::assertSame(['apples' => 3], $message->getParameters());
		self::assertSame($message->getLocale(), 'cs-CZ');
	}

	public function testSpecifyLanguage(): void
	{
		$message = new TranslatableMessage('id', ['apples' => 3], 'cs-CZ');

		self::assertSame('id', $message->getId());
		self::assertSame(['apples' => 3], $message->getParameters());
		self::assertSame($message->getLocale(), 'cs-CZ');
		self::assertEquals($message, unserialize(serialize($message)));
	}

}
