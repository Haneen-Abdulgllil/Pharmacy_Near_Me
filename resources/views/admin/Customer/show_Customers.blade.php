@extends('layouts.masterAdmin')
@section('admin_pages')


<div class="wrapper bg-white">
    <div class="row  ">
        <div class="col-12 ">
        <div class="card bg-white m-5">

            <div class="card-header d-flex justify-content-between">
                <a href="/_admin/add_Customers"><i class="fas fa-plus"></i></a>
                <h3>العملاء</h3>
            </div>
            <div class="card-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th> اسم العميل</th>
                            <th> العنوان</th>
                            <th>  رقم الهاتف</th>
                            <th>الحالة</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($customers as $customer)

                         <tr>


                            <td>{{ $customer->name }}</td>
                         <td>{{  $customer->address }}</td>
                         <td>{{  $customer->phone}}</td>


                          @if ($customer->is_active==1)

                        <td>   <button class="btn badge btn-success text-white" >مفعل</button></td>


                          @else

                            <td> <button class="btn badge btn-danger text-white" >موقف</button></td>

                          @endif





                            <td>
                            <a href={{route('admin-edit_Customers', ['id' => $customer->id]);}} > <button class="btn " ><i class="fas fa-pen" id="edit"></i></button></a>
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" id="delete"><i class="fas fa-trash"></i></button>

                            </td>


                                    <div class="modal"  id="exampleModal"  tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">حذف </h5>
                                            </div>
                                            <div class="modal-body">
                                                </p> هل تريد حقا حذف الاعلان ؟</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">لا</button>
                                                <button type="button" class="btn btn-primary">نعم</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>




                        </tr>
                        @endforeach

                    </tbody>



                </table>

            </div>
        </div>
</div>



@endsection
