<?php

namespace App\Filament\Resources\UserRules;

use App\Filament\Resources\UserRules\Pages\CreateUserRule;
use App\Filament\Resources\UserRules\Pages\EditUserRule;
use App\Filament\Resources\UserRules\Pages\ListUserRules;
use App\Filament\Resources\UserRules\Schemas\UserRuleForm;
use App\Filament\Resources\UserRules\Tables\UserRulesTable;
use App\Models\UserRule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UserRuleResource extends Resource
{
    protected static ?string $model = UserRule::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUser;

    protected static ?string $recordTitleAttribute = 'User Rules';

    public static function form(Schema $schema): Schema
    {
        return UserRuleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserRulesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUserRules::route('/'),
            'create' => CreateUserRule::route('/create'),
            'edit' => EditUserRule::route('/{record}/edit'),
        ];
    }
}
