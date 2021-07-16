@extends('backend.layouts.master')
@section('name', 'Edit menuSection')
@section('page-header')
    <i class="fa fa-info"></i> Edit MenuSection
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
        <form class="form-horizontal" method="post" action="{{route('backend.menuSection.update', $data->id)}}"
              role="form"
              enctype="multipart/form-data">
        @csrf

        {{-- name --}}
        <div class="form-group">
            <label class="col-sm-3 bolder" for="name">Menu Name
            </label>
            <div class="col-sm-6">
                <input name="name"
                       type="text"
                       id="name"
                       required
                       value="{{ old('name' , $data->name) }}"
                       class="form-control"
                       >
                <strong class="red">{{ $errors->first('name') }}</strong>
                @if($errors->first('name'))
                    <br>
                @endif
            </div>
        </div>
        {{-- link --}}
        <div class="form-group">
            <label class="col-sm-3 bolder" for="link">Link
            </label>
            <div class="col-sm-6">
                <input name="link"
                       type="text"
                       id="link"
                       required
                       value="{{ old('link' , $data->link) }}"
                       class="form-control"
                       >
                <strong class="red">{{ $errors->first('link') }}</strong>
                @if($errors->first('link'))
                    <br>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 bolder" for="link">Is Token Menu
            </label>
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        <input name="is_token_menu" type="checkbox" class="ace input-lg"  {{ $data->is_token_menu == true? 'checked':' '}}>
                        <span class="lbl bigger-120 text-success">(Yes/No?)</span>
                    </label>
                </div>
                <strong class="red">{{ $errors->first('link') }}</strong>
                @if($errors->first('link'))
                    <br>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 bolder" for="mobile_menu">Mobile Menu
            </label>
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        <input name="mobile_menu" type="checkbox" class="ace input-lg"  {{ $data->mobile_menu == true? 'checked':' '}}>
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
            <label class="col-sm-3 bolder" for="header_mobile_menu">Header Mobile menu
            </label>
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        <input name="header_mobile_menu" type="checkbox" class="ace input-lg"  {{ $data->header_mobile_menu == true? 'checked':' '}}>
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
            <label class="col-sm-3 bolder" for="header_menu">Header  menu
            </label>
            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        <input name="header_menu" type="checkbox" class="ace input-lg"  {{ $data->header_menu == true? 'checked':' '}}>
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
                <div class="col-sm-offset-3 col-sm-6">
                    <button class="btn btn-sm btn-success submit create-button"><i class="fa fa-save"></i> Update
                    </button>

                </div>
            </div>
        </form>
    </div>


@endsection

