@extends('backend.layouts.master')

@section('title','marketplaceSection List')
@section('page-header')
    <i class="fa fa-list"></i> MarketplaceSection List
@stop

@push('css')
    <style>
        table th,
        td {
            text-align: center !important;
            vertical-align: middle !important;
        }
    </style>
@endpush

@section('content')
    @include('backend.components.page_header', [
       'fa' => 'fa fa-pencil',
       'name' => 'MarketplaceSection Create',
       'route' => route('backend.marketplaceSection.create')
    ])

    <table class="table table-bordered">
        <tbody>
        <tr>
            <th class="bg-dark" style="width: 10%">SL</th>
            <th class="bg-dark" style="width: 40%">Title</th>
            <th class="bg-dark" style="width: 30%">Image</th>
            {{-- <th class="bg-dark" style="width: 40%">Description</th> --}}
            <th class="bg-dark" style="">Action</th>
        </tr>
        @forelse($datas as $key => $data)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->title??"" }}</td>


                <td>
                    <img src="{{ asset($data->image??"") }}"
                         height="30"
                         width="120"
                         alt="No Image">
                </td>
                {{-- @dd($data->short_description) --}}
                {{-- <td>{!! $data->short_description !!}</td> --}}
                <td>
                    <div class="btn-group btn-group-mini btn-corner">
                        <a href="{{ route('backend.marketplaceSection.edit', $data->id) }}"
                           class="btn btn-xs btn-info"
                           title="Edit">
                            <i class="ace-icon fa fa-pencil"></i>
                        </a>

                        <button type="button" class="btn btn-xs btn-danger"
                                onclick="delete_check({{$data->id}})"
                                title="Delete">
                            <i class="ace-icon fa fa-trash-o"></i>
                        </button>
                    </div>
                    <form action="{{ route('backend.marketplaceSection.destroy', $data->id)}}"
                          id="deleteCheck_{{ $data->id }}" method="GET">
                        @csrf
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No data available in table</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @include('backend.partials._paginate', ['data' => $datas])
@endsection

@push('js')
    <script type="text/javascript">
        function delete_check(id) {
            Swal.fire({
                title: 'Are you sure?',
                html: "<b>You will delete it permanently!</b>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                width: 400,
            }).then((result) => {
                if (result.value) {
                    $('#deleteCheck_' + id).submit();
                }
            })
        }
    </script>
@endpush
