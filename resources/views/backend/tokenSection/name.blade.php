@extends('backend.layouts.master')
@section('title', 'Add name')
@section('page-header')
    <i class="fa fa-info"></i> Add Section Name
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
    //    'name' => 'MarketplaceSection List',
    //    'route' =>route('backend.marketplaceSection.index'),
    ])

    <div class="col-sm-9">
        <form class="form-horizontal" method="post" action="{{route('backend.tokenSection.name.store')}}"
              role="form"
              enctype="multipart/form-data">
        @csrf


            {{-- @dd($name); --}}
            <!-- name -->
            <div class="form-group">
                <label class="col-sm-2 bolder" for="name">Section Name
                </label>
                <div class="col-sm-6">
                    <input name="name"
                           type="text"
                           required
                           value="{{ old('name',$name->name??' ') }}"
                           id="name"
                           class="form-control">
                    <strong class="red">{{ $errors->first('name') }}</strong>
                    @if($errors->first('name'))
                        <br>
                    @endif
                    {{-- <strong class="red">Minimum  700X400 pixels</strong> --}}
                </div>
            </div>


            <!-- Buttons -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button class="btn btn-sm btn-success submit create-button"><i class="fa fa-save"></i> Add
                    </button>

                </div>
            </div>
        </form>
    </div>

>
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
