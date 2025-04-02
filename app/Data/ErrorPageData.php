<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class ErrorPageData extends Data
{
    public function __construct(
        public int $status,
    ) {}
}
