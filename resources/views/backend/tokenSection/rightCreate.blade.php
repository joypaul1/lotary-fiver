@extends('backend.layouts.master')
@section('title', 'Add Data Right Side')
@section('page-header')
    <i class="fa fa-info"></i> Add Data Right Side
@endsection
@push('css')
    <style>
        @media only screen and (min-width: 768px) {
            .widget-box.first {
                margin-top: 0 !important;
            }
        }
    </style>
@endpush

@section('content')
    @include('backend.components.page_header', [
    //    'fa' => 'fa fa-list',
    //    'name' => 'tokenSection List',
    //    'route' =>route('backend.tokenSection.index'),
    ])

    <div class="col-sm-9">
        <form class="form-horizontal" method="post" action="{{route('backend.tokenSection.right.store')}}"
              role="form"
              enctype="multipart/form-data">
        @csrf




            {{-- title --}}
        <div class="form-group">
            <label class="col-sm-2 bolder" for="title">Title
            </label>
            <div class="col-sm-6">
                <input name="title"
                       type="text"
                       id="title"
                       required
                       value="{{ old('title') }}"
                       class="form-control"
                       >
                <strong class="red">{{ $errors->first('title') }}</strong>
                @if($errors->first('title'))
                    <br>
                @endif
            </div>
        </div>
            {{-- title --}}
        <div class="form-group">
            <label class="col-sm-2 bolder" for="amount">Amount
            </label>
            <div class="col-sm-6">
                <input name="amount"
                       type="number"
                       id="amount"
                       required
                       value="{{ old('amount') }}"
                       class="form-control"
                       >
                <strong class="red">{{ $errors->first('amount') }}</strong>
                @if($errors->first('amount'))
                    <br>
                @endif
            </div>
        </div>


            <!-- Buttons -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button class="btn btn-sm btn-success submit create-button"><i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>


@endsection

@push('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#current')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
