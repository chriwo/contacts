<?php

declare(strict_types=1);

use Extcode\Contacts\Command\GeocodeCommand;

return [
    'contacts:geocode' => [
        'class' => GeocodeCommand::class,
    ],
];
