@extends('dashboard')
@section('content')
    <form method="post" action="{{route('salaries.store')}}" enctype="multipart/form-data">
        @csrf
        <section class="bootstrap-select">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">user Select</h4>
                        </div>
                        <div class="card-body">
                            <!-- Basic Select -->
                            <div class="mb-1">
                                <label class="form-label" for="employee_id">user Select</label>
                                <select class="form-select" id="employee_id" name="employee_id">
                                    @foreach($user as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                </select>
                            </div>

                            <div class="mb-1">
                                <label class="form-label" for="section_id">user Select</label>
                                <select class="form-select" id="section_id" name="section_id">
                                    @foreach($section as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </section>

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
                                        <input type="text" class="form-control" id="employee_name" name="employee_name"
                                               placeholder="Enter name" value="" />
                                    </div>
                                </div>



                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">date </label>
                                        <input type="date" class="form-control" id="date" name="date"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">value</label>
                                        <input type="number" class="form-control" name="value" id="value"
                                               placeholder="Jop number"/>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">discounts</label>
                                        <input type="number" class="form-control" name="discounts" id="discounts"
                                               placeholder="discounts"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">Job_number</label>
                                        <input type="number" class="form-control" name="Job_number" id="Job_number"
                                               placeholder="discounts"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">social_security</label>
                                        <input type="number" class="form-control" name="social_security" id="social_security"
                                               placeholder="Jop number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">deductions</label>
                                        <input type="number" class="form-control" name="deductions" id="deductions"
                                               placeholder="Jop number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">national_number</label>
                                        <input type="number" class="form-control" name="national_number" id="national_number"
                                               placeholder="Jop number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">net_salary</label>
                                        <input type="number" class="form-control" name="net_salary" id="net_salary"
                                               placeholder="Jop number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">tax</label>
                                        <input type="number" class="form-control" name="tax" id="tax"
                                               placeholder="Jop number"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="content-body">
            <!-- Bootstrap Select start -->

        <button class="btn btn-primary" type="submit">save</button>
        </div>
    </form>
@endsection
