<?php declare(strict_types = 1);

namespace Orisai\TranslationContracts;

final class TranslatableMessage implements Translatable
{

	/** @var literal-string */
	private string $id;

	/** @var array<int|string, mixed> */
	private array $parameters;

	private ?string $locale;

	/**
	 * @param literal-string           $id
	 * @param array<int|string, mixed> $parameters
	 */
	public function __construct(string $id, array $parameters = [], ?string $locale = null)
	{
		$this->id = $id;
		$this->parameters = $parameters;
		$this->locale = $locale;
	}

	public function getId(): string
	{
		return $this->id;
	}

	public function getParameters(): array
	{
		return $this->parameters;
	}

	public function getLocale(): ?string
	{
		return $this->locale;
	}

	public function __serialize(): array
	{
		return [
			'id' => $this->id,
			'parameters' => $this->parameters,
			'locale' => $this->locale,
		];
	}

	public function __unserialize(array $data): void
	{
		$this->id = $data['id'];
		$this->parameters = $data['parameters'];
		$this->locale = $data['locale'];
	}

}
