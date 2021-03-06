@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.attributes.create') }}" class="btn btn-primary pull-right">Adicionar atributo</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> Código </th>
                            <th> Nome </th>
                            <th class="text-center"> Tipo do Frontend </th>
                            <th class="text-center"> Filtrável </th>
                            <th class="text-center"> Obrigatório </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attributes as $attribute)
                            <tr>
                                <td>{{ $attribute->code }}</td>
                                <td>{{ $attribute->name }}</td>
                                <td>{{ $attribute->frontend_type }}</td>
                                <td class="text-center">
                                    @if ($attribute->is_filterable == 1)
                                        <span class="badge badge-success">Sim</span>
                                    @else
                                        <span class="badge badge-danger">Não</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($attribute->is_required == 1)
                                        <span class="badge badge-success">Sim</span>
                                    @else
                                        <span class="badge badge-danger">Não</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.attributes.delete', $attribute->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable({
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nenhum registro encontrado, desculpe",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "search": "Buscar",
                "infoFiltered": "(Filtrado de _MAX_ total de registros)",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo"
                }
            }
        });</script>
@endpush
