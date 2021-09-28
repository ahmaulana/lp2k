@extends('voyager::master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', 'Import Data')

@section('page_header')
<h1 class="page-title">
    <i class="voyager-people"></i>
    Upload Data
</h1>
@include('voyager::multilingual.language-selector')
@stop

@section('content')
<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-bordered">
                <!-- form start -->
                <form class="form-edit-add" action="{{ route('voyager.peserta.post-import') }}" method="POST" enctype="multipart/form-data">
                    <!-- PUT Method if we are editing -->

                    <!-- CSRF TOKEN -->
                    {{ csrf_field() }}

                    <div class="panel-body">
                        <!-- Adding / Editing -->

                        <!-- GET THE DISPLAY OPTIONS -->

                        <div class="form-group  col-md-12 ">

                            <label class="control-label" for="name">Upload Excel/CSV</label>
                            <input type="file" name="import">

                        </div>
                        <!-- GET THE DISPLAY OPTIONS -->
                        <input type="text" name="training_id" value="{{ request()->id }}" hidden="">
                    </div><!-- panel-body -->

                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary save">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@stop

@section('javascript')
<script>
    $('document').ready(function () {
        $(".breadcrumb li:eq(1)").remove()
        $(".breadcrumb li:eq(1) a").attr("href", "{{ route('voyager.peserta.index') . '?id=' . request()->id }}")
    })
</script>
@stop