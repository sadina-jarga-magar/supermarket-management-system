@extends('layouts.adminlayout')
@section('title') @stop
@section('content')
<div class="container" style="margin-left:22%;">
        <h2>List of all product</h2>
        <a href="{!! url('product/insertp') !!}" type="button" class="btn btn-info btn-sm float-right mb-2">Add New </a>
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
            @if($products->count())
                @foreach($products as $key=>$product)
                    <tr>
                    <td>{!! $key + 1 !!}</td>
                        <td>{!! str_limit($product->P_name,60) !!}</td>
                        <td>{!! str_limit($product->P_description,2000) !!}</td>
                        td>{!! str_limit($product->P_description,60) !!}</td>
                        td>image</td>
                        td> {!! $product->P_mfdate  !!})</td>
                        td>{!! str_limit($product->P_expdate) !!}</td>
                        td>{!! str_limit($product->Rate) !!}</td>
                        <td>
                            <a href="{!! url('product/edit',$product->P_id) !!}" type="button" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{!! url('product',[$product->P_id]) !!}" method="POST">
                                @csrf
                                {!! method_field('DELETE') !!}
                                <button type="submit" class="btn btn-danger btn-sm"> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4"> No record found</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    @stop