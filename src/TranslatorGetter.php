<?php declare(strict_types = 1);

namespace Orisai\TranslationContracts;

interface TranslatorGetter
{

	public function get(): Translator;

}
