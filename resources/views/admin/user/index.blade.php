@extends('master.index')
@section('main')

<form action="{{route('search')}}" method="GET" class="form-inline">
  <label class="sr-only" for="inlineFormInputName2">Name</label>
  <input type="text" name="search" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Nhập Tìm Kiếm">



  <button type="submit" class="btn btn-primary|secondary|success|danger|warning|info|light|dark btn-sm|btn-lg mb-2">Tìm Kiếm</button>
  <a href="{{route('user.create')}}" class="btn btn-sm btn-success">Thêm Mới</a>
</form>


<!-- Danh sách Danh Mục -->
<div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
	<table class="table table-striped|table-dark|table-bordered|table-borderless|table-hover|table-sm">
	  <caption>Danh sách Quản Trị</caption>

	  <thead class="thead-dark|thead-light">
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Tên Quản Trị</th>
	      <th scope="col">Email Quản Trị</th>
	      <th scope="col">Mật Khẩu</th>
	      <th scope="col">Trạng Thái</th>
	       <th scope="col">Ngày Tạo</th>
	      <th scope="col">Hành Động</th>
	    </tr>
	  </thead>
	   @if(Session::has('success'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Thành công: </strong>  {{Session::get('success')}} <br>
          </div>
          @endif
          @if(Session::has('error'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Lỗi: </strong>  {{Session::get('error')}} <br>
          </div>
          @endif 
	  <tbody>
	  	@foreach($users as $uses)
	    <tr>
	      <td>{{$uses->id}}</td>
	      <td>{{$uses->name}}</td>
	      <td>{{$uses->email}}</td>
	      <td>{{$uses->password}}</td>
	      <td>{{$uses->users_status == 1 ? "Hiện" : "Ẩn"}}</td>
	      <td>{{$uses->created_at}}</td>
	      <td>
	      	 
	      	<form action="{{ route('user.destroy',['user'=>$uses->id]) }}" method="POST">
	      	 	<a  href="{{ route('user.edit',['user'=>$uses->id]) }}" class="btn btn-xs btn-primary">Sửa</a> 	
	      		@csrf 
	      		@method('DELETE')
      		 	<input name="_method" type="hidden" value="DELETE">
	      		<button class="btn btn-xs btn-danger" type="submit">Xóa</button>
	      	</form>

	      
	      </td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
	{{$users->links()}}
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	
      </div>
    </div>
  </div>
</div>
@stop()

