@extends('admin::base_layout')

@section('content')
    <div class='row'>
        <div class='col-xs-12'>
            <div class="box box-warning">
                <div class="box-header">
                    <div class="col-xs-6 col-xs-offset-6 col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9 col-lg-2 col-lg-offset-10">
                        <a href="{{ route('admin.challenge.create') }}" class="btn btn-block btn-info">
                            <i class="fa fa-plus-circle"></i>
                            Cadastrar novo
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="table-list table-responsive">
                        <div class='col-xs-12'>
                            @if (count($challenges) > 0)
                                <table class="table table-bordered table-striped table-hover" id="users-table">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($challenges as $challenge)
                                        <tr>
                                            <td>{{ $challenge->name }}</td>
                                            <td>{!! str_limit(strip_tags($challenge->description), 200) !!}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn bg-navy dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        Ações <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu" style="min-width: initial;">
                                                        <li>
                                                            <a href="{{ route('admin.challenge.edit', ['id' => $challenge->id]) }}">Editar</a>
                                                        </li>

                                                        <li>
                                                            <a class="delete-confirmation" href="{{ route('admin.challenge.destroy', ['id' => $challenge->id]) }}">Excluir</a>
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
                                        <th>Descrição</th>
                                        <th>Ações</th>
                                    </tr>
                                    </tfoot>
                                </table>

                                <div class="callout callout-info">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            Listando {{ $challenges->count() }} de {{ $challenges->total() }} registros
                                        </div>

                                        <div class="col-xs-12  col-sm-6 text-right">
                                            Página {{ $challenges->currentPage() }} de {{ $challenges->lastPage() }}
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    {{ $challenges->render() }}
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