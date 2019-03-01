@extends('layouts.adminlayout')
@section('title') @stop
@section('content')
<div class="container">
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
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if($product->count())
                @foreach(@product as $key=>$products)
                    <tr>
                    <td>
                    <td>{!! $key + 1 !!}</td>
                        <td>{!! str_limit($products->title,60) !!}</td>
                        <td>
                            @if($products->P_img)
                                <img src="{!! asset('uploads/product/'.$products->P_img) !!}" class="img-fluid img-thumbnail"
                                     style="max-width: 150px;" alt="{!! $products->name !!}">
                            @else
                                <span class="badge badge-danger">  No Image Found </span>
                            @endif
                        </td>
                        <td>{!! $products->created_at !!}</td>
                        <td>
                            <a href="{!! url('blogs/edit',$blog->id) !!}" type="button" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{!! url('blogs',[$blog->id]) !!}" method="POST">
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