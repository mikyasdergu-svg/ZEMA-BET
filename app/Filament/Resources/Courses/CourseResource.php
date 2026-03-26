<?php

namespace App\Filament\Resources\Courses;

use App\Filament\Resources\Courses\Pages;
use App\Filament\Resources\Courses\Tables\CoursesTable;
use App\Models\Course;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Actions\CreateAction;
use BackedEnum;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Auth;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Schema $form): Schema
    {
        return $form
            ->components([
                Forms\Components\TextInput::make('title')
                    ->label('Course Title')
                    ->required()
                    ->placeholder('e.g. Advanced Kirar Techniques')
                    ->maxLength(255),

                Forms\Components\Select::make('instrument_type')
                    ->label('Instrument')
                    ->options([
                        'kirar'   => 'Kirar',
                        'begena'  => 'Begena',
                        'masenqo' => 'Masenqo',
                    ])
                    ->required()
                    ->native(false),

                Forms\Components\Textarea::make('description')
                    ->label('About this Course')
                    ->placeholder('Describe what students will learn...')
                    ->rows(5)
                    ->columnSpanFull(),

                Forms\Components\Select::make('user_id')
                    ->relationship('teacher', 'name')
                    ->label('Assigned Teacher')
                    ->default(fn () => Auth::id())
                    ->required()
                    ->searchable()
                    ->preload(),
            ]);
    }

    
    public static function getRelations(): array
    {
        return [
            \App\Filament\Resources\Courses\RelationManagers\LessonsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit'   => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}