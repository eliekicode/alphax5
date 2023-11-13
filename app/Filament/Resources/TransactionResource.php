<?php

namespace App\Filament\Resources;

use App\Enums\Transaction\TransactionType;
use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use App\ValueObjects\Money;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'fas-money-bill-transfer';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')
                    ->required(),
                Select::make('type')
                    ->options(TransactionType::class)
                    ->required(),
                Select::make('currency_id')
                    ->relationship('currency', 'symbol')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('serial')
                    ->label('ID'),
                TextColumn::make('account.serial')
                    ->label('account'),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('amount')
                    ->money(),
                TextColumn::make('created_at')
                    ->label('Initiated at')
                    ->dateTime(),
                TextColumn::make('approved_at')
                    ->dateTime(),
                TextColumn::make('rejected_at')
                    ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label('By type')
                    ->options(TransactionType::class)

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'view' => Pages\ViewTransaction::route('/{record}'),
        ];
    }
}
