@include('include.header')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Edit Agent</h1>
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
            <h3 class="tile-title">Agent</h3>
            <div class="tile-body">
              <form method="POST"  action="updateAgent/{{$featchbyrow->id}}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                  <label class="control-label col-md-3">Agent ID</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="mobileno" value="{{$featchbyrow->agent_id}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Mobile No.</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="mobileno" value="{{$featchbyrow->mobile}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="email" value="{{$featchbyrow->email}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Status</label>
                  <div class="col-md-8">
                  <input class="form-control" type="text" name="status" value="{{$featchbyrow->status}}">
                  
                  </div>
                </div>
               
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
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