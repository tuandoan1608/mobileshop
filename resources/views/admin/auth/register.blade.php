@extends('admin.auth.authmester')
@section('content')
    <div class="">
        <div id="wrapper">
            <div id="register1" class=" form">
                <section class="login_content">
                    <form action="/admin/registers" method="post">
                        @csrf
                        <div id="errors">
                            @include('flash::message')
                        </div>
                      <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                     
                        <!-- /.col -->
                        <div class="col-4">
                          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>
              
                </section>
            </div>
        </div>
    </div>
@endsection