@extends('dashboard')
@section('content')
<form method="post" action="{{route('user.store')}}">
    @csrf

    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add  Employee</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">NAME</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"/>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"/>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">national number</label>
                                    <input type="number" class="form-control" id="national_number" name="national_number"/>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">barth date</label>
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter email"/>
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
                                    <label class="form-label"
                                           for="basicInput">Date_of_employee_registration_in_system</label>
                                    <input type="date" class="form-control"
                                           name="Date_of_employee_registration_in_system"
                                           id="Date_of_employee_registration_in_system" placeholder="Enter email"/>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label"
                                           for="basicInput">Date_of_employee_registration_in_company</label>
                                    <input type="date" class="form-control" name="Date_of_employee_registration_in_company"
                                           id="Date_of_employee_registration_in_company" placeholder="Enter email"/>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">full salaray</label>
                                    <input type="number" class="form-control" name="total_salary" id="total_salary" placeholder="Jop salaray "/>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">pat salaray</label>
                                    <input type="number" class="form-control" name="partial_salary" id="partial_salary" placeholder="Jop salaray"/>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput"> working_days</label>
                                    <input type="number" class="form-control" name="working_days" id="working_days" placeholder="working_days"/>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput"> IMAGE</label>
                                    <input type="file" class="form-control" name="image" id="image" placeholder="working_days"/>
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
                                <h4 class="card-title"> Select Departmint</h4>
                            </div>
                            <div class="card-body">
                                <!-- Basic Select -->
                                <div class="mb-1">
                                    <label class="form-label" for="basicSelect">Basic Select</label>
                                    <select class="form-select" id="department_id">
                                        <option >select one</option>

                                    @foreach($departmint as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Select status of employyee</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-1">
                                    <label class="form-label" for="selectDefault">Default</label>
                                    <select class="form-select" id="status">
                                        <option selected>Open this select menu</option>
                                        <option value="official">official</option>
                                        <option value="hourly">hourly</option>
                                        <option value="part_time">part_time</option>
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
