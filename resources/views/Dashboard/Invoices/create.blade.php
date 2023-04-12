@extends('dashboard')
@section('content')
    <form method="post" action="{{route('invoices.store')}}" enctype="multipart/form-data">
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
                                        <label class="form-label" for="basicInput">date</label>
                                        <input type="date" class="form-control" id="date" name="date"/>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput"> remaining_amount</label>
                                        <input type="number" class="form-control" id="remaining_amount" name="remaining_amount"
                                               placeholder="Enter email"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput"> value</label>
                                        <input type="number" class="form-control" id="value" name="value"
                                               placeholder="Enter email"/>
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
                                        <label class="form-label" for="basicInput"> total</label>
                                        <input type="number" class="form-control" id="total" name="total"
                                               placeholder="Enter email"/>
                                    </div>
                                </div>
                                </div>
                                  <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput"> massage</label>
                                        <input type="text" class="form-control" id="massage" name="massage"
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
                            <h4 class="card-title">customer_id Select</h4>
                        </div>
                        <div class="card-body">
                            <!-- Basic Select -->
                            <div class="mb-1">
                                <label class="form-label" for="basicSelect">customer_id Select</label>
                                <select class="form-select" id="customer_id" name="customer_id">
                                    @foreach($customer as $item)
                                        <option value="{{$item->id}}">{{$item->last_name}}</option>
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
                            <h4 class="card-title">order_id Select</h4>
                        </div>
                        <div class="card-body">
                            <!-- Basic Select -->
                            <div class="mb-1">
                                <label class="form-label" for="basicSelect">order_id Select</label>
                                <select class="form-select" id="order_id" name="order_id">
                                    @foreach($order as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
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
