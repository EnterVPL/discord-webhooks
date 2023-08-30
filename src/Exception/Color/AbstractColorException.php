<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Exception\Color;

use EnterV\DiscordWebhooks\Exception\Interface\WebhookThrowableInterface;

abstract class AbstractColorException extends \Exception implements WebhookThrowableInterface
{
}
