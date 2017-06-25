@extends('admin::base_layout')

@section('content')
    <div class='row'>
        <div class='col-xs-12'>
            <div class="box box-warning">
                <div class="box-header">
                    <div class="col-xs-6 col-xs-offset-6 col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9 col-lg-2 col-lg-offset-10">
                        <a href="{{ route('admin.member.create') }}" class="btn btn-block btn-info">
                            <i class="fa fa-plus-circle"></i>
                            Cadastrar novo
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="table-list table-responsive">
                        <div class='col-xs-12'>
                            @if (count($members) > 0)
                                <table class="table table-bordered table-striped table-hover" id="users-table">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($members as $member)
                                        <tr>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->email }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn bg-navy dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        Ações <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu" style="min-width: initial;">
                                                        <li>
                                                            <a href="{{route('admin.member.edit', ['id' => $member->id])}}">Editar</a>
                                                        </li>
                                                        <li>
                                                            <a class="delete-confirmation" href="{{ route('admin.member.destroy', ['id' => $member->id]) }}">Excluir</a>
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

                                <div class="callout callout-info">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            Listando {{ $members->count() }} de {{ $members->total() }} registros
                                        </div>

                                        <div class="col-xs-12  col-sm-6 text-right">
                                            Página {{ $members->currentPage() }} de {{ $members->lastPage() }}
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    {{ $members->render() }}
                                </div>
                            @else
                                <div class="callout callout-warning">
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