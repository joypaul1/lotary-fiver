@extends('backend.layouts.master')
@section('title', 'Add Footer Description')
@section('page-header')
    <i class="fa fa-info"></i> Add Footer Description
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
    //    'fa'     =>  'fa fa-list',
    //    'name'   => 'LottarySection List',
    //    'route'  => route('backend.lottarySection.index'),
    ])

    <div class="col-sm-9">
        <form class="form-horizontal" method="post" action="{{route('backend.footer.Section.store')}}"
              role="form"
              enctype="multipart/form-data">
        @csrf

        {{-- Title --}}
        {{-- @dd(); --}}
        <div class="form-group">
            <label class="col-sm-2 bolder" for="description">Description
            </label>
            <div class="col-sm-6">
                <input name="description"
                       type="text"
                       id="title"
                       required

                       value="{{ old('description', $footer->description??' ') }}"
                       class="form-control"
                       >

                <strong class="red">{{ $errors->first('description') }}</strong>
                @if($errors->first('description'))
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
