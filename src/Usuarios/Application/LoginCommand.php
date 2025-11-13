<?php

namespace Devpack\Usuarios\Application;


use Baezeta\Kernel\ValueObjects\Email\EmailValue;
use Baezeta\Kernel\ValueObjects\Strings\StringValue;
use Baezeta\Kernel\CommandQueryBus\Base\Domain\CommandBase;

final readonly class LoginCommand extends CommandBase
{
    public function __construct(
        public EmailValue $email,
        public StringValue $password
    ) {
    }
}