<?php

namespace App\Filament\Member\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Forms;
use App\Filament\Member\Resources\PostResource;
use Filament\Actions;
use Filament\Forms\Set;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;



    // here afterStateUpdated not working with live
    public  function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->live()
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('url', Str::slug($state))),

                Forms\Components\TextInput::make('url'),

                Forms\Components\Toggle::make('status')
                    ->required(),
            ]);
    }




}
