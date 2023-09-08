# Discord Webhook Client

## Badges

### Source Code

[![Documentation](https://badgen.net/static/link/documentation?icon=github&color=blue)](./docs/)

![Source Code](https://img.shields.io/badge/enterv%2Fdiscord-webhooks?label=source&link=https%3A%2F%2Fgithub.com%2FEnterVPL%2Fdiscord-webhooks%2Fblob%2Fmaster%2Fcomposer.json&logo=github) ![GitHub tag (with filter)](https://img.shields.io/github/v/tag/entervpl/discord-webhooks?logo=github) ![GitHub last commit (by committer)](https://img.shields.io/github/last-commit/EnterVPL/discord-webhooks?logo=github)

[![Total Downloads](https://badgen.net/packagist/dt/enterv/discord-webhooks?icon=github)](https://packagist.org/packages/enterv/discord-webhooks) [![License](https://badgen.net/github/license/entervpl/discord-webhooks?icon=github)](https://packagist.org/packages/enterv/discord-webhooks) [![PHP Version Require](https://badgen.net/packagist/php/enterv/discord-webhooks?color=purple&icon)](https://packagist.org/packages/enterv/discord-webhooks)

### Latest Version

[![Latest Stable Version](https://badgen.net/github/release/entervpl/discord-webhooks/stable?icon=php&label=stable)](https://packagist.org/packages/enterv/discord-webhooks) [![Latest Unstable Version](https://badgen.net/packagist/v/enterv/discord-webhooks/pre?icon=php&label=unstable&color=orange)](https://packagist.org/packages/enterv/discord-webhooks)

### Actions

![Static analysis](https://github.com/EnterVPL/discord-webhooks/workflows/Static%20analysis/badge.svg)

## Table of Contents

- [Discord Webhook Client](#discord-webhook-client)
  - [Badges](#badges)
    - [Source Code](#source-code)
    - [Latest Version](#latest-version)
    - [Actions](#actions)
  - [Table of Contents](#table-of-contents)
  - [Getting Started](#getting-started)
    - [Requirements](#requirements)
    - [Install via composer](#install-via-composer)
  - [Simple Example](#simple-example)
  - [License](#license)
  - [Contributing](#contributing)
  - [Other examples](#other-examples)
    - [Only meesage without embeds](#only-meesage-without-embeds)
    - [Message Builder Example](#message-builder-example)
    - [Docs and examples](#docs-and-examples)

## Getting Started

### Requirements

- [PHP](https://www.php.net/) >= 8.1
- [Composer](https://getcomposer.org/)

### Install via composer

```shell
composer require enterv/discord-webhooks
```

## Simple Example

```php
<?php
use EnterV\DiscordWebhooks\Embed;
use EnterV\DiscordWebhooks\Payload;
use EnterV\DiscordWebhooks\WebhookClient;

// Create embed
$embed = new Embed();
$embed->setDescription('This is an embed'); // with description

$url = 'DISCORD_WEBHOOK_URL'; // Put your discord webhook url

// Create Payload
$payload = new Payload();
$payload->setUsername('Example Webhook Bot') // Change discord bot webhook username
    ->setMessage('This is a message') // Some text before embed
    ->addEmbed($embed) // Add embed
;

// New discord webhook client
$webhook = new WebhookClient();
// Send message
$webhook->send($url, $payload);
```

## License

The project is MIT licensed. To read the full license, open [LICENSE.md](LICENSE.md).

## Contributing

Pull requests and issues are open!

## Other examples

### Only meesage without embeds

```php
<?php
use EnterV\DiscordWebhooks\Payload;
use EnterV\DiscordWebhooks\WebhookClient;

$url = 'DISCORD_WEBHOOK_URL'; // Put your discord webhook url

// Create Payload
$payload = new Payload();
$payload->setMessage('This is a message'); // Some text. If You need use the Message Builder

// New discord webhook client
$webhook = new WebhookClient();
// Send message
$webhook->send($url, $payload);
```

### Message Builder Example

```php
<?php
use EnterV\DiscordWebhooks\Builder\TextFormattingCombine;
use EnterV\DiscordWebhooks\Builder\TextMessageBuilder;
use EnterV\DiscordWebhooks\Payload;
use EnterV\DiscordWebhooks\WebhookClient;

$url = 'DISCORD_WEBHOOK_URL'; // Put your discord webhook url

// Builder with on auto-newline mode (to disable auto-newline use new TextMessageBuilder(false))
$messageBuilder = new TextMessageBuilder();
$message = $messageBuilder->addText('<@ROLE_ID>') // ping some role
    ->addText('How are you?') // some text without format
    ->addBold("It's time for new webhook tool!") // **Text with bold**
    /**
     * Text with multiline codeblock:
     * ```php
     * // It's can using codeblock
     * ```
     */
    ->addMultilineCodeBlock("// It's can using codeblock", 'php')
    ->addQuoteBlock('And some quote!') // > Text with quote block
    ->addCombineTextFormatting(
        "It's awesome!!!111oneone",
        (new TextFormattingCombine())
            ->withBold()
            ->withItalic()
            ->withUnderline()
    ) // ***__Text with: Bold, Italic and Underline__***
    ->addText('Are you reade for this??')
    ->build() // build message (it was returned string)
;

// Create Payload
$payload = new Payload();
 // Set message
$payload->setMessage($message);

// Send message
$webhook = new WebhookClient();
$webhook->send($url, $payload);
```

You can also use [Message Builder with embed](./MessageBuilderWithEmbedExample.md) e.g. to field or description

### Docs and examples

If you want to see the rest of the documentation and examples, please click [HERE](./docs)
