@extends('dashboard')
@section('content')

    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Table Basic</h4>
                    <a class="btn btn-primary" href="{{route('debt.create')}}" type="submit">add new</a>
                </div>
                <div class="card-body">

                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>NAME</th>
                            <th>DESCRIPTION</th>
                            <th>IMAGE</th>

                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($debt as $item)
                                <td>

                                    <span class="fw-bold">{{$item->employee_name}}</span>
                                </td>
                                <td>{{$item->description}}</td>
                                <td>
                                    <div class="avatar-group">
                                        <img src="{{asset($item->image)}}" style="height: 50px" style="width: 50px">

                                    </div>
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{route('departmint.edit',$item->id)}}">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <form method="post" action="{{route('departmint.destroy',$item->id)}}">
                                                @csrf
                                                @method('delete')
                                                <button class="dropdown-item" type="submit">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>Delete</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
