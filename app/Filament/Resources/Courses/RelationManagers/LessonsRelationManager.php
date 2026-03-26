<?php

namespace App\Filament\Resources\Courses\RelationManagers;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

// ────────────────────────────────────────────────
// Correct imports for table/relation-manager actions
// ────────────────────────────────────────────────
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class LessonsRelationManager extends RelationManager
{
    protected static string $relationship = 'lessons';

    protected static ?string $recordTitleAttribute = 'title';

    public function form(Schema $form): Schema
{
    return $form
        ->components([
            Forms\Components\TextInput::make('title')
                ->label('Lesson Title')
                ->required()
                ->maxLength(255),

            // Video Upload (Stored in storage/app/public/lesson-videos)
            Forms\Components\FileUpload::make('video_url')
                ->label('Upload Video File')
                ->directory('lesson-videos')
                ->disk('public')
                ->acceptedFileTypes(['video/mp4', 'video/quicktime'])
                ->maxSize(512000) // 500MB
                ->visibility('public'),

            // YouTube Option (For flexibility)
            Forms\Components\TextInput::make('youtube_url')
                ->label('OR YouTube Link')
                ->url()
                ->placeholder('https://www.youtube.com/watch?v=...'),

            Forms\Components\Textarea::make('description')
                ->label('Lesson Description')
                ->placeholder('Describe what is covered in this lesson...')
                ->columnSpanFull(),
        ]);
}
    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('youtube_url')
                    ->label('YouTube')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('New Lesson'),
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
}