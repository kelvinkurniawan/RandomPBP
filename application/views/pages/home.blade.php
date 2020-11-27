@extends('layouts.master')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="row col-md-12">
            <div class="col-md-3 d-flex justify-content-between align-items-center">
                <a class="navbar-brand" href="#">Randomize</a>
                <a href="#" class="nav-link">
                    <i class="gg-home-alt"></i>
                </a>
            </div>
            <div class="col-md-6 d-flex justify-content-between align-items-center">
                <div class="left">
                    <a href="#" class="nav-link primary">Discover</a>
                </div>
                <div class="right d-flex justify-content-between align-items-center">
                    <a href="#" class="nav-link">
                        <i class="gg-search"></i>
                    </a>
                    <a href="#" class="btn btn-primary btn-randomize">Create Stories</a>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-between align-items-center">
                <a href="#" class="nav-link">
                    <i class="gg-notifications"></i>
                </a>
                <div class="profile-nav d-flex justify-content-between align-items-center">
                    Your name
                    <i class="ml-3 gg-user"></i>
                </div>
            </div>
        </div>
    </nav>
    <div class="container d-flex align-items-center justify-content-center h-100 pt-5 mt-5">
        <div class="row">
            <div class="col-md-3">
                
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection