<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Wizard::make([
                    \Filament\Schemas\Components\Wizard\Step::make('Product Info')
                        ->description('Isi informasi dasar produk')
                        ->icon('heroicon-o-shopping-bag')
                        ->schema([
                            \Filament\Schemas\Components\Group::make([
                                \Filament\Forms\Components\TextInput::make('name')
                                    ->required(),
                                \Filament\Forms\Components\TextInput::make('sku')
                                    ->required(),
                            ])->columns(2),
                            \Filament\Forms\Components\MarkdownEditor::make('description')
                                ->columnSpanFull(),
                        ]),

                    \Filament\Schemas\Components\Wizard\Step::make('Pricing & Stock')
                        ->description('Isi harga dan jumlah stok')
                        ->icon('heroicon-o-currency-dollar')
                        ->schema([
                            \Filament\Forms\Components\TextInput::make('price')
                                ->numeric()
                                ->required()
                                ->minValue(1)
                                ->validationMessages([
                                    'min' => 'Harga harus lebih dari 0.',
                                ]),
                            \Filament\Forms\Components\TextInput::make('stock')
                                ->numeric()
                                ->required(),
                        ]),

                    \Filament\Schemas\Components\Wizard\Step::make('Media & Status')
                        ->description('Upload gambar dan atur status')
                        ->icon('heroicon-o-photo')
                        ->schema([
                            \Filament\Forms\Components\FileUpload::make('image')
                                ->disk('public')
                                ->directory('products'),
                            \Filament\Forms\Components\Checkbox::make('is_active'),
                            \Filament\Forms\Components\Checkbox::make('is_featured'),
                        ]),
                ])
                ->submitAction(
                    \Filament\Actions\Action::make('save')
                        ->label('Save Product')
                        ->color('primary')
                        ->submit('save')
                ),
            ]);
    }
}
