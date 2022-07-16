@extends('layouts.admin')

@section('title')
    <title>Edit categories</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header',['name' => 'Category', 'key' => 'Edit'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('categories.update',['id' => $category->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nhập tên danh mục</label>
                                <input type="text"
                                       name="name"
                                       value="{{ $category -> name }}"
                                       class="form-control"
                                       placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label >Chọn danh mục cha</label>
                                <select class="form-control"
                                        name="parent_id">
                                    <option value="0">Chính nó</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



