@extends('dashboard')
@section('content')
    <form method="post" action="{{route('vacation.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6 col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">CHOES USER</h4>
                </div>
                <div class="card-body">
                    <!-- Basic Select -->
                    <div class="mb-1">
                        <label class="form-label" for="selectDefault">USER</label>
                        <select class="form-select" id="user-select">
                            <option selected>Open this select menu</option>
                            @foreach($users as $item)
                                <option value="{{$item->id}}" id="user-select">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        </div>
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Vacation Inputs</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">employee_name</label>
                                        <input type="text" class="form-control auto-fill" id="employee_name"
                                               name="employee_name"
                                               placeholder="Enter name" value=""/>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">national_number</label>
                                        <input type="number" class="form-control auto-fill" id="national_number"
                                               name="national_number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput"> date</label>
                                        <input type="date" class="form-control auto-fill" id="date" name="date"
                                               placeholder="Enter email"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">specialization </label>
                                        <input type="text" class="form-control" id="specialization"
                                               name="specialization"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">Jop number</label>
                                        <input type="number" class="form-control auto-fill" name="Job_number"
                                               id="Job_number"
                                               placeholder="Jop number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">description</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                               placeholder="Enter name"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">reason</label>
                                        <input type="text" class="form-control" id="reason" name="reason"
                                               placeholder="Enter name"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">image</label>
                                        <input type="file" class="form-control" id="image" name="image"
                                               placeholder="Enter name"/>
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
                                    <h4 class="card-title"> نوع لااجاهزة</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Basic Select -->
                                    <div class="mb-1">
                                        <label class="form-label" for="selectDefault">Default</label>
                                        <select class="form-select" id="status">
                                            <option selected>Open this select menu</option>
                                            <option value="paid">paid</option>
                                            <option value="sick">sick</option>
                                            <option value="without_salary_deduction">without_salary_deduction</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> القسم</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Basic Select -->
                                    <div class="mb-1">
                                        <label class="form-label" for="selectDefault">departmint</label>
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

        <script>
            $(function () {
                // Listen to the change event on the user select element
                $('#user-select').change(function () {
                    // Get the selected user ID
                    var id = $(this).val();
                    // Make an AJAX request to get the user's details
                    $.ajax({
                        url: 'user/show' + id,
                        method: 'GET',
                        dataType: 'json',
                        success: function (response) {
                            // Populate the fields with the user's details
                            $('#employee_name').val(response.employee_name);
                            $('#national_number').val(response.national_number);
                            $('#date').val(response.date);
                            $('#specialization').val(response.specialization);
                            $('#Job_number').val(response.Job_number);
                            $('#description').val(response.description);
                            $('#reason').val(response.reason);
                        }
                    });
                });
            });
        </script>

    </form>
@endsection
