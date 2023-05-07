@extends('dashboard')
@section('content')
    <form method="post" action="{{route('customers.store')}}" enctype="multipart/form-data">
        @csrf

        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">customers Inputs</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">first_name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                               placeholder="Enter name"/>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">last_name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput"> company_name</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name"
                                               placeholder="Enter email"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">phone </label>
                                        <input type="number" class="form-control" id="phone" name="phone"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                               placeholder="Jop number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">website</label>
                                        <input type="url" class="form-control" name="website" id="website"
                                               placeholder="Jop number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">facebook_link</label>
                                        <input type="url" class="form-control" name="facebook_link" id="facebook_link"
                                               placeholder="Jop number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">tweeter_link</label>
                                        <input type="url" class="form-control" name="tweeter_link" id="tweeter_link"
                                               placeholder="Jop number"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">youtube_link</label>
                                        <input type="url" class="form-control" name="youtube_link" id="youtube_link"
                                               placeholder=" youtube_link"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">linkedin_link</label>
                                        <input type="url" class="form-control" name="linkedin_link" id="linkedin_link"
                                               placeholder=" linkedin_link"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">instgram_link</label>
                                        <input type="url" class="form-control" name="instgram_link" id="instgram_link"
                                               placeholder=" instgram_link"/>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">address_1</label>
                                        <input type="text" class="form-control" name="address_1" id="address_1"
                                               placeholder=" instgram_link"/>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">address_2</label>
                                        <input type="text" class="form-control" name="address_2" id="address_2"
                                               placeholder=" instgram_link"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">town</label>
                                        <input type="text" class="form-control" name="town" id="town"
                                               placeholder=" instgram_link"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">interrupt</label>
                                        <input type="text" class="form-control" name="interrupt" id="interrupt"
                                               placeholder=" instgram_link"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">zipcode</label>
                                        <input type="text" class="form-control" name="zipcode" id="zipcode"
                                               placeholder=" instgram_link"/>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">country</label>
                                        <input type="text" class="form-control" name="country" id="country"
                                               placeholder=" instgram_link"/>
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
