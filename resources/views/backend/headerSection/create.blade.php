@extends('backend.layouts.master')
@section('title', 'Logo & Title')
@section('page-header')
    <i class="fa fa-info"></i> Add Logo & Title
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
       'name' => 'Logo & Title',
       'route' =>route('backend.site_config.banner.index'),
    ])

    <div class="col-sm-9">
        <form class="form-horizontal" method="post" action="{{route('backend.headerSection.title_logo.store')}}"
              role="form"
              enctype="multipart/form-data">
        @csrf


        {{--  Title  --}}

        <div class="form-group">
            <label class="col-sm-2 bolder" for="Title">Title
            </label>
            <div class="col-sm-8">
                <input name="title"
                       type="text"
                       id="position"
                       value="{{ ($data->title??'') }}"
                       class="form-control"
                       >
                <strong class="red">{{ $errors->first('title') }}</strong>
                @if($errors->first('title'))
                    <br>
                @endif

            </div>
        </div>
            {{--  <!-- Image -->  --}}
            <div class="form-group">
                <label class="col-sm-2 bolder" for="logo">Logo
                </label>
                <div class="col-sm-8">
                    <input name="logo"
                           type="file"
                           id="logo"
                           class="form-control"

                           onchange="readURL(this);">
                    <strong class="red">{{ $errors->first('logo') }}</strong>
                    @if($errors->first('logo'))
                        <br>
                    @endif
                    <strong class="red">Minimum 150x33 pixels</strong>
                </div>
            </div>



            <!-- Buttons -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-4">
                    <button class="btn btn-sm btn-success submit create-button"><i class="fa fa-save"></i> Add
                    </button>

                    <a href="{{route('backend.site_config.banner.index')}}" class="btn btn-sm btn-gray"> <i
                            class="fa fa-refresh"></i>
                        Cancel</a>
                </div>
            </div>
        </form>
    </div>

    <div class="col-sm-3">
        <div class="widget-box first">
            <div class="widget-header">
                <h4 class="widget-title">Current Image</h4>

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
                                 alt="logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="widget-box first">
            <div class="widget-header">
                <h4 class="widget-title">Upload Logo</h4>

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
                            <img  src="{{ asset($data->logo??' ') }}" width="100" height="100" class="img-responsive center-block"
                                 alt="logo">
                        </div>s
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
