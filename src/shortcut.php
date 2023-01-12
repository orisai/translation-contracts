<?php declare(strict_types = 1);

namespace Orisai\TranslationContracts;

use function function_exists;

if (!function_exists('Orisai\TranslationContracts\t')) {

	/**
	 * @param literal-string           $id
	 * @param array<int|string, mixed> $parameters
	 */
	function t(string $id, array $parameters = [], ?string $locale = null): string
	{
		static $translator = null;

		if ($translator === null) {
			$translator = TranslatorHolder::getTranslator();
		}

		return $translator->translate($id, $parameters, $locale);
	}

}

if (!function_exists('Orisai\TranslationContracts\tm')) {

	function tm(Translatable $message, ?string $locale = null): string
	{
		static $translator = null;

		if ($translator === null) {
			$translator = TranslatorHolder::getTranslator();
		}

		return $translator->translate(
			$message->getId(),
			$message->getParameters(),
			$locale ?? $message->getLocale(),
		);
	}

}
