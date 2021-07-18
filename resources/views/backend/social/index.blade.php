@extends('backend.layouts.master')
@section('title', 'Social Link')
@section('page-header')
    <i class="fa fa-info"></i> Social Link
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
    @include('backend.components.page_header')

    <div class="col-sm-9">
        <form action="{{ route('backend.social.store') }}" method="post" class="form-horizontal"
              role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="col-sm-2 no-padding-right bolder" for="youtube">Youtube</label>

                <div class="col-sm-10">
                    <input name="youtube"
                           type="text"
                           id="youtube"
                           placeholder="youtube link"
                           class="form-control"
                           value="{{ $social->youtube ?? old('youtube') }}">
                </div>
                <div class="col-sm-9 col-sm-offset-2">
                    <strong class=" red">{{ $errors->first('youtube') }}</strong>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 no-padding-right bolder" for="instagram">Instagram</label>

                <div class="col-sm-10">
                    <input name="instagram"
                           type="text"
                           id="instagram"
                           placeholder="instagram link"
                           class="form-instagram"
                           value="{{ $social->instagram ?? old('instagram') }}">
                </div>
                <div class="col-sm-9 col-sm-offset-2">
                    <strong class=" red">{{ $errors->first('instagram') }}</strong>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 no-padding-right bolder" for="facebook">facebook</label>

                <div class="col-sm-10">
                    <input name="facebook"
                           type="text"
                           id="facebook"
                           placeholder="facebook link"
                           class="form-control"
                           value="{{ $social->facebook ?? old('facebook') }}">
                </div>
                <div class="col-sm-9 col-sm-offset-2">
                    <strong class=" red">{{ $errors->first('facebook') }}</strong>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 no-padding-right bolder" for="twitter">Twitter</label>

                <div class="col-sm-10">
                    <input name="twitter"
                           type="text"
                           id="twitter"
                           placeholder="twitter link"
                           class="form-control"
                           value="{{ $social->twitter ?? old('twitter') }}">
                </div>
                <div class="col-sm-9 col-sm-offset-2">
                    <strong class=" red">{{ $errors->first('twitter') }}</strong>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 no-padding-right bolder" for="twitter">Telegram</label>

                <div class="col-sm-10">
                    <input name="telegram"
                           type="text"
                           id="telegram"
                           placeholder="telegram link"
                           class="form-control"
                           value="{{ $social->telegram ?? old('telegram') }}">
                </div>
                <div class="col-sm-9 col-sm-offset-2">
                    <strong class=" red">{{ $errors->first('telegram') }}</strong>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 no-padding-right bolder" for="Reddit">Reddit</label>

                <div class="col-sm-10">
                    <input name="reddit"
                           type="text"
                           id="reddit"
                           placeholder="reddit link"
                           class="form-control"
                           value="{{ $social->reddit ?? old('reddit') }}">
                </div>
                <div class="col-sm-9 col-sm-offset-2">
                    <strong class=" red">{{ $errors->first('reddit') }}</strong>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 no-padding-right bolder" for="medium">Medium</label>

                <div class="col-sm-10">
                    <input name="medium"
                           type="text"
                           id="medium"
                           placeholder="medium link"
                           class="form-control"
                           value="{{ $social->medium ?? old('medium') }}">
                </div>
                <div class="col-sm-9 col-sm-offset-2">
                    <strong class=" red">{{ $errors->first('medium') }}</strong>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 no-padding-right bolder" for="discord">Discord</label>

                <div class="col-sm-10">
                    <input name="discord"
                           type="text"
                           id="discord"
                           placeholder="discord link"
                           class="form-control"
                           value="{{ $social->discord ?? old('discord') }}">
                </div>
                <div class="col-sm-9 col-sm-offset-2">
                    <strong class=" red">{{ $errors->first('discord') }}</strong>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-12">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="ace-icon fa fa-floppy-o"></i>
                            Submit
                        </button>
                    </div>
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
