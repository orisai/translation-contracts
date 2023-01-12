<?php declare(strict_types = 1);

namespace Tests\Orisai\TranslationContracts\Doubles;

use Orisai\TranslationContracts\Translatable;
use Orisai\TranslationContracts\Translator;

final class TestTranslator implements Translator
{

	/** @var array<array{string, array<int|string, mixed>, string|null}> */
	private array $translated = [];

	public function translate(string $id, array $parameters = [], ?string $locale = null): string
	{
		$id = "t_$id";
		$this->translated[] = [$id, $parameters, $locale];

		return $id;
	}

	public function translateMessage(Translatable $message, ?string $locale = null): string
	{
		return $this->translate(
			$message->getId(),
			$message->getParameters(),
			$locale ?? $message->getLocale(),
		);
	}

	/**
	 * @return array<array{string, array<int|string, mixed>, string|null}>
	 */
	public function getTranslated(): array
	{
		return $this->translated;
	}

}
