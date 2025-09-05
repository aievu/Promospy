<?php

namespace App\Filament\Resources\UserRules\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserRuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')->email()->required(),
                TextInput::make('rule')->required(),
            ]);
    }
}
