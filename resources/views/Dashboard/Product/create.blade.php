@extends('dashboard')
@section('content')
    <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
        @csrf

        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Inputs</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"/>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">description</label>
                                        <input type="text" class="form-control" id="description" name="description"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput"> price</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter email"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">quantity </label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" />
                                    </div>
                                </div>



                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">image</label>
                                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter name"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bootstrap-select">

            <div class="content-body">
                <!-- Bootstrap Select start -->
                <section class="bootstrap-select">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">  specialization</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Basic Select -->
                                    <div class="mb-1">
                                        <label class="form-label" for="selectDefault">type</label>
                                        <select class="form-select" id="type">
                                            <option selected>Open this select menu</option>
                                                <option value="product">product</option>
                                                <option value="serves">serves</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </section>
                <button class="btn btn-primary" type="submit">save</button>
            </div>

        </section>
        <!-- Checkbox and radio addons -->
    </form>
@endsection
