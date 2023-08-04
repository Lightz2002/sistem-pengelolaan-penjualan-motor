<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\View\Components\Column;
use Illuminate\Database\Eloquent\Builder;


class UsersTable extends Table
{
    public $search = '';
    protected $queryString = ['search'];

    public $createUrl = '/users/create';


    public function query(): Builder
    {
        return User::filter($this->search);
    }

    public function columns(): array
    {
        return [
            Column::make('username', 'Username'),
            Column::make('email', 'Email'),
            Column::make('roles', 'Role')->component('columns.users.role'),
            Column::make('created_at', 'Created At')->component('columns.common.human-diff'),
            Column::make('actions', 'Actions')->component('columns.users.action'),
        ];
    }
}
