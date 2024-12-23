@extends('dashboard.layouts.master')
@section('title', __('backend.popups'))
@push("after-styles")
    <link rel="stylesheet"
          href="{{ asset('public/assets/dashboard/js/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}"
          type="text/css"/>
@endpush
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <h3><i class="material-icons">&#xe02e;</i> {{ __('backend.popupCreate') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ __('backend.home') }}</a> /
                    <a href="">{{ __('backend.popups') }}</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline">
                        <a class="nav-link" href="{{route("popups")}}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                {{Form::open(['route'=>['popupsStore'],'method'=>'POST', 'files' => true ])}}
                <div class="nav-active-border b-info">
                    <ul class="nav nav-md">
                        <li class="nav-item inline">
                            <a class="nav-link active" data-toggle="tab" data-target="#tab_details">
                                <span class="text-md"><i class="material-icons">&#xe055;</i> {{ __("backend.popupDetails") }}</span>
                            </a>
                        </li>
                        <li class="nav-item inline">
                            <a class="nav-link  " data-toggle="tab" data-target="#tab_settings">
                                <span class="text-md"><i class="material-icons">&#xe8a4;</i> {{ __("backend.popupSettings") }}</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content clear b-t">
                        <div class="tab-pane  active" id="tab_details">
                            <div class="p-a-2">
                                @foreach(Helper::languagesList() as $ActiveLanguage)
                                    @if($ActiveLanguage->box_status)
                                        <div class="form-group row">
                                            <label
                                                class="col-sm-2 form-control-label">{!!  __('backend.popupTitle') !!} {!! @Helper::languageName($ActiveLanguage) !!}
                                            </label>
                                            <div class="col-sm-10">
                                                {!! Form::text('title_'.@$ActiveLanguage->code,'', array('placeholder' => '','class' => 'form-control','required'=>'','maxlength'=>191, 'dir'=>@$ActiveLanguage->direction)) !!}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @foreach(Helper::languagesList() as $ActiveLanguage)
                                    @if($ActiveLanguage->box_status)
                                        <div class="form-group row">
                                            <label
                                                class="col-sm-2 form-control-label">{!!  __('backend.popupDetails') !!} {!! @Helper::languageName($ActiveLanguage) !!}
                                            </label>
                                            <div class="col-sm-10">
                                                {!! Form::textarea('details_'.@$ActiveLanguage->code,"", array('ui-jp'=>'summernote','placeholder' => '','class' => 'form-control summernote_'.@$ActiveLanguage->code, 'dir'=>@$ActiveLanguage->direction,'ui-options'=>'{height: 200,callbacks: {
    onImageUpload: function(files, editor, welEditable) {
    sendFile(files[0], editor, welEditable,"'.@$ActiveLanguage->code.'");
    }
    }}')) !!}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="form-group row">
                                    <label for="photo_file"
                                           class="col-sm-2 form-control-label">{!!  __('backend.backgroundPhoto') !!}</label>
                                    <div class="col-sm-10">
                                        {!! Form::file('photo', array('class' => 'form-control','accept'=>'image/*')) !!}
                                    </div>
                                </div>
                                <div class="form-group row m-t-md" style="margin-top: 0 !important;">
                                    <div class="offset-sm-2 col-sm-10">
                                        <small>
                                            <i class="material-icons">&#xe8fd;</i>
                                            {!!  __('backend.imagesTypes') !!}
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="link_status"
                                           class="col-sm-2 form-control-label">{!!  __('backend.pageCustomForm') !!}</label>
                                    <div class="col-sm-10">
                                        <select name="form_id" class="form-control c-select">
                                            <option value="">- - {!!  __('backend.none') !!} - -</option>
                                            <option value="-1">{!!  __('backend.newsletterSubscribe') !!}</option>
                                            @foreach($GeneralWebmasterSections->where("type",6) as $FWebmasterSection)
                                                <option
                                                    value="{{ $FWebmasterSection->id }}">{!!  $FWebmasterSection->{"title_".@Helper::currentLanguage()->code} !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_settings">
                            <div class="p-a-2">
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label
                                            class="form-control-label">{!!  __('backend.showIn') !!} </label>
                                        <select name="show_in" class="form-control c-select">
                                            <option value="0">{!!  __('backend.allPages') !!}</option>
                                            <option value="1">{!!  __('backend.homePage') !!}</option>
                                            <option value="2">{!!  __('backend.specificPages') !!}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label
                                            class="form-control-label">{!!  __('backend.showEvery') !!} </label>
                                        <select name="period" class="form-control c-select">
                                            @foreach(__("backend.showPeriods") as $k=>$v)
                                                <option value="{{ $k }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label
                                            class="form-control-label">{!!  __('backend.closable') !!} </label>
                                        <select name="closable" class="form-control c-select">
                                            <option value="1">{!!  __('backend.yes') !!}</option>
                                            <option value="0">{!!  __('backend.no') !!}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label
                                            class="form-control-label">{!!  __('backend.photoPosition') !!} </label>
                                        <select name="photo_position" class="form-control c-select">
                                            <option value="0">{!!  __('backend.photoAsBackground') !!}</option>
                                            <option value="1" selected>{!!  __('backend.photoAsSideBanner') !!}</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label
                                            class="form-control-label">{!!  __('backend.backgroundColor') !!} </label>

                                        <div id="cp1" class="input-group colorpicker-component">
                                            {!! Form::text('background_color',"#ffffff", array('placeholder' => '','class' => 'form-control','id'=>'style_color1', 'dir'=>'ltr')) !!}
                                            <span class="input-group-addon" id="cpbg"><i></i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label
                                            class="form-control-label">{!!  __('backend.delay') !!} </label>
                                        <input type="number" min="0" name="delay" class="form-control" value="2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label
                                            class="form-control-label">{!!  __('backend.width') !!} ( px ) </label>
                                        <input type="number" min="200" name="width" class="form-control" value="800">
                                    </div>
                                    <div class="col-sm-4">
                                        <label
                                            class="form-control-label">{!!  __('backend.height') !!} ( px ) ( 0 = auto
                                            )</label>
                                        <input type="number" min="0" name="height" class="form-control" value="0">
                                    </div>
                                    <div class="col-sm-4">
                                        <label
                                            class="form-control-label">{!!  __('backend.backdropOpacity') !!} ( 0 - 100
                                            ) %</label>
                                        <input type="number" min="0" max="100" name="backdrop_opacity"
                                               class="form-control"
                                               value="70">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label
                                            class="form-control-label">{!!  __('backend.customCode') !!}</label>
                                        <textarea name="code" class="form-control" rows="7" placeholder="<style>
...
</style>

<script>
...
</script>"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-x-2 p-b-2">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-lg btn-primary m-t"><i class="material-icons">
                                    &#xe31b;</i> {!! __('backend.add') !!}</button>
                            <a href="{{route("popups")}}"
                               class="btn btn-lg btn-default m-t"><i class="material-icons">
                                    &#xe5cd;</i> {!! __('backend.cancel') !!}</a>
                        </div>
                    </div>
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
@push("after-scripts")

    <script src="{{ asset('public/assets/dashboard/js/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script>
        $(function () {
            let colors = {
                'black': '#000000',
                'white': '#ffffff',
                'red': '#FF0000',
                'default': '#777777',
                'primary': '#337ab7',
                'success': '#5cb85c',
                'info': '#5bc0de',
                'warning': '#f0ad4e',
                'danger': '#d9534f'
            };
            $('#cp1').colorpicker({
                colorSelectors: colors
            });
            $('#cp2').colorpicker({
                colorSelectors: colors
            });
        });
    </script>

    <script src="{{ asset("public/assets/dashboard/js/summernote/dist/summernote.js") }}"></script>
    <script>
        function sendFile(file, editor, welEditable, lang) {
            data = new FormData();
            data.append("file", file);
            data.append("_token", "{{csrf_token()}}");
            $.ajax({
                data: data,
                type: 'POST',
                xhr: function () {
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
                    return myXhr;
                },
                url: "{{ route("topicsPhotosUpload") }}",
                cache: false,
                contentType: false,
                processData: false,
                success: function (url) {
                    var image = $('<img>').attr('src', '{{ asset("public/uploads/topics/") }}/' + url);
                    @foreach(Helper::languagesList() as $ActiveLanguage)
                        @if($ActiveLanguage->box_status)
                    if (lang == "{{ $ActiveLanguage->code }}") {
                        $('.summernote_{{ $ActiveLanguage->code }}').summernote("insertNode", image[0]);
                    }
                    @endif
                    @endforeach
                }
            });
        }

        // update progress bar
        function progressHandlingFunction(e) {
            if (e.lengthComputable) {
                $('progress').attr({value: e.loaded, max: e.total});
                // reset progress on complete
                if (e.loaded == e.total) {
                    $('progress').attr('value', '0.0');
                }
            }
        }
    </script>
@endpush
