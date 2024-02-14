@extends('admin.layouts.master')
@section('content')
  <div class="col-12 d-flex mt-5">
    @foreach ($menuGroups as $menuGroup)
      <div class="col-6">
        <div class="card {{ $menuGroup->name == 'header' ? 'bg-primary' : 'bg-danger' }}">
          <a href="{{ route('admin.menuitem.show', $menuGroup->id)}}" style="cursor: pointer">
            <div class="card-body">
              <div class="d-flex no-block align-items-center">
                <div>
                  <h6 class="text-white fs-30">{{ $menuGroup->label }}</h6>
                  <h2 class="text-white m-0 font-weight-bold">{{ $menuGroup->name }}</h2>
                </div>
                <div class="mr-auto">
                  <span class="text-white display-6"><i class="fa fa-file-text-o fa-2x"></i></span>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    @endforeach
  </div>
@endsection
