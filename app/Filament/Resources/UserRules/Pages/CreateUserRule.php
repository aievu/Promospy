<?php

namespace App\Filament\Resources\UserRules\Pages;

use App\Filament\Resources\UserRules\UserRuleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUserRule extends CreateRecord
{
    protected static string $resource = UserRuleResource::class;
}
