@extends('layouts.admin.admin')
@section('frontend')


    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-md-2"></div>


                <div class=" col-md-offset-2 col-md-8 ">
                    <div class="card">
                        <div class="card-header">
                            About Form
                        </div>
                        @if (session()->has('addstatus'))
                            <div class="alert alert-success">
                                {{ session()->get('addstatus') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ol>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ol>

                            </div>


                        @endif
                        <div class="card-body">
                            <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <input type="file" class="form-control" name="image" id="" aria-describedby=""
                                                placeholder="">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Year</label>
                                            <input type="text" value="" class="form-control" id="" name="year"
                                                aria-describedby="" placeholder="Enter Title">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">


                                            <label for="">Title</label>

                                            <input type="text" class="form-control" id="" name="title" aria-describedby=""
                                                placeholder="Title">

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">


                                            <label for="">Project Description</label>
                                            <br>
                                            <textarea class="form-control" name="description" id="" cols="80"
                                                rows=""></textarea>

                                        </div>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-default">Save</button>
                                </div>




                            </form>
                        </div>
                    </div>
                </div>






            </div>

        </div>
    </main>
@endsection
