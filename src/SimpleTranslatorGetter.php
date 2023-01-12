<?php declare(strict_types = 1);

namespace Orisai\TranslationContracts;

final class SimpleTranslatorGetter implements TranslatorGetter
{

	private Translator $translator;

	public function __construct(Translator $translator)
	{
		$this->translator = $translator;
	}

	public function get(): Translator
	{
		return $this->translator;
	}

}
