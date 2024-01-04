<?php

namespace App\Enums\User;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum RoleName: string implements HasColor, HasLabel
{

    case  SUPER_ADMIN = 'super admin';
    case  ADMIN = 'admin';
    case HEAD_OF_DEPARTMENT = 'head of department';
    case TEAM_LEAD = 'team lead';
    case OPERATOR = 'operator';
    case TICKETING_MANAGER = 'ticketing manager';
    case USER = 'user';


    public function getColor(): string|array|null
    {
        return match ($this->value) {
            self::OPERATOR->value => 'gray',
            self::TEAM_LEAD->value => 'warning',
            self::HEAD_OF_DEPARTMENT->value => 'info',
            self::ADMIN->value, self::USER->value => 'success',
            self::SUPER_ADMIN->value, self::TICKETING_MANAGER->value => 'primary',
        };
    }

    public function getLabel(): ?string
    {
        return ucfirst($this->value);
    }

    public static function getBadgeColor(string $state): string
    {
        return match ($state) {
            RoleName::OPERATOR->value => 'gray',
            RoleName::TEAM_LEAD->value => 'warning',
            RoleName::HEAD_OF_DEPARTMENT->value => 'info',
            RoleName::ADMIN->value, RoleName::USER->value => 'success',
            RoleName::SUPER_ADMIN->value, RoleName::TICKETING_MANAGER->value => 'primary',
        };
    }

    public static function getPaneHomeUrlByRoleName()
    {

    }
}
