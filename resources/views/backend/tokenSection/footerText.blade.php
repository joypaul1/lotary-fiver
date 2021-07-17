@extends('backend.layouts.master')
@section('title', 'Add Footer Text')
@section('page-header')
    <i class="fa fa-info"></i> Add Footer Text
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
    //    'name'   => 'tokenSection List',
    //    'route'  => route('backend.tokenSection.index'),
    ])

    <div class="col-sm-9">
        <form class="form-horizontal" method="post" action="{{route('backend.tokenSection.footer.text')}}"
              role="form"
              enctype="multipart/form-data">
        @csrf

            {{-- Description --}}
            <div class="form-group">
                <label class="col-sm-2 bolder" for="title">Description
                </label>
                <div class="col-sm-6">
                    <input name="description"
                            type="text"
                            id="title"
                            required
                            value="{{ old('description',$data->description?? ' ') }}"
                            class="form-control"
                            >
                    <strong class="red">{{ $errors->first('description') }}</strong>
                    @if($errors->first('title'))
                        <br>
                    @endif
                </div>
            </div>





            <!-- Buttons -->
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button class="btn btn-sm btn-success submit create-button"><i class="fa fa-save"></i> Add
                    </button>

                    <a href="{{route('backend.site_config.slider.index')}}" class="btn btn-sm btn-gray"> <i
                            class="fa fa-refresh"></i>
                        Cancel</a>
                </div>
            </div>
        </form>
    </div>


@endsection

@push('js')

@endpush
