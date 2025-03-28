@extends('admin.layouts.main')

@section('title')
    @parent
    Danh sach danh muc
@endsection

@section('content')
    <div class="container-fluid">
        @if (session('message'))
            <div class="alert alert-primary" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>All Category</h5>

                            <form class="d-inline-flex">
                                <a href="{{ route('admin.categories.addCategory') }}"
                                    class="align-items-center btn btn-theme d-flex">
                                    <i data-feather="plus-square"></i>Add New
                                </a>
                            </form>
                        </div>

                        <div class="table-responsive category-table">
                            <div>
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên danh mục</th>
                                            <th>Slug</th>
                                            <th>Mô tả</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($listCategory as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->slug }}</td>
                                                <td>{{ $value->description }}</td>
                                                <td>{{ $value->status ? 'Hoạt động' : 'Ẩn' }}</td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('admin.categories.detailCategory', $value->id) }}">
                                                            <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('admin.categories.updateCategory', $value->id) }}">
                                                            <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>
                                                        
                                                        <li>
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal{{ $value->id }}">
                                                                <i class="ri-delete-bin-line text-danger"></i>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </td>
                                            </tr>
                                            <!-- Modal Xóa -->
                                            <div class="modal fade" id="deleteModal{{ $value->id }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel{{ $value->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="deleteModalLabel{{ $value->id }}">Cảnh báo</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-danger">
                                                                Bạn có chắc chắn muốn xóa danh mục
                                                                <strong>{{ $value->name }}</strong> không?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Hủy</button>
                                                            <form
                                                                action="{{ route('admin.categories.deleteCategory', ['id' => $value->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Xác nhận
                                                                    xóa</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".btn-delete").forEach(button => {
                button.addEventListener("click", function(event) {
                    event.preventDefault();
                    let form = this.closest("form");
                    Swal.fire({
                        title: "Bạn có chắc muốn xóa?",
                        text: "Hành động này không thể hoàn tác!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Xóa",
                        cancelButtonText: "Hủy"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
