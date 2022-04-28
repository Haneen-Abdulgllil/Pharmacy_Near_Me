@extends('layouts.masterAdmin')
@section('admin_pages')


 <div class="wrapper bg-white">
    <div class="row  ">
    <div class="col-sm-12 col-md-12 col-lg-3">
         <div class="card bg-white m-5">
            <div class="card-header">
                <h3>الصيدلية</h3>
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="card-content">
                <table class="table no-margin ">
                    <thead class="success">
                        <tr>
                            <th>الاسم</th>
                            <th>العنوان</th>
                            <th>المربع</th>
                            <th>المنطقة</th>
                            <th>الايميل</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><i class="fas fa-user text-primary"></i> ابولو</td>
                            <td>
                                <div class="d-flex">
                                    <span class="pr-2 d-flex align-items-center"> الضربة</span>
                                </div>
                            </td>
                            <td>المسبح</td>
                            <td>القاهرة</td>
                            <td>Apollo@yahoo.com</td>
                            <td>
                                <button class="btn btn-success text-white" >مفعل</button>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

            <div class="card bg-white m-5">
                <div class="card-header">
                    <h2>المستخدمين</h2>
                    <i class="fas fa-ellipsis-h"></i>
                </div>
                <div class="card-content">
                    <table class="table no-margin ">
                        <thead class="success">
                            <tr>
                                <th>الاسم</th>
                                <th>العنوان</th>
                                <th>الايميل</th>
                                <th>الجوال</th>
                                <th>طرق الدفع</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="fas fa-user "></i> حنين</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="pr-2 d-flex align-items-center">المسبح </span>
                                    </div>
                                </td>
                                <td>haneen@yahoo.com</td>
                                <td>73333333333</td>
                                <td>فيزا</td>
                                <td>
                                    <button class="btn btn-success text-white" >مفعل</button>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
        </div>




@endsection
