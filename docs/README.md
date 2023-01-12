# Translation Contracts

Interface for translator and translatable messages

## Content

- [Setup](#setup)
- [Translator](#translator)
- [Translatable](#translatable)
- [Shortcut](#shortcut)

## Setup

Install with [Composer](https://getcomposer.org)

```sh
composer require orisai/translation-contracts
```

## Translator

`Translator` is an interface for translating message identifiers

```php
use Orisai\TranslationContracts\Translator;

assert($translator instanceof Translator);

$translator->translate('message.id'); // string
$translator->translate('message.id', ['parameter' => 'value'], 'en');
```

## Translatable

`TranslatableMessage` is an object that may be translated later, via `Translator->translate()`

```php
use Orisai\TranslationContracts\TranslatableMessage;

$message = new TranslatableMessage('message.id');
$message = new TranslatableMessage('message.id', ['parameter' => 'value'], 'en');

$translator->translateMessage($message); // string
$translator->translateMessage($message, /* overrides locale from message */ 'en'); // string
```

As an alternative to `TranslatableMessage` we may implement `Translatable` interface

```php
$translator->translateMessage(new Example());
```

## Shortcut

Shortcuts for calling `Translator->translate()` and `Translator->translateMessage()`

```php
use Orisai\TranslationContracts\TranslatableMessage;
use function Orisai\TranslationContracts\t;
use function Orisai\TranslationContracts\tm;

t('message.id'); // string
t('message.id', ['parameter' => 'value'], 'en'); // string

tm(new TranslatableMessage('message.id')); // string
tm(new TranslatableMessage('message.id'), 'en'); // string
```

Shortcuts are set up via `TranslatorHolder`

```php
use Orisai\TranslationContracts\SimpleTranslatorGetter;
use Orisai\TranslationContracts\TranslatorHolder;

TranslatorHolder::setTranslatorGetter(new SimpleTranslatorGetter($translator));
```

`SimpleTranslatorGetter` may be replaced by lazy `TranslatorGetter` implementation
