<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Group::make([
                    \Filament\Schemas\Components\Section::make('Post Details')
                        ->description('Main information of the post')
                        ->icon('heroicon-o-document-text')
                        ->schema([
                            \Filament\Schemas\Components\Group::make([
                                \Filament\Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->minLength(5),
                                \Filament\Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->minLength(3)
                                    ->unique(ignoreRecord: true)
                                    ->validationMessages([
                                        'unique' => 'Slug harus unik dan tidak boleh sama.',
                                    ]),
                                \Filament\Forms\Components\Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->required(),
                                \Filament\Forms\Components\ColorPicker::make('color'),
                            ])->columns(2),
                            \Filament\Forms\Components\MarkdownEditor::make('body')
                                ->columnSpanFull(),
                        ]),
                ])->columnSpan(2),

                \Filament\Schemas\Components\Group::make([
                    \Filament\Schemas\Components\Section::make('Image Upload')
                        ->icon('heroicon-o-photo')
                        ->schema([
                            \Filament\Forms\Components\FileUpload::make('image')
                                ->disk('public')
                                ->directory('post')
                                ->required()
                                ->validationMessages([
                                    'required' => 'Gambar wajib diupload.',
                                ]),
                        ]),
                    \Filament\Schemas\Components\Section::make('Meta Data')
                        ->icon('heroicon-o-tag')
                        ->schema([
                            \Filament\Forms\Components\Select::make('tags')
                                ->relationship('tags', 'name')
                                ->multiple(),
                            \Filament\Forms\Components\Checkbox::make('published'),
                            \Filament\Forms\Components\DatePicker::make('published_at'),
                        ]),
                ])->columnSpan(1),
            ])->columns(3);
    }
}
