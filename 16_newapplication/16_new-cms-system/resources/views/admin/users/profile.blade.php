<x-admin-master>
    @section('content')
        <h1>User Profile: {{$user->name}}</h1>

        <div class="row">
            <div class="col-sm-6">
                <form action="{{route('user.profile.update', $user)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')

                    @csrf

                    <div class="mb-4">
                        <img class="img-profile rounded-circle w-25" src="{{$user->avatar}}" alt="">
                    </div>

                    <div class="form-group">
                        <input type="file" name="avatar">
                    </div>

                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text"
                                name="username"
                                class="form-control @error('username') is-invalid @enderror"
                                id="username"
                                value="{{$user->username}}">
                                <!-- class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" -->

                        @error('username')
                            <div class="alert invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"
                                name="name"
                                class="form-control"
                                id="name"
                                value="{{$user->name}}">

                        @error('name')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text"
                                name="email"
                                class="form-control"
                                id="email"
                                value="{{$user->email}}">

                        @error('email')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                                name="password"
                                class="form-control"
                                id="password">

                        @error('password')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirmation">Confirm Password</label>
                        <input type="password"
                                name="password_confirmation"
                                class="form-control"
                                id="password-confirmation">

                        @error('password_confirmation')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Options</th>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Attach</th>
                      <th>Detach</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Options</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Attach</th>
                        <th>Detach</th>
                    </tr>
                  </tfoot>
                  <tbody>

                      @foreach($roles as $role)
                      <tr>
                          <td><input type="checkbox"
                              @foreach($user->roles as $user_role)
                                  @if($user_role->slug == $role->slug)
                                    checked
                                  @endif
                              @endforeach></td>
                          <td>{{$role->id}}</td>
                          <td>{{$role->name}}</td>
                          <td>{{$role->slug}}</td>
                          <td>
                              <form class="" action="{{route('user.role.attach', $user)}}" method="post">
                                  @method('PUT')
                                  @csrf
                                  <input type="hidden" name="role" value="{{$role->id}}">
                                  <button class="btn btn-primary" @if($user->roles->contains($role)) disabled @endif>Attach</button>
                              </form>
                          </td>
                          <td>
                              <form class="" action="{{route('user.role.detach', $user)}}" method="post">
                                  @method('PUT')
                                  @csrf
                                  <input type="hidden" name="role" value="{{$role->id}}">
                                  <button class="btn btn-danger" @if(!$user->roles->contains($role)) disabled @endif>Detach</button>
                              </form>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
            </div>
        </div>

            </div>
        </div>
    </div>
    @endsection
</x-admin-master>
