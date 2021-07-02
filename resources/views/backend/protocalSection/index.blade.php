@extends('backend.layouts.master')
@section('title','protocalSection List')
@section('page-header')
    <i class="fa fa-list"></i> protocalSection List
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
       'name' => 'Create Origin',
       'route' => route('backend.protocalSection.create')
    ])


    <table class="table table-bordered">
        <tbody>
        <tr>
            <th class="bg-dark" style="width: 5%">SL</th>
            <th class="bg-dark" style="width: 30%">Heighlight</th>
            <th class="bg-dark" style="width: 30%">Title</th>
            <th class="bg-dark" style="width: 30%">Logo</th>
            <th class="bg-dark" style="width: 25%">Image</th>
            <th class="bg-dark" style="width: 10%">Action</th>
        </tr>
        @forelse($protocols as $key => $protocol)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $protocol->highlight??"" }}</td>
                <td>{{ $protocol->title??"" }}</td>
                <td>
                    <img src="{{ asset($protocol->logo??'') }}"
                         height="30"
                         width="120"
                         alt="No logo">
                </td>
                <td>
                    <img src="{{ asset($protocol->image??" ") }}"
                         height="30"
                         width="120"
                         alt="No Image">
                </td>
                <td>
                    <div class="btn-group btn-group-mini btn-corner">
                        <a href="{{ url('sadmin/protocalSection/'.$protocol->id.'/edit') }}"
                           class="btn btn-xs btn-info"
                           title="Edit">
                            <i class="ace-icon fa fa-pencil"></i>
                        </a>

                        <button type="button" class="btn btn-xs btn-danger"
                                onclick="delete_check({{$protocol->id}})"
                                title="Delete">
                            <i class="ace-icon fa fa-trash-o"></i>
                        </button>
                    </div>
                    <form action="{{ route('backend.protocalSection.destroy', $protocol->id)}}"
                          id="deleteCheck_{{ $protocol->id }}" method="Post">
                          @method('DELETE')
                        @csrf
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No data available in table</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @include('backend.partials._paginate', ['data' => $protocols])
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
