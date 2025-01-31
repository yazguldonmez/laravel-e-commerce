@extends('backend.layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sliders</h4>
                    <p class="card-description">
                        <a href="{{ route('admin.slider.create') }}" class="btn btn-sm btn-outline-primary">Add a slider</a>
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>İmage</th>
                                    <th>Name</th>
                                    <th>Content</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Process</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($sliders) && $sliders->count() > 0)
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td class="py-1">
                                                <img src="{{ asset($slider->image) }}" alt="image" />
                                            </td>
                                            <td>{{ $slider->name }}</td>
                                            <td>{{ $slider->content }}</td>
                                            <td>{{ $slider->link }}</td>
                                            <td><label
                                                    class="badge badge-{{ $slider->status === '1' ? 'success' : 'danger' }}">{{ $slider->status === '1' ? 'Active' : 'Passive' }}</label>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.slider.edit', $slider->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('admin.slider.destroy', $slider->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
