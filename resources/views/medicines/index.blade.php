@extends('layouts.app')
    

@section('content')
<div class="content-wrapper">
     <!-- TABLE: LATEST ORDERS -->
     <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-2 m-2">
                <div class="table-responsive p-2">
                  <table class="table m-0 p-2">
                    <thead>
                    <tr>
                      <th>Medicine Name</th>
                      <th>Quantity</th>
                      <th>Type</th>
                      <th>Price</th>
                    </tr>
                    </thead>
                    <tbody >
                    <tr class="p-2">
                      <td class="p-2"><a href="#">OR9842</a></td>
                      <td>5</td>
                      <td><span class="badge badge-success">Pills</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">200</div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
                <!-- /.table-responsive -->
              </div>
             
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
             
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
@endsection