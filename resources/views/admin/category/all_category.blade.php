@extends("comon/deshbord_layout")


@section("content")


        <!-- Menu -->
        @include('comon.menu')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">


          <!-- Navbar -->
          @include('comon.nav')
          <!-- / Navbar -->


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <div class="col-lg-8">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blog /</span> {{$title}}</h4>
                    </div>

                </div>

                @if(session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                @if(session()->has('danger'))
                <div class="alert alert-danger">{{session('danger')}}</div>
                @endif

                <div class="row">

                    <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Create Category</h5>
                        <small class="text-muted float-end">Merged input group</small>
                        </div>
                        <div class="card-body">

                        <form method="POST" action="{{route('category.store')}}">

                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="basic-default-name" placeholder="Category Name" />
                                </div>
                            </div>



                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Create Category</button>
                                <button type="submit" class="btn btn-danger">Cancle</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>


                    <div class="col-xxl">
                        <!-- Hoverable Table rows -->
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h5 class="card-header">Hoverable rows</h5>
                                </div>
                                <div class="col-lg-8">
                                    <form class="d-flex card-header" action="{{route('blog.index')}}">
                                        <input class="form-control me-2 rounded" type="search" value=" {{ $keyword }} " name="search" id="" placeholder="Search Bar">
                                        <button type="send" class="btn btn-info" >Search</button>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">

                                @foreach($categoryes->all() as $category)
                                <tr>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong> {{$category->id}} </strong></td>

                                    <td>{{$category->name}}</td>


                                    <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item btn btn-primary" href="{{route('category.edit', $category->id)}}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>

                                        <form method="post" action="{{route('category.destroy', $category->id)}}">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>



                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                            </div>

                            <div class="col-12">
                                <nav class="mt-4">
                                    <!-- pagination -->
                                    <nav class="mb-md-50">
                                        <ul class="pagination justify-content-center">
                                            {{ $categoryes->links("vendor.pagination.bootstrap-4") }}
                                        </ul>
                                    </nav>
                                </nav>
                            </div>

                        </div>
                        <!--/ Hoverable Table rows -->


                    </div>

                </div>










            </div>
            <!-- / Content -->


@endsection
