<?php

namespace App\Filament\Resources\UserRules\Pages;

use App\Filament\Resources\UserRules\UserRuleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUserRule extends EditRecord
{
    protected static string $resource = UserRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
