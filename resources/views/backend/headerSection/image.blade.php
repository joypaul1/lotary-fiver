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
        <form class="form-horizontal" method="post"
                action="{{route('backend.headerSection.image.store')}}"
                role="form"
                enctype="multipart/form-data">
            @csrf



            {{--  background_image  --}}
            <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 bolder" for="background_image"> Backgournd Image
                </label>
                <div class="col-sm-8">
                    <input name="background_image"
                        type="file"
                        id="background_image"
                        class="form-control input-sm single-file">
                    <strong class="text-primary">Minimum 3000 X 6000 pixels</strong>
                    @error('background_image')
                    <br>
                    <strong class="red">{{ $message }}</strong>
                    @enderror
                </div>
            </div>


            {{--  person  --}}
            <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 bolder" for="person_gif"> Person Image
                </label>
                <div class="col-sm-8">
                    <input name="person_gif"
                        type="file"
                        id="person_gif"
                        class="form-control input-sm single-file">
                    <strong class="text-primary">Minimum 350x600 pixels</strong>
                    @error('person_gif')
                    <br>
                    <strong class="red">{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            {{--  coin  --}}
            <div class="form-group">
                <label class="col-sm-offset-1 col-sm-3 bolder" for="coin_gif">Coin Gif
                </label>
                <div class="col-sm-8">
                    <input name="coin_gif"
                        type="file"
                        id="coin_gif"
                        class="form-control input-sm single-file">
                    <strong class="text-primary">Minimum 400x400 pixels</strong>
                    @error('coin_gif')
                    <br>
                    <strong class="red">{{ $message }}</strong>
                    @enderror
                </div>
            </div>


            <!-- Buttons -->
            <div class="form-group">
                <div class="col-sm-offset-6  col-sm-4">
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
                <h4 class="widget-title">BackGround Image</h4>

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
                            <img id="current" src="{{ asset($data->background_image)??" " }}" width="100" height="100" class="img-responsive center-block"
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
                <h4 class="widget-title">Person Image</h4>

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
                            <img  src="{{ asset($data->person_gif??null) }}" width="100" height="50" class="img-responsive center-block"
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
                <h4 class="widget-title">Coin Gif </h4>

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
                            <img  src="{{ asset($data->coin_gif??null) }}" width="100" height="100" class="img-responsive center-block"
                                 alt="logo">
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
