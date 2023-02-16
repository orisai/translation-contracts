<h1 align="center">
	<img src="https://github.com/orisai/.github/blob/main/images/repo_title.png?raw=true" alt="Orisai"/>
	<br/>
	Translation Contracts
</h1>

<p align="center">
    Interface for translator and translatable messages
</p>

<p align="center">
	📄 Check out our <a href="docs/README.md">documentation</a>.
</p>

<p align="center">
	💸 If you like Orisai, please <a href="https://orisai.dev/sponsor">make a donation</a>. Thank you!
</p>

<p align="center">
	<a href="https://github.com/orisai/translation-contracts/actions?query=workflow%3ACI">
		<img src="https://github.com/orisai/translation-contracts/workflows/CI/badge.svg">
	</a>
	<a href="https://coveralls.io/r/orisai/translation-contracts">
		<img src="https://badgen.net/coveralls/c/github/orisai/translation-contracts/v1.x?cache=300">
	</a>
	<a href="https://dashboard.stryker-mutator.io/reports/github.com/orisai/translation-contracts/v1.x">
		<img src="https://badge.stryker-mutator.io/github.com/orisai/translation-contracts/v1.x">
	</a>
	<a href="https://packagist.org/packages/orisai/translation-contracts">
		<img src="https://badgen.net/packagist/dt/orisai/translation-contracts?cache=3600">
	</a>
	<a href="https://packagist.org/packages/orisai/translation-contracts">
		<img src="https://badgen.net/packagist/v/orisai/translation-contracts?cache=3600">
	</a>
	<a href="https://choosealicense.com/licenses/mpl-2.0/">
		<img src="https://badgen.net/badge/license/MPL-2.0/blue?cache=3600">
	</a>
<p>

##

```php
use Orisai\TranslationContracts\Translator;
assert($translator instanceof Translator);
$translator->translate('message.id', ['parameter' => 'value']);  // string (translated message)

// Or

use function Orisai\TranslationContracts\t;
t('message.id', ['parameter' => 'value']); // string (translated message)
```
