@include('include.header')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> {{ $title }}</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item active"><a href="#">{{ $title }}</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Value</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($settings as $key=>$val)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$val->name}}</td>
                      <td>{{$val->value}}</td>
                      <td>{{$val->description}}</td>
                      <td>
                        <a href="EditAgent/{{$val->id}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="DeleteAgent/{{$val->id}}" onclick="return confirm('Are you sure you want to delete this Row ?');" class="btn btn-danger btn-sm">Delete</a>
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
    </main>
    @include('include.footer')