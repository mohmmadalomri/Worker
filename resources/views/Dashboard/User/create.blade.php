@extends('dashboard')
@section('content')

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
                                    <label class="form-label" for="basicInput">NAME</label>
                                    <input type="text" class="form-control" id="basicInput" placeholder="Enter email" />
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">national number</label>
                                    <input type="number" class="form-control" id="basicInput"  />
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">barth date</label>
                                    <input type="date" class="form-control" id="basicInput" placeholder="Enter email" />
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">Jop number</label>
                                    <input type="number" class="form-control" id="basicInput" placeholder="Jop number" />
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">Date_of_employee_registration_in_system</label>
                                    <input type="date" class="form-control" id="basicInput" placeholder="Enter email" />
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="basicInput">Date_of_employee_registration_in_company</label>
                                    <input type="date" class="form-control" id="basicInput" placeholder="Enter email" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bootstrap-select">
        <section id="basic-checkbox">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Checkboxes</h4>
                        </div>
                        <div class="card-body">
                            <div class="demo-inline-spacing">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="checked" checked />
                                    <label class="form-check-label" for="inlineCheckbox1">Checked</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked" />
                                    <label class="form-check-label" for="inlineCheckbox2" >Unchecked</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked" />
                                    <label class="form-check-label" for="inlineCheckbox2">Unchecked</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked" />
                                    <label class="form-check-label" for="inlineCheckbox2">Unchecked</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked" />
                                    <label class="form-check-label" for="inlineCheckbox2">Unchecked</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked" />
                                    <label class="form-check-label" for="inlineCheckbox2">Unchecked</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="unchecked" />
                                    <label class="form-check-label" for="inlineCheckbox2">Unchecked</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Select Department </h4>
                    </div>
                    <div class="card-body">
                        <!-- Basic Select -->
                        <div class="mb-1">
                            <label class="form-label" for="basicSelect">Basic Select</label>
                            <select class="form-select" id="basicSelect">

                                <option>IT</option>

                            </select>
                        </div>



                    </div>

                </div>
            </div>


        </div>

    </section>
    <!-- Checkbox and radio addons -->


@endsection
