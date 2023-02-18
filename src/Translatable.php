<?php declare(strict_types = 1);

namespace Orisai\TranslationContracts;

interface Translatable
{

	/**
	 * @return literal-string
	 */
	public function getId(): string;

	/**
	 * @return array<int|string, mixed>
	 */
	public function getParameters(): array;

	public function getLocale(): ?string;

	/**
	 * @return array<int|string, mixed>
	 */
	public function __serialize(): array;

	/**
	 * @param array<int|string, mixed> $data
	 */
	public function __unserialize(array $data): void;

}
