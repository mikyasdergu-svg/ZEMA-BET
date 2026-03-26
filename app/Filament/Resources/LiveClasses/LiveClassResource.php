<?php
namespace App\Filament\Resources\LiveClasses;
use App\Models\LiveClass;
use BackedEnum;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use App\Filament\Resources\LiveClasses\Pages\CreateLiveClass;
use App\Filament\Resources\LiveClasses\Pages\EditLiveClass;
use App\Filament\Resources\LiveClasses\Pages\ListLiveClasses;

class LiveClassResource extends Resource
{
    protected static ?string $model = LiveClass::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-video-camera';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DateTimePicker::make('start_time')
                    ->label('Scheduled Start Time')
                    ->required(),

                Forms\Components\TextInput::make('meeting_link')
                    ->label('Meeting URL (Zoom/Meet)')
                    ->url()
                    ->placeholder('https://zoom.us/j/...')
                    ->required(),

                Forms\Components\Toggle::make('is_active')
                    ->label('Go Live Now')
                    ->onColor('success'),

                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Live Now')
                    ->boolean(),
            ])
            ->filters([
                // Add later if needed
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListLiveClasses::route('/'),
            'create' => CreateLiveClass::route('/create'),
            'edit'   => EditLiveClass::route('/{record}/edit'),
        ];
    }
}