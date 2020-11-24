<?php

declare(strict_types = 1);

namespace Service\SocialNetwork;

class FacebookAdapter implements ISocialNetwork
{
    /**
     * Отправка сообщения в соц.сеть
     *
     * @param string $message
     *
     * @return void
     */
    public function send(string $message): void
    {
        (new Facebook)->FBSpecificMethod($message);
    }
}
