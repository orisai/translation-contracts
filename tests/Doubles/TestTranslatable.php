<?php declare(strict_types = 1);

namespace Tests\Orisai\TranslationContracts\Doubles;

use Orisai\TranslationContracts\Translatable;

final class TestTranslatable implements Translatable
{

	public function getId(): string
	{
		return 'id';
	}

	public function getParameters(): array
	{
		return ['a' => 'b'];
	}

	public function getLocale(): ?string
	{
		return 'cs';
	}

}
