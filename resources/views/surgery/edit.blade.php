@extends('layout.master')



@section('content')

    <div class="card-body mt-5" style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">


        <div>

            <h2>ویرایش جراحی</h2>

        </div>

        <form method="post" action="{{route('surgery.update',$surgery->id)}}">

            @method('patch')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @csrf
            <div class="row">

                <div class="col-6 form-group">

                    <label  class="label">نام و نام خانوادگی</label>
                    <span style="color: red">*</span>

                    <input type="text" value="{{$surgery->patient_name}}" name="patient_name" class="form-control">

                </div>



                <div class="col-6 form-group">

                    <label class="label">کد ملی</label>
                    <span style="color: red">*</span>

                    <input name="patient_national_code" value="{{$surgery->patient_national_code}}" type="text" class="form-control">

                </div>




                <div class="col-6 form-group">

                    <label class="label">بیمه پایه</label>
                    <span style="color: red">*</span>
                    <select class="form-control"  name="basic_insurance_id">
                        <option disabled value="" >لطفا بیمه پایه را انتخاب کنید</option>
                        @foreach($basics as $basic)

                            <option value="{{$basic->id}}" {{$basic->id = $surgery->basic_insurance_id ?'selected' : ''}} >{{$basic->name}}</option>

                        @endforeach

                    </select>

                </div>

                <div class="col-6 form-group">

                    <label class="label">بیمه تکمیلی</label>
                    <span style="color: red">*</span>
                    <select class="form-control"  name="supp_insurance_id">
                        <option class="placeholder" disabled value="" >لطفا بیمه تکمیلی را انتخاب کنید</option>
                        @foreach($supplementaries as $supplementary)

                            <option value="{{$supplementary->id}}" {{$supplementary->id = $surgery->supp_insurance_id ?'selected' : ''}} >{{$supplementary->name}}</option>

                        @endforeach

                    </select>

                </div>


                <div class="col-6 form-group">

                    <label class="label">شماره پرونده</label>
                    <span style="color: red">*</span>
                    <input name="document_number" value="{{$surgery->document_number}}" type="text" class="form-control">

                </div>




                <div class="col-6 form-group">

                    <label class="label">تاریخ عمل</label>

                    <input name="surgeried_at" value="{{$surgery->surgeried_at}}" type="date" class="form-control">

                </div>


                <div class="col-6 form-group">

                    <label class="label">تاریخ عمل</label>

                    <input name="released_at" value="{{$surgery->released_at}}" type="date" class="form-control">

                </div>




                <div class="col-12 form-group">

                    <label class="label">عمل</label>

                   <select class="form-control js-example-basic-multiple-limit" name="operation_id[]" multiple="multiple">

                    @foreach($operations as $operation)


                        <option value="{{$operation->id}}" @selected($surgery->operation->contains($operation->id))>{{$operation->name}}</option>


                    @endforeach

                   </select>

                </div>



                @foreach($roles as $role)

                    <div class="col-4 form-group">

                        <label class="label">{{$role->title}}</label>

                        <select class="form-control" name="doctor_id[]">


                            @foreach($role->doctors as $DR)


                                <option value="{{$DR->id}}" @selected($surgery->doctors->where('pivot.doctor_role_id', $role->id)->contains($DR->id))>{{$DR->name}}</option>

                            @endforeach

                        </select>

                        <input hidden value="{{$role->id}}" name="role_id[]">

                    </div>




                @endforeach




                <div class="col-10 form-group">

                    <label class="label">توضیحات</label>

                    <textarea name="description" cols="1" rows="2"  class="form-control">{{$surgery->description}}</textarea>

                </div>


                <div id="buttom" class="col-2" style="margin-top: 50px;">

                    <div class=" ml-5" style="text-align: left;">

                        <button class="btn btn-warning"> ویرایش </button>


                    </div>

                </div>

            </div>

        </form>


    </div>

@endsection













