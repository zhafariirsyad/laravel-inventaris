@extends('templates.temp')

@section('title','Dashboard')

@section('content')
    <div class="row">
        <br>
    	<div class="notika-status-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                            <img src="{{ asset('asset/images/539380.jpg') }}" alt="" style="width: 500px;height: 250px;">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                            <embed src="{{ asset('asset/videoplayback.mp4') }}" type="" style="width: 500px;height: 250px;">
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>    

@endsection