@extends('layouts.admin.admin')
@section('frontend')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Main Form
                        </div>
                        @if (session()->has('addstatus'))
                            <div class="alert alert-success">
                                {{ session()->get('addstatus') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <form action="{{ route('main.store', $mainData->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" value="{{ $mainData->title }}" name="title"
                                        id="" aria-describedby="emailHelp" placeholder="Enter Title">

                                </div>
                                <input type="hidden" value="{{ $mainData->id }}">
                                <div class="form-group">
                                    <label for="">Sub-Title</label>
                                    <input type="text" class="form-control" value="{{ $mainData->sub_title }}" id=""
                                        name="sub_title" aria-describedby="emailHelp" placeholder="Enter Title">

                                </div>
                                <div class="form-group">
                                    <img class="pt-1" height="100px" width="100px"
                                        src="{{ asset('uploads/bg_img') }}/{{ $mainData->bg_img }}" alt="">
                                    <br>
                                    <label for="">BG-Image</label>

                                    <input type="File" class="form-control" id="" name="bg_img"
                                        aria-describedby="emailHelp" placeholder="Enter Title">

                                </div>
                                <div class="form-group">

                                    <br>
                                    <label for="">Resume</label>
                                    <input type="file" class="form-control" id="" name="resume"
                                        aria-describedby="emailHelp" placeholder="Enter Title">
                                    <span>{{ $mainData->resume }}</span>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>
@endsection
