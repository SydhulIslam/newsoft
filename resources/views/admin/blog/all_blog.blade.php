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

                    <div class="col-lg-4">
                    <form class="d-flex" action="{{route('blog.index')}}">
                        <input class="form-control me-2 rounded" type="search" value=" {{ $keyword }} " name="search" id="" placeholder="Search Bar">
                        <button type="send" class="btn btn-info" >Search</button>
                    </form>
                    </div>

                </div>

                @if(session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                @if(session()->has('danger'))
                <div class="alert alert-danger">{{session('danger')}}</div>
                @endif







              <!-- Hoverable Table rows -->
              <div class="card">
                <h5 class="card-header">Hoverable rows</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                  <thead>
                      <tr>
                        <th>Blog ID</th>
                        <th>Blog Title</th>
                        <th>Blog Thumbnail</th>
                        <th>Blog Categories</th>
                        <th>Blog Author</th>
                        <th>Total View</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    @foreach($blogs->all() as $blog)
                      <tr>

                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong> {{$blog->id}} </strong></td>

                        <td>{{$blog->title}}</td>

                        <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar pull-up" title="Lilian Fuller" >

                              <img src="/storage/images/{{$blog->thumbnail}}" alt="Avatar" class="rounded-circle" />

                            </li>
                          </ul>
                        </td>

                        <td><span class="badge bg-label-primary me-1">{{ isset ($blog->category->name) ? $blog->category->name : ' '}}</span></td>

                        <td><span class="badge bg-label-primary me-1">{{ isset ($blog->user->name) ? $blog->user->name : ' '}}</span></td>



                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$blog->views}}</strong></td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item btn btn-primary" href="{{route('blog.edit', $blog->id)}}">
                                <i class="bx bx-edit-alt me-1"></i> Edit
                              </a>

                              <form method="post" action="{{route('blog.destroy', $blog->id)}}">

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
              </div>
              <!--/ Hoverable Table rows -->

              <div class="col-12">
                  <nav class="mt-4">
                      <!-- pagination -->
                      <nav class="mb-md-50">
                          <ul class="pagination justify-content-center">
                              {{ $blogs->links("vendor.pagination.bootstrap-4") }}
                          </ul>
                      </nav>
                  </nav>
              </div>


            </div>
            <!-- / Content -->


@endsection
