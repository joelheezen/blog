@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="middle-text">
                        This website is meant to be a portfolio for myself, I am Joel Heezen a student CMGT(Creative Media and Game Technologies) at Hogeschool Rotterdam. <br><br>

                        The purpose of this site is to show off my projects, and for people to give feedback.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
