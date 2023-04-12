@extends('dashboard')
@section('content')
    <form method="post" action="{{route('task_employees.store')}}" enctype="multipart/form-data">
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
                                <select class="form-select" id="user_id" name="user_id">
                                    @foreach($user as $item)
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
                                        <label class="form-label" for="basicInput">national_number </label>
                                        <input type="number" class="form-control" id="national_number" name="national_number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">Job_number</label>
                                        <input type="number" class="form-control" name="Job_number" id="Job_number"
                                               placeholder="Jop number"/>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="discounts"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">description</label>
                                        <input type="text" class="form-control" name="description" id="description"
                                               placeholder="discounts"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">image</label>
                                        <input type="file" class="form-control" name="image" id="image"
                                               placeholder="Jop number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">massage</label>
                                        <input type="text" class="form-control" name="massage" id="massage"
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
