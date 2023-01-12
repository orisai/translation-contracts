<?php declare(strict_types = 1);

namespace Orisai\TranslationContracts;

interface Translator
{

	/**
	 * @param literal-string           $id
	 * @param array<int|string, mixed> $parameters
	 */
	public function translate(string $id, array $parameters = [], ?string $locale = null): string;

	public function translateMessage(Translatable $message, ?string $locale = null): string;

}
