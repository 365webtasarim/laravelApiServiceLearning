<?php

namespace App\Enums;

enum CategoryEnum: int
{
    case PRIVATEPAGE = 0;
    case CATEGORY = 1;
    case VIDEO = 2;

    /**
     * Display name of category type.
     * @return string
     */
    public function displayName(): string
    {
        return match ($this) {
            self::PRIVATEPAGE => trans('category.privatepage'),
            self::CATEGORY => trans('category.category'),
            self::VIDEO => trans('category.video'),
        };
    }

    /**
     * Color of category type.
     * @return string
     */
    public function color(): string
    {
        return match ($this) {
            self::PRIVATEPAGE => 'bg-danger',
            self::CATEGORY => 'bg-success',
            self::VIDEO => 'bg-info',
        };
    }
}
