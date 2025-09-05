<?php

namespace App\Filament\Resources\UserRules\Pages;

use App\Filament\Resources\UserRules\UserRuleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUserRules extends ListRecords
{
    protected static string $resource = UserRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
