@extends('layouts/contentNavbarLayout')

@section('content')
    <h4 class="py-3 mb-4">Indexing <span><a href="{{ route('index-create') }}" class="btn btn-primary">ADD</a></span>
    </h4>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="container">
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Indexing Name</th>
                            <th>Indexing URL</th>
                            <th>Image</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($indexing as $key => $indexs)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $indexs->indexing_name }}</td>
                                <td>
                                    {{ $indexs->indexing_url }}
                                </td>
                                <td><img class="img-fluid" width="200px" height="200px"
                                        src="{{ asset('storage/' . $indexs->indexing_image_url) }}"
                                        alt="{{ $indexs->indexing_name }}"></td>
                                <td>
                                    <!-- Toggle button (checkbox) -->
                                    <form action="{{ route('indexing.toggle', $indexs->indexing_id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <input type="checkbox" name="is_active" class="form-check-input"
                                            {{ $indexs->is_active ? 'checked' : '' }} onchange="this.form.submit()" />
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('index-delete', $indexs->indexing_id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit"
                                            class="mdi mdi-trash-can-outline me-1"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$indexing->links()}}
        </div>
    </div>

@endsection
