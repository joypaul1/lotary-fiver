@extends('backend.layouts.master')
@section('title', 'Add protocalSection')
@section('page-header')
    <i class="fa fa-plus"></i> Add protocalSection
@endsection

@section('content')
    @include('backend.components.page_header', [
       'fa' => 'fa fa-list',
       'name' => 'protocalSection List',
       'route' => route('backend.protocalSection.index')
    ])

    <div class="col-sm-9">
        <form role="form"
              method="post"
              class="form-horizontal"
              enctype="multipart/form-data"
              action="{{route('backend.protocalSection.store')}}">
        @csrf

        <!-- Highlight -->
            <div class="form-group">
                <label class="col-sm-4 no-padding-right bolder " for="highlight">Highlight Sentence <sup class="red">*</sup></label>
                <div class="col-sm-6">
                    <input type="text"
                           id="highlight"
                           name="highlight"
                           placeholder="highlight sentence"
                           required
                           value="{{old('highlight')}}"
                           class="form-control">
                    <strong class="red">{{ $errors->first('highlight') }}</strong>
                </div>
            </div>

        <!-- Title -->
            <div class="form-group">
                <label class="col-sm-4 no-padding-right bolder" for="heightlight">Title  <sup class="red">*</sup></label>
                <div class="col-sm-6">
                    <input type="text"
                           id="title"
                           name="title"
                           required
                           placeholder="title here..."
                           value="{{old('heightlight')}}"
                           class="form-control">
                    <strong class="red">{{ $errors->first('title') }}</strong>
                </div>
            </div>

            <!-- logo -->
            <div class="form-group">
                <label class="col-sm-4 no-padding-right bolder" for="logo">Logo <sup class="red">*</sup> </label>
                <div class="col-sm-6">
                    <input name="logo"
                           type="file"
                           required
                           id="image"
                           class="form-control single-file">
                    @error('logo')
                    <strong class="red">{{ $message }}</strong>
                    <br>
                    @enderror
                    <strong class="text-primary">Minimum 50X50 pixels</strong>
                </div>
            </div>


            <!-- Image -->
            <div class="form-group">
                <label class="col-sm-4 no-padding-right bolder" for="image">Image <sup class="red">*</sup></label>
                <div class="col-sm-6">
                    <input name="image"
                           type="file"
                           id="image"
                           required
                           class="form-control single-file">
                    @error('image')
                    <strong class="red">{{ $message }}</strong>
                    <br>
                    @enderror
                    <strong class="text-primary">Minimum 120X135 pixels</strong>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 no-padding-right bolder" for="description">Description </label>
                <div class="col-sm-8">
                    @include('backend.components.summer_note',[
                    'name'=>'description',
                    'content'=> old('description')
                    ])
                    <div class="col-sm-9 col-sm-offset-2">
                        <strong class=" red">{{ $errors->first('description') }}</strong>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-6">
                    <button class="btn btn-sm btn-success submit create-button">
                        <i class="fa fa-save"></i> Add
                    </button>

                    <a href="{{route('backend.protocalSection.index')}}" class="btn btn-sm btn-gray">
                        <i class="fa fa-refresh"></i> Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
