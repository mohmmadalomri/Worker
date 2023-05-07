@extends('dashboard')
@section('content')
    <form method="post" action="{{route('project.store')}}" enctype="multipart/form-data">
        @csrf

        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">PROJECT Inputs</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Enter name"/>
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
                                        <input type="number" class="form-control" id="price" name="price"
                                               placeholder="Enter email"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">total_price </label>
                                        <input type="number" class="form-control" id="total_price" name="total_price"/>
                                    </div>
                                </div>


                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">image</label>
                                        <input type="file" class="form-control" id="image" name="image"
                                               placeholder="Enter name"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">began_date</label>
                                        <input type="date" class="form-control" id="began_date" name="began_date"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">end_date</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date"/>
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
                                    <h4 class="card-title"> customer</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Basic Select -->
                                    <div class="mb-1">
                                        <label class="form-label" for="selectDefault">customer</label>
                                        <select class="form-select" id="customer_id" name="customer_id">
                                            <option selected>Open this select menu</option>
                                            @foreach($customers as $item)
                                                <option value="{{$item->id}}">{{$item->first_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </section>
                <section class="bootstrap-select">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> product</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Basic Select -->
                                    <div class="mb-1">
                                        <label class="form-label" for="selectDefault">product</label>
                                        <select class="form-select" id="product_id" name="product_id">
                                            <option selected>Open this select menu</option>
                                            @foreach($products as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </section>


                <section class="bootstrap-select">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> grope</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Basic Select -->
                                    <div class="mb-1">
                                        <label class="form-label" for="selectDefault">grope</label>
                                        <select class="form-select" id="grope_id" name="grope_id">
                                            <option selected>Open this select menu</option>
                                            @foreach($groups as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </section>
                <section class="bootstrap-select">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> admin</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Basic Select -->
                                    <div class="mb-1">
                                        <label class="form-label" for="selectDefault">admin</label>
                                        <select class="form-select" id="admin" name="admin">
                                            <option selected>Open this select menu</option>
                                            @foreach($users as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
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
