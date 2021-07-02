@extends('backend.layouts.master')
@section('title', 'Add Item')
@section('page-header')
    <i class="fa fa-plus"></i> Add Item
@endsection

@section('content')
    @include('backend.components.page_header', [
       'fa' => 'fa fa-list',
       'name' => 'Item List',
       'route' => route('backend.product.items.index')
    ])

    <div class="col-sm-12">
        <form role="form"
              method="post"
              class="form-horizontal"
              enctype="multipart/form-data"
              action="{{route('backend.product.items.store')}}">
            @csrf
            <div class="row">
                <div class="col-sm-6">

                    <!-- Name -->
                    <div class="form-group">
                        <label class="col-sm-3 bolder" for="name">Name <sup class="red">*</sup></label>
                        <div class="col-sm-8">
                            <input type="text"
                                   id="name"
                                   name="name"
                                   placeholder="Name"
                                   class="form-control input-sm"
                                   value="{{old('name')}}">
                            <strong class="red">{{ $errors->first('name') }}</strong>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="form-group">
                        <label class="col-sm-3 bolder" for="price">Price <sup class="red">*</sup></label>
                        <div class="col-sm-8">
                            <input type="text"
                                   id="price"
                                   name="price"
                                   placeholder="0"
                                   class="form-control input-sm"
                                   value="{{old('price')}}">
                            <strong class="red">{{ $errors->first('price') }}</strong>
                        </div>
                    </div>

                    <!-- Discount -->
                    <div class="form-group">
                        <label for="discount" class="col-sm-3 bolder">Discount
                            <label data-toggle="buttons" class="btn-group btn-group-mini btn-overlap btn-corner">
                                <label for="d1" class="btn btn-sm btn-white btn-info">
                                    <input id="d1" type="radio" value="percent" name="discount_type">
                                    <span class="bigger-110">%</span>
                                </label>
                                <label for="d2" class="btn btn-sm btn-white btn-info">
                                    <input id="d2" type="radio" value="amount" name="discount_type">
                                    <span class="bigger-110">$</span>
                                </label>
                            </label>
                        </label>
                        <div class="col-sm-8">
                            <input type="text"
                                   id="discount"
                                   name="discount"
                                   placeholder="0"
                                   class="form-control input-sm"
                                   value="{{old('discount')}}">
                            <strong class="red">{{ $errors->first('discount') }}</strong>
                            <strong class="red">{{ $errors->first('discount_type') }}</strong>
                        </div>
                    </div>

                    <!-- Opening Balance -->
                    <div class="form-group">
                        <label class="col-sm-3 bolder" for="opening_balance">Opening Balance<sup class="red">*</sup></label>
                        <div class="col-sm-8">
                            <input type="text"
                                   id="opening_balance"
                                   name="opening_balance"
                                   placeholder="0"
                                   class="form-control input-sm"
                                   value="{{old('opening_balance')}}">
                            <strong class="red">{{ $errors->first('opening_balance') }}</strong>
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label class="col-sm-3 bolder" for="category_id">Category <sup class="red">*</sup></label>

                        <div class="col-sm-8">
                            <div class="text-center">
                                @php
                                    $category_id = old('category_id') ?? '';
                                    $catSub = explode('-', $category_id);
                                    $subCategory_id = null;
                                    if(count($catSub) == 2)
                                    {
                                        $subCategory_id = $catSub[1];
                                    }
                                @endphp
                                <select class="chosen-select" id="category_id" name="category_id">
                                    <option value="">- Category / Subcategory -</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                class="bolder bigger-110"
                                                style="{{$loop->first ? '' : 'margin-top: 5px'}}"
                                            {{ !$subCategory_id && $category_id == $category->id ? 'selected' : ''}}>
                                            {{ $category->title }}
                                        </option>
                                        @foreach($category->sub_categories as $subCategory)
                                            <option value="{{ $category->id . '-' . $subCategory->id }}"
                                                    style="border-top: 1px solid #eee"
                                                {{ $subCategory_id == $subCategory->id ? 'selected' : ''}}>
                                                {{ $subCategory->title }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <strong class=" red">{{ $errors->first('category_id') }}</strong>
                        </div>
                    </div>

                    <!-- Unit -->
                    <div class="form-group">
                        <label class="col-sm-3 bolder" for="unit_id">Unit <sup class="red">*</sup></label>

                        <div class="col-sm-8">
                            <div class="text-center">
                                <select class="chosen-select" id="unit_id" name="unit_id">
                                    <option value="">- Unit -</option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{old('unit_id') == $unit->id ? 'selected' : ''}}>{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <strong class=" red">{{ $errors->first('unit_id') }}</strong>
                        </div>
                    </div>

                    <!-- Origin -->
                    <div class="form-group">
                        <label class="col-sm-3 bolder" for="origin_id">Origin <sup class="red">*</sup></label>

                        <div class="col-sm-8">
                            <div class="text-center">
                                <select class="chosen-select" id="origin_id" name="origin_id">
                                    <option value="">- Origin -</option>
                                    @foreach($origins as $origin)
                                        <option value="{{ $origin->id }}"
                                            {{old('origin_id') == $origin->id ? 'selected' : ''}}>
                                            {{ $origin->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <strong class=" red">{{ $errors->first('origin_id') }}</strong>
                        </div>
                    </div>

                    <!-- Brand -->
                    <div class="form-group">
                        <label class="col-sm-3 bolder" for="brand_id">Brand <sup class="red">*</sup></label>

                        <div class="col-sm-8">
                            <div class="text-center">
                                <select class="chosen-select" id="brand_id" name="brand_id">
                                    <option value="">- Brand -</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{old('brand_id') == $brand->id ? 'selected' : ''}}>{{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <strong class=" red">{{ $errors->first('brand_id') }}</strong>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button class="btn btn-sm btn-success submit create-button">
                                <i class="fa fa-save"></i> Add
                            </button>

                            <a href="{{route('backend.product.items.index')}}" class="btn btn-sm btn-gray">
                                <i class="fa fa-refresh"></i> Cancel
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">

                    <!-- Feature Image -->
                    <div class="form-group">
                        <label class="col-sm-offset-1 col-sm-3 bolder" for="feature_image">Feature Image
                        </label>
                        <div class="col-sm-8">
                            <input name="feature_image"
                                   type="file"
                                   id="feature_image"
                                   class="form-control input-sm single-file">
                            <strong class="text-primary">Minimum 100x100 pixels</strong>
                            @error('feature_image')
                            <br>
                            <strong class="red">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <!-- Images -->
                    <div class="form-group">
                        <label class="col-sm-offset-1 col-sm-3 bolder" for="images">Item Images</label>
                        <div class="col-sm-8">
                            <input name="images[]"
                                   multiple
                                   type="file"
                                   id="images"
                                   class="form-control input-sm multiple-file">
                            <strong class="text-primary">Minimum 100x100 pixels</strong>
                            @error('images.*')
                            <br>
                            <strong class="red">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        jQuery(function ($) {
            if (!ace.vars['touch']) {
                $('.chosen-select').chosen({allow_single_deselect: true, search_contains: true});
                //resize the chosen on window resize
                $(window).on('resize.chosen', function () {
                    $('.chosen-select').each(function () {
                        let $this = $(this);
                        $this.next().css({'width': '100%'});
                        // $this.next().css({'width': $this.parent().width()});
                    })
                }).trigger('resize.chosen');
            }
        });
    </script>
@endpush
