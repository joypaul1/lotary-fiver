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


        {{-- Description --}}
        <div class="form-group">
            <label class="col-sm-2 no-padding-right bolder" for="short_desc">Description </label>
            <div class="col-sm-8">
                @include('backend.components.summer_note',[
                'name'=>'description',
                'content'=>$data->description ?? old('description')
                ])
                <div class="col-sm-9 col-sm-offset-2">
                    <strong class=" red">{{ $errors->first('description') }}</strong>
                </div>
            </div>
        </div>


             {{-- footer_text --}}
        <div class="form-group">
            <label class="col-sm-2 bolder" for="footer_text">Footer Text
            </label>
            <div class="col-sm-6">
                <input name="footer_text"
                       type="footer_text"
                       id="footer_text"
                       required
                       value="{{ old('footer_text' , $data->footer_text??' ') }}"
                       class="form-control"
                       >
                <strong class="red">{{ $errors->first('footer_text') }}</strong>
                @if($errors->first('footer_text'))
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
