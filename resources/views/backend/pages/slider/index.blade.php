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
                    <div>
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
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
                                            <td>{{ $slider->id }}</td>
                                            <td class="py-1">
                                                <img src="{{ asset($slider->image) }}" alt="image" />
                                            </td>
                                            <td>{{ $slider->name }}</td>
                                            <td>{{ $slider->content }}</td>
                                            <td>{{ $slider->link }}</td>
                                            <td>
                                                <div class="checkbox" item-id="{{ $slider->id }}">
                                                    <input type="checkbox" class="status btn btn-sm btn-primary"
                                                        data-on="Active" data-off="Passive" data-toggle="toggle"
                                                        data-offstyle="danger" data-size="mini"
                                                        {{ $slider->status === '1' ? 'checked' : '' }}>
                                                </div>
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

@section('customjs')
    <script>
        $(document).on('change', '.status', function(e) {
            id = $(this).closest('.checkbox').attr('item-id');
            status = $(this).prop('checked') ? '1' : '0';
            $.ajax({
                headers: {
                    //meta kısmında, etiket olarak csrf oluşturuldu, aksi halde güvenlik durumundan dolayı ajax işlemi yapmayacaktı.
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST", //type ve url, web.php içindeki method ve name'den alındı.
                url: "{{ route('admin.slider.status') }}",
                data: {
                    id: id, //SliderController'da bu isim ile yakalanacak.
                    status: status
                },
                success: function(response) {
                    if (response.status == true) {
                        Swal.fire({
                            icon: "success",
                            title: "Status has been changed to active.",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            icon: "success",
                            title: "Status has been changed to passive.",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            });
        });
    </script>
@endsection
