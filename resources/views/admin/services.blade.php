@extends('layouts.admin.admin')
@section('frontend')
    <main>
        <div class="container">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">



                <div class="col-md-3">
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
                            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">ICON</label>
                                    <input type="text" class="form-control" value="" name="icon" id="" aria-describedby=""
                                        placeholder="Enter ICON">

                                </div>

                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" value="" id="" name="title"
                                        aria-describedby="" placeholder="Enter Title">

                                </div>
                                <div class="form-group">


                                    <label for="">Description</label>

                                    <textarea class="form-control" name="description" id="" cols="10" rows="5"></textarea>

                                </div>

                                <button type="submit" class="btn btn-primary">submit</button>
                            </form>
                        </div>
                    </div>
                </div>





                <div class="col-md-9 table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>

                                <th scope="col">Icon</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servicesData as $serviceData)
                                <tr>
                                    <td><i class="{{ $serviceData->icon }}"></i></td>
                                    <td>{{ $serviceData->title }}</td>
                                    <td style="word-break: break-all;">{{ $serviceData->description }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('service.edit', $serviceData->id) }}" type="button"
                                                class="btn btn-success btn-remove"> <i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ route('service.delete', $serviceData->id) }}" type="button"
                                                class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>


        </div>

    </main>
@endsection
