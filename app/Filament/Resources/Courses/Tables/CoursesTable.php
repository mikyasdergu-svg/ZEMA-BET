<?php

namespace App\Filament\Resources\Courses\Tables;

use Filament\Tables\Columns\TextColumn;

class CoursesTable
{
    public static function columns(): array
    {
        return [
            TextColumn::make('title')
                ->label('Course Title')
                ->searchable(),

            TextColumn::make('instrument_type')
                ->label('Instrument'),

            TextColumn::make('teacher.name')
                ->label('Teacher')
                ->sortable()
                ->searchable(),

            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}