@extends('admin::base_layout')

@section('content')
    <div class='row'>
        <div class='col-xs-12'>
            <div class="box box-warning">
                <div class="box-header">
                    <div class="col-xs-6 col-xs-offset-6 col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9 col-lg-2 col-lg-offset-10">
                        <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-info">
                            <i class="fa fa-plus-circle"></i>
                            Cadastrar novo
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="table-list table-responsive">
                        <div class='col-xs-12'>
                            @if (count($users) > 0)
                                <table class="table table-bordered table-striped table-hover" id="users-table">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn bg-navy dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        Ações <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu" style="min-width: initial;">
                                                        <li>
                                                            <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}">Editar</a>
                                                        </li>

                                                        <li>
                                                            <a class="delete-confirmation" href="{{ route('admin.user.destroy', ['id' => $user->id]) }}">Excluir</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Ações</th>
                                    </tr>
                                    </tfoot>
                                </table>

                                <div class="alert alert-info">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            Listando {{ $users->count() }} de {{ $users->total() }} registros
                                        </div>

                                        <div class="col-xs-12  col-sm-6 text-right">
                                            Página {{ $users->currentPage() }} de {{ $users->lastPage() }}
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    {{ $users->render() }}
                                </div>
                            @else
                                <div class="alert alert-warning">
                                    <i class="fa fa-warning"></i>
                                    Nenhum registro foi encontrado.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection