@extends('dashboard')
@section('content')
    <form method="post" action="{{route('offer_prices.store')}}" enctype="multipart/form-data">
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
                                        <label class="form-label" for="basicInput">title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               placeholder="Enter name"/>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">price</label>
                                        <input type="number" class="form-control" id="price" name="price"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput"> discount</label>
                                        <input type="number" class="form-control" id="discount" name="discount"
                                               placeholder="Enter email"/>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput"> tax</label>
                                        <input type="number" class="form-control" id="tax" name="tax"
                                               placeholder="Enter email"/>
                                    </div>
                                </div>
                                 <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput"> message</label>
                                        <input type="text" class="form-control" id="message" name="message"
                                               placeholder="Enter email"/>
                                    </div>
                                </div>
                                  <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput"> address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                               placeholder="Enter email"/>
                                    </div>
                                </div>

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
                            <h4 class="card-title">customer Select</h4>
                        </div>
                        <div class="card-body">
                            <!-- Basic Select -->
                            <div class="mb-1">
                                <label class="form-label" for="basicSelect">customer Select</label>
                                <select class="form-select" id="customer_id" name="customer_id">
                                    @foreach($customer as $item)
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
                            <h4 class="card-title">product_id Select</h4>
                        </div>
                        <div class="card-body">
                            <!-- Basic Select -->
                            <div class="mb-1">
                                <label class="form-label" for="basicSelect">product_id Select</label>
                                <select class="form-select" id="product_id" name="product_id">
                                    @foreach($product as $item)
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
    </form>
@endsection
