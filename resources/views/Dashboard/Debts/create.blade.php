@extends('dashboard')
@section('content')
    <form method="post" action="{{route('debt.store')}}" enctype="multipart/form-data">
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
                                        <label class="form-label" for="basicInput">employee_name</label>
                                        <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="Enter name"/>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">national_number</label>
                                        <input type="number" class="form-control" id="national_number" name="national_number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput"> date</label>
                                        <input type="date" class="form-control" id="date" name="date" placeholder="Enter email"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">specialization </label>
                                        <input type="text" class="form-control" id="specialization" name="specialization" />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">Jop number</label>
                                        <input type="number" class="form-control" name="Job_number" id="Job_number" placeholder="Jop number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">value</label>
                                        <input type="number" class="form-control" name="value" id="value" placeholder="Jop number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">description</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter name"/>
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
                                        <label class="form-label" for="selectDefault">specialization</label>
                                        <select class="form-select" id="specialization">
                                            <option selected>Open this select menu</option>
                                            @foreach($specialization as $item)
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
