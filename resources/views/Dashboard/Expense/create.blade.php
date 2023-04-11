@extends('dashboard')
@section('content')
    <form method="post" action="{{route('expense.store')}}" enctype="multipart/form-data">
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
                                        <label class="form-label" for="basicInput"> purpose</label>
                                        <input type="text" class="form-control" id="purpose" name="purpose"
                                               placeholder="Enter email"/>
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


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <button class="btn btn-primary" type="submit">save</button>

    </form>
@endsection
