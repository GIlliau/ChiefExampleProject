@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form>
                    <div class="row">
                        <div class="col">
                            <label for="exampleInputEmail1">User id</label>
                            <input type="text" class="form-control" name="user_id">
                        </div>
                        <div class="col">
                            <label for="exampleInputPassword1">Created at</label>
                            <input type="date" class="form-control" name="created_at">
                        </div>
                        <div class="col pt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User id</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($filesActions as $filesAction)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $filesAction->user_id }}</td>
                            <td>{{ $filesAction->description }}</td>
                            <td>{{ $filesAction->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
