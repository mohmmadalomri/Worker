@extends('dashboard')
@section('content')
    <form method="post" action="{{route('orders.store')}}" enctype="multipart/form-data">
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
                                        <label class="form-label" for="basicInput">details</label>
                                        <input type="text" class="form-control" id="details" name="details"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput"> notes</label>
                                        <input type="text" class="form-control" id="notes" name="notes"
                                               placeholder="Enter email"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput"> date</label>
                                        <input type="date" class="form-control" id="date" name="date"
                                               placeholder="Enter email"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput"> begin_date</label>
                                        <input type="date" class="form-control" id="begin_date" name="begin_date"
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
                            <h4 class="card-title">Bootstrap Select</h4>
                        </div>
                        <div class="card-body">
                            <!-- Basic Select -->
                            <div class="mb-1">
                                <label class="form-label" for="basicSelect">admin Select</label>
                                <select class="form-select" id="customer_id" name="customer_id">
                                    @foreach($coustomer as $item)
                                        <option value="{{$item->id}}">{{$item->first_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bootstrap Select</h4>
                        </div>
                        <div class="card-body">
                            <!-- Basic Select -->
                            <div class="mb-1">
                                <label class="form-label" for="basicSelect">group Select</label>
                                <select class="form-select" id="group_id" name="group_id">
                                    @foreach($group as $item)
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
