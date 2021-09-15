@extends('layouts.admin.admin')
@section('frontend')
    <main>
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">



                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Services Form
                        </div>
                        @if (session()->has('addstatus'))
                            <div class="alert alert-success">
                                {{ session()->get('addstatus') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <form action="{{ route('services.update', $serviceSingleData->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">ICON</label>
                                    <input type="text" class="form-control" value="{{ $serviceSingleData->icon }}"
                                        name="icon" id="" aria-describedby="" placeholder="Enter ICON">

                                </div>

                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" value="{{ $serviceSingleData->title }}"
                                        id="" name="title" aria-describedby="" placeholder="Enter Title">

                                </div>
                                <div class="form-group">


                                    <label for="">Description</label>

                                    <textarea class="form-control" name="description" id="" cols="10"
                                        rows="5">{{ $serviceSingleData->description }}</textarea>

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
