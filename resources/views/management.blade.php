@extends('admin.layout')

@section('title', '管理者')

@section('content')
<nav aria-label="breadcrumb" class="mb-9">
  <ol class="breadcrumb bg-lgray py-1 px-5 mb-0 rounded">
    <li class="breadcrumb-item active fs-7" aria-current="page">管理者</li>
  </ol>
</nav>
<form class="row g-3 fw-bolder" method="POST">
  @csrf
  <div class="col-5 col-sm-4 col-md-3 col-lg-2">
    <label for="inputState" class="form-label w-100 text-center">部門</label>
    <select id="inputState" class="form-select">
      <option selected>請選擇</option>
      <option>...</option>
    </select>
  </div>
  <div class="col-7 col-sm-4 col-md-3 col-lg-2">
    <label for="inputZip" class="form-label w-100 text-center">姓名</label>
    <input type="text" class="form-control" id="inputZip">
  </div>
  <div class="col-8 col-sm-4 col-md-3">
    <label for="inputEmail4" class="form-label w-100 text-center">電子郵件</label>
    <input type="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-4 col-sm-4 col-md-3 col-lg-1">
    <label for="inputState" class="form-label w-100 text-center">啟用</label>
    <select id="inputState" class="form-select">
      <option selected>否</option>
      <option>是</option>
    </select>
  </div>
  <div class="col-8 col-sm-4 col-md-3">
      <label for="inputPassword4" class="form-label w-100 text-center">
        密碼<span class="fs-7 text-success"> (至少六碼英數字)</span>
      </label>
    <input type="password" class="form-control" id="inputPassword4">
  </div>
  <div class="col-4 col-sm-4 col-md-3 col-lg-1 align-self-end">
    <button type="submit" class="btn btn-primary w-100">儲存</button>
  </div>
</form>
  
  
  
 

@endsection

@section('scripts')
<script>

</script>
@endsection