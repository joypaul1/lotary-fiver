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
                <div class="radio">
                    <label>
                        <input name="is_token_menu" type="radio" class="ace input-lg">
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
            <label class="col-sm-2 bolder" for="link">Mobile Menu Button
            </label>
            <div class="col-sm-6">
                <div class="radio">
                    <label>
                        <input name="mobile_menu" type="radio" class="ace input-lg">
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
            <label class="col-sm-2 bolder" for="link">Logo Button
            </label>
            <div class="col-sm-6">
                <div class="radio">
                    <label>
                        <input name="header_mobile_menu" type="radio" class="ace input-lg" >
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
            <label class="col-sm-2 bolder" for="link">Header Button
            </label>
            <div class="col-sm-6">
                <div class="radio">
                    <label>
                        <input name="header_mobile_menu" type="radio" class="ace input-lg" >
                        <span class="lbl bigger-120 text-success">(Yes/No?)</span>
                    </label>
                </div>
                <strong class="red">{{ $errors->first('header_mobile_menu') }}</strong>
                @if($errors->first('header_mobile_menu'))
                    <br>
                @endif
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

    <div class="col-sm-3">
        <div class="widget-box first">
            <div class="widget-header">
                <h4 class="widget-name">Current Image</h4>

                <div class="widget-toolbar">
                    <a href="#" data-action="collapse">
                        <i class="ace-icon fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="widget-body"
                 style="display:flex; align-items: center; justify-content: center; height:100px;">
                <div class="widget-main">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <img id="current" src="" width="100" height="100" class="img-responsive center-block"
                                 alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
