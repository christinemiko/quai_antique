<?php

namespace App\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class CurrencyExtension extends AbstractExtension
{
    public function displayCurrency()
    {
        return "€";
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('displayCurrency', [$this, 'displayCurrency']),
        ];
    }


}
