@extends('backend.layouts.master')
@section('name', 'Add menuSection')
@section('page-header')
    <i class="fa fa-info"></i> Add Menu
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
       'fa' => 'fa fa-list',
       'name' => 'menuSection List',
       'route' =>route('backend.menuSection.index'),
    ])

    <div class="col-sm-9">
        <form class="form-horizontal" method="post" action="{{route('backend.menuSection.store')}}"
              role="form"
              enctype="multipart/form-data">
        @csrf

        {{-- name --}}
        <div class="form-group">
            <label class="col-sm-2 bolder" for="name">Menu Name
            </label>
            <div class="col-sm-6">
                <input name="name"
                       type="text"
                       id="name"
                       required
                       value="{{ old('name') }}"
                       class="form-control"
                       >
                <strong class="red">{{ $errors->first('name') }}</strong>
                @if($errors->first('name'))
                    <br>
                @endif
            </div>
        </div>
        {{-- Link --}}
        <div class="form-group">
            <label class="col-sm-2 bolder" for="link">Link
            </label>
            <div class="col-sm-6">
                <input name="link"
                type="text"
                id="link"
                required
                value="{{ old('link') }}"
                class="form-control"
                >
                <strong class="red">{{ $errors->first('link') }}</strong>
                @if($errors->first('link'))
                <br>
                @endif
            </div>
            <div class="col-sm-2">
                (As Default Main Menu)
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 bolder" for="link">Token Buttons
            </label>
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        <input name="is_token_menu" type="checkbox" class="ace input-lg">
                        <span class="lbl bigger-120 text-success">(Yes/No?)</span>
                    </label>
                </div>
                <strong class="red">{{ $errors->first('is_token_menu') }}</strong>
                @if($errors->first('is_token_menu'))
                    <br>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 bolder" for="mobile_menu">Mobile Menu Button
            </label>
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        <input name="mobile_menu" type="checkbox" class="ace input-lg">
                        <span class="lbl bigger-120 text-success">(Yes/No?)</span>
                    </label>
                </div>
                <strong class="red">{{ $errors->first('mobile_menu') }}</strong>
                @if($errors->first('mobile_menu'))
                    <br>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 bolder" for="header_mobile_menu">Logo Button
            </label>
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        <input name="header_mobile_menu" type="checkbox" class="ace input-lg" >
                        <span class="lbl bigger-120 text-success">(Yes/No?)</span>
                    </label>
                </div>
                <strong class="red">{{ $errors->first('header_mobile_menu') }}</strong>
                @if($errors->first('header_mobile_menu'))
                    <br>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 bolder" for="header_menu">Header Button
            </label>
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        <input name="header_menu" type="checkbox" class="ace input-lg" >
                        <span class="lbl bigger-120 text-success">(Yes/No?)</span>
                    </label>
                </div>
                <strong class="red">{{ $errors->first('header_menu') }}</strong>
                @if($errors->first('header_menu'))
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
        $('input.input-lg').on('change', function() {
            $('input.input-lg').not(this).prop('checked', false);
        });
    </script>
@endpush
