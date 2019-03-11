@extends('layouts.adminlayout')
@section('title') @stop
@section('content')
<div class="container" style="margin-left:22%;">
        <h2>List of all product</h2>
        <a href="/insertp" type="button" class="btn btn-info btn-sm float-right mb-2">Add New </a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>SN.</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Image</th>
                <th> Manufactured Date</th>
                <th> Expired Date</th>
                <th>Rate</th>
                <th>Posted Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                    <td>{!! $product->P_id !!}</td>
                        <td>{!! str_limit($product->P_name,60) !!}</td>
                        <td>{!! str_limit($product->P_description,2000) !!}</td>
                        <td>
                            <img src="/{{ $product->P_img}}" style="height:100px; width:110px;">
                        </td>
                        <td> {!! str_limit($product->P_mfdate) !!}</td>
                        <td>{!! str_limit($product->P_expdate) !!}</td>
                        <td>{!! str_limit($product->Rate) !!}</td>
                        <td>{!! $product->created_at !!}</td>

                        <td>
                            <form action="{!! url('insertp',[$product->P_id]) !!}" method="POST">
                            {{ csrf_field() }} 
                                {!! method_field('put') !!}
                                 <button type="submit" name="edit" class="btn btn-primary btn-sm"> Edit</button>
                            </form>
                             
                            <form action="{!! url('insertpindex',[$product->P_id]) !!}" method="POST">
                            {{ csrf_field() }} 
                                {!! method_field('DELETE') !!}
                                
                               
                                <button type="submit"name="delete" class="btn btn-danger btn-sm"> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @stop