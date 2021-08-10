@include('include.header')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Agent Register</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item"><a href="#">Sample Forms</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
          <div class="tile">
            <h3 class="tile-title">Register</h3>
            <div class="tile-body">
              <form method="post" action="saveAgent" class="form-horizontal">
                @csrf
                <div class="form-group row">
                  <label class="control-label col-md-3">Mobile No.</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="mobileno" placeholder="Enter Mobile No.">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="email" placeholder="Enter Email">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Password</label>
                  <div class="col-md-8">
                  <input class="form-control" type="password" name="password" placeholder="Enter Password">
                  
                  </div>
                </div>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
        <div class="col-md-2">
        </div>
        <div class="clearix"></div>
      </div>
    </main>
    @include('include.footer')