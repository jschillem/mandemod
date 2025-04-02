<?php

namespace App\Enums;

use Spatie\TypeScriptTransformer\Attributes\TypeScript;

/**
 * Enum representing the different Eurorack module formats.
 */
#[TypeScript]
enum ModuleFormat: string
{
    /** 3U (Standard Eurorack) */
    case THREE_U = '3U';
    /** 1U (Intellijel) */
    case ONE_U_INTELLIJEL = '1U_Intellijel';
    /** 1U (Pulp Logic) */
    case ONE_U_PULP_LOGIC = '1U_PulpLogic';

    /**
     * Determines if the module format is 1U (Intellijel or Pulp Logic).
     **/
    public function isOneU(): bool
    {
        return $this === self::ONE_U_INTELLIJEL || $this === self::ONE_U_PULP_LOGIC;
    }
}
