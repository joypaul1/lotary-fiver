@extends('backend.layouts.master')
@section('title', 'Edit protocalSection')
@section('page-header')
    <i class="fa fa-plus"></i> Edit protocalSection
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
              {{--  action="{{url('backend/protocalSection/'.$data->id.'/update')}}"  --}}
              action="{{route('backend.protocalSection.update',$data->id)}}"
              >
        @csrf
        {{ method_field('PUT') }}

        <!-- Highlight -->
            <div class="form-group">
                <label class="col-sm-4 no-padding-right bolder " for="highlight">Highlight Sentence <sup class="red">*</sup></label>
                <div class="col-sm-6">
                    <input type="text"
                           id="highlight"
                           name="highlight"
                           placeholder="highlight sentence"
                           required
                           value="{{old('highlight', $data->highlight)}}"
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
                           value="{{old('title',  $data->title)}}"
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
                           value="{{ asset($data->image) }}"
                           class="form-control single-file">
                    @error('image')
                    <strong class="red">{{ $message }}</strong>
                    <br>
                    @enderror
                    <strong class="text-primary">Minimum 120x135 pixels</strong>
                </div>
            </div>
            @forelse ($data->descriptions as $des)
            <div class="form-group" id="inputFormRow">
                <label class="col-sm-4 no-padding-right bolder" for="description">Description  <sup class="red">*</sup></label>
                    <div class="col-sm-1">
                        <input type="text"
                            id="style"
                            name="style[]"
                            required
                            placeholder="style here..."
                            value="{{ $des->style??'' }}"
                            class="form-control">
                        <strong class="red">{{ $errors->first('style') }}</strong>
                    </div>
                    <div class="col-sm-6">
                        <input type="text"
                            id="description"
                            name="description[{{ $des->id }}]"
                            required
                            placeholder="description here..."
                            value="{{ $des->description??'' }}"
                            class="form-control">
                        <strong class="red">{{ $errors->first('description') }}</strong>
                    </div>
                    <div class="input-group-btn">
                        <button class="btn btn-sm btn-info add-more" onclick="addMore()" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                        <button id="removeRow" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-minus"></i> Remove</button>
                    </div>
                </div>
                @empty
                <div class="form-group" id="inputFormRow">
                    <label class="col-sm-4 no-padding-right bolder" for="description">Description  <sup class="red">*</sup></label>
                    <div class="col-sm-1">
                        <input type="text"
                               id="style"
                               name="style[]"
                               required
                               placeholder="style here..."
                               value="{{old('style')}}"
                               class="form-control">
                        <strong class="red">{{ $errors->first('style') }}</strong>
                    </div>
                        <div class="col-sm-6">
                            <input type="text"
                                id="description"
                                name="new_description[]"
                                required
                                placeholder="description here..."
                                value="{{ old('new_description') }}"
                                class="form-control">
                            <strong class="red">{{ $errors->first('description') }}</strong>
                        </div>
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-info add-more" onclick="addMore()" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>

                        </div>
                </div>

                @endforelse



            <div id="newRow"></div>


            <!-- Buttons -->
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-6">
                    <button class="btn btn-sm btn-success submit create-button">
                        <i class="fa fa-save"></i> Save
                    </button>

                    <a href="{{route('backend.protocalSection.index')}}" class="btn btn-sm btn-gray">
                        <i class="fa fa-refresh"></i> Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
<script>

    function addMore(){
        var html = '';
            html += '<div id="inputFormRow">';
            html += `<div class="form-group">
                <label class="col-sm-4 no-padding-right bolder" for="description">  </label>
                <input type="text"
                               id="style"
                               name="new_style[]"
                               required
                               placeholder="style here..."
                               value="{{old('style')}}"
                               class="form-control">
                        <strong class="red">{{ $errors->first('style') }}</strong>
                <div class="col-sm-6">
                    <input type="text"
                           id="description"
                           name="new_description[]"
                           required
                           placeholder="description here..."
                           value="{{old('description')}}"
                           class="form-control">
                    <strong class="red">{{ $errors->first('description') }}</strong>
                </div>
                <div class="input-group-btn">
                    <button class="btn btn-sm btn-info add-more" onclick="addMore()" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                    <button id="removeRow" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-minus"></i> Remove</button>
                  </div>
            </div>`;
            html += '</div>';

        $("#newRow").append(html);
    }

    $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
</script>

@endpush
