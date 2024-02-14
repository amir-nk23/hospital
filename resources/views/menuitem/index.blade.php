@extends('admin.layouts.master')


@section('content')


    <div class="col-md-12">



    </div>

						<!-- Row -->
						<div class="row mt-5">
							<div class="col-xl-12 col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header  border-0">
										<h4 class="card-title col-10">منو</h4>
                                        <div>

                                            <a class="btn btn-primary mr-3" href="#" data-toggle="modal" data-target="#createmenu">ثبت منو جدید</a>

                                        </div>
									</div>




                                    <div class="card-body">
										<div class="table-responsive">
											<table class="table  table-vcenter text-nowrap table-bordered border-bottom text-center" id="hr-table">
												<thead>
													<tr>
														<th class="border-bottom-0 w-5">ردیف</th>
                                                        <th class="border-bottom-0">تیتر</th>
														<th class="border-bottom-0">وضعیت</th>
														<th class="border-bottom-0">لینک دسته بندی</th>
                                                        <th class="border-bottom-0">دسته بندی</th>
                                                        <th class="border-bottom-0">لینک</th>
                                                        <th class="border-bottom-0">عملیات</th>

													</tr>
												</thead>
												<tbody id="items">

                                                @foreach($menus as $menu)

                                                    <tr data-id="{{$menu->id}}">
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$menu->title}}</td>
                                                        <td>
                                                            @if($menu->status==0)

                                                                <p class="badge badge-danger">غیرفعال</p>

                                                        @endif
                                                                @if($menu->status==1)

                                                                    <p class="badge badge-success">فعال</p>

                                                                @endif

                                                        </td>
                                                        @if($menu->linkable_type == 'App\Models\Category')
                                                            <td>دسته بندی</td>
                                                        @endif

                                                        @if($menu->linkable_type == '')
                                                            <td>دسته بندی دلخواه</td>
                                                        @endif

                                                        <td></td>
                                                        <td>{{$menu->link}}</td>

                                                        <td>
                                                            <a class="btn btn-warning btn-icon btn-sm feather feather-edit p-3" data-toggle="modal" data-target="#edit-{{$menu->id}}" href="{{route('admin.news.edit',$menu->id)}}">
                                                                <i class="" data-toggle="tooltip" data-original-title="Edit"></i>
                                                            </a>


                                                            <a class="btn btn-danger btn-icon btn-sm feather feather-trash-2 p-3" data-confirm-delete="true" href="{{route('admin.menuitem.destroy',$menu->id)}}" ></a>

                                                        </td>
                                                    </tr>



    {{--                                                    @if($news==[])--}}
    {{--                                                        <h4 class="alert alert-danger">اطلاعات مورد نظر یافت نشد</h4>--}}


    {{--                                                    @endif--}}

                                                        @endforeach


												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row-->

					</div><!-- end app-content-->
				</div>

			</div>





			<!--Add Department Modal -->
			<div class="modal fade"  id="adddepartmentmodal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Department</h5>
							<button  class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label class="form-label">Add Department</label>
								<input type="text" class="form-control" placeholder="Department" value="">
							</div>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn btn-outline-primary" data-dismiss="modal">Close</a>
							<a href="#" class="btn btn-primary">Submit</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End Add Department Modal  -->

			<!--Edit Department Modal -->
			<div class="modal fade"  id="editdepartmentmodal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Department</h5>
							<button  class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label class="form-label">Edit Department</label>
								<input type="text" class="form-control" placeholder="Department" value="">
							</div>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn btn-outline-primary" data-dismiss="modal">Close</a>
							<a href="#" class="btn btn-primary">Save</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End Edit Department Modal  -->

    <div class="modal fade"  id="createmenu">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button  class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @error('password')

                <p class="text text-danger">{{$message}}</p>

                @enderror
                <form method="post" id="required_form" action="{{route('admin.menuitem.store')}}">
                    @csrf

                    @error('same')

                    <p class="text text-danger">{{$message}}</p>

                    @enderror

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">عنوان</label>
                            <input type="text" class="form-control" name="title" required placeholder="عنوان">
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label class="form-label">لینک دسته بندی</label>
                                <select class="form-control"  name="linkable_type"  required id="linkable_type">

                                    <option value="" disabled selected hidden>انتخاب</option>
                                @foreach($category as $key => $value)

                                        <option value="{{$key}}">{{$value}}</option>

                                    @endforeach

                                        <option value="">لینک دلخواه</option>



                                </select>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label class="form-label">دسته بندی</label>
                                <select class="form-control" disabled name="linkable_id" id="linkable_id">

                                    @foreach($items as $item)

                                        <option value="{{$item->id}}">{{$item->title}}</option>

                                    @endforeach




                                </select>
                            </div>

                            <div class="form-group col-md-12 ">
                                <label class="form-label">لینک دلخواه</label>
                                <input type="text" class="form-control" name="link" id="link" disabled placeholder="link">
                            </div>


                                <input type="text" hidden value="{{$menugroup}}" class="form-control" name="menu_group_id">

                            <div class="form-group col-md-12 ">
                                <p class="form-label">بازدید در تب جدید :</p>

                                <div class="row">
                                    <div class="form-checkform-check form-check-inline">
                                        <label class="form-label" id="">فعال</label>
                                        <input type="radio" class="form-check-input" name="new_tab" value="1" >
                                    </div>


                                    <div class="mr-4">

                                        <label class="form-label form-check form-check-inline">غیر فعال</label>
                                        <input type="radio" class="form-check-input" name="new_tab" value="0" >

                                    </div>


                                </div>

                            </div>


                            <div class="form-group col-md-6 ">
                                <label class="form-label">وضعیت</label>
                                <select class="form-control" required name="status">


                                        <option value="1">فعال</option>
                                        <option value="0">غیرفعال</option>

                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-outline-primary" data-dismiss="modal">بستن</a>
                        <button class="btn btn-success">ثبت</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- create Modal  -->





@foreach($menus as $menu)


    <div class="modal fade"  id="edit-{{$menu->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button  class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @error('password')

                <p class="text text-danger">{{$message}}</p>

                @enderror
                <form method="post" action="{{route('admin.menuitem.update',$menu->id)}}">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">عنوان</label>
                            <input type="text" class="form-control" value="{{$menu->title}}" name="title" placeholder="عنوان">
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label class="form-label">لینک دسته بندی</label>
                                <select class="form-control" name="linkable_type" id="linkable_type_edit">

                                    @foreach($category as $key => $value)

                                        <option {{$menu->linkable_type!=''? 'selected':''}} value="{{$key}}">{{$value}}</option>

                                    @endforeach

                                    <option {{$menu->linkable_type==''? 'selected':''}} value="">لینک دلخواه</option>



                                </select>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label class="form-label">دسته بندی</label>
                                <select class="form-control" disabled  name="linkable_id" id="linkable_id_edit">

                                    @foreach($items as $item)

                                        <option {{$menu->linkable_id!=$item->id? 'selected':''}} value="{{$item->id}}">{{$item->title}}</option>

                                    @endforeach




                                </select>
                            </div>

                            <div class="form-group col-md-12 ">
                                <label class="form-label">لینک دلخواه</label>
                                <input type="text" value="{{$menu->link}}" disabled class="form-control" name="link" id="link_edit" placeholder="link">
                            </div>


                            <input type="text" hidden value="{{$menugroup}}" class="form-control" name="menu_group_id">

                            <div class="form-group col-md-12 ">
                                <p class="form-label">بازدید در تب جدید :</p>

                                <div class="row">
                                    <div class="form-checkform-check form-check-inline">
                                        <label class="form-label" id="">فعال</label>
                                        <input type="radio" {{$menu->new_tab==1? 'checked':''}} class="form-check-input" name="new_tab" value="1" >
                                    </div>


                                    <div class="mr-4">

                                        <label class="form-label form-check form-check-inline">غیر فعال</label>
                                        <input type="radio" {{$menu->new_tab==0? 'checked':''}} class="form-check-input" name="new_tab" value="0" >

                                    </div>


                                </div>

                            </div>


                            <div class="form-group col-md-6 ">
                                <label class="form-label">وضعیت</label>
                                <select class="form-control" name="status">


                                        <option {{$menu->status==1? 'selected':''}} value="1">فعال</option>
                                        <option {{$menu->status==0? 'selected':''}} value="0">غیر فعال</option>






                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-outline-primary" data-dismiss="modal">بستن</a>
                        <button class="btn btn-warning">به روزرسانی</button>
                    </div>

                </form>

            </div>
        </div>
    </div>


@endforeach

    <!-- edit Modal  -->

		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top"><span class="feather feather-chevrons-up"></span></a>




@endsection




