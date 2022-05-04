<?php

namespace Filament\Support;

use Illuminate\Support\Str;
use Illuminate\View\ComponentAttributeBag;

if (! function_exists('Filament\Support\prepare_inherited_attributes')) {
    function prepare_inherited_attributes(ComponentAttributeBag $attributes): ComponentAttributeBag
    {
        return $attributes->merge(
            collect($attributes->getAttributes())
                ->mapWithKeys(fn ($value, string $name): array => [Str::camel($name) => $value])
                ->toArray(),
        );
    }
}
