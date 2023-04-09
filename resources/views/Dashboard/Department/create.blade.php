@extends('dashboard')
@section('content')
    <form action="{{route('departmint.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">NAME</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">name</label>
                                        <input type="text" name="name" class="form-control" id="basicInput"
                                               placeholder="Enter email"/>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="basicInput">DESCRIPTION</label>
                                                <input type="text" class="form-control" id="description"
                                                       name="description"/>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <section id="input-file-browser">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">File input</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                    <label for="formFile" class="form-label">IMAGE</label>
                                    <input class="form-control" type="file" id="image" name="image"/>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Bootstrap Select start -->

        <button class="btn btn-primary" type="submit">SAVE</button>
    </form>
    <!-- Bootstrap Select end -->
@endsection
