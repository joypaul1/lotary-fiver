@extends('backend.layouts.master')
@section('title', 'Edit tokenSection')
@section('page-header')
    <i class="fa fa-info"></i> Edit tokenSection
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
       'name' => 'tokenSection List',
       'route' =>route('backend.tokenSection.index'),
    ])
    {{-- @dd($data); --}}

    <div class="col-sm-9">
        <form class="form-horizontal" method="post" action="{{route('backend.tokenSection.right.update', $data->id)}}"
              role="form"
              enctype="multipart/form-data">
        @csrf

        {{-- Title --}}
        <div class="form-group">
            <label class="col-sm-2 bolder" for="title">Title
            </label>
            <div class="col-sm-6">
                <input name="title"
                       type="text"
                       id="title"
                       required
                       value="{{ old('title' , $data->title) }}"
                       class="form-control"
                       >
                <strong class="red">{{ $errors->first('title') }}</strong>
                @if($errors->first('title'))
                    <br>
                @endif
            </div>
        </div>

        {{-- Amount --}}
        <div class="form-group">
            <label class="col-sm-2 bolder" for="amount">Amount
            </label>
            <div class="col-sm-6">
                <input name="amount"
                       type="number"
                       id="amount"
                       required
                       value="{{ old('amount' , $data->amount) }}"
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
                    <button class="btn btn-sm btn-success submit create-button"><i class="fa fa-save"></i> Update
                    </button>

                    <a href="{{route('backend.tokenSection.right.index')}}" class="btn btn-sm btn-gray"> <i
                            class="fa fa-refresh"></i>
                        Cancel</a>
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
