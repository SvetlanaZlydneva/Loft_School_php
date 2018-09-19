<!DOCTYPE html>
<html lang="ru">
<head>
    <title>{{$title}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{ asset('css/libs.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media.css') }}" rel="stylesheet">
</head>
<body>
<div class="admin-wrapper">
    <div class="newbox">
        <div class="boxCategory">
            <form action="{{route('admin.postCategory')}}" method="post">
                <fieldset>
                    <legend>New Category</legend>
                    @csrf
                    <input type="text" placeholder="Название Категории" name="name">
                    <input type="submit" value="Создать">
                </fieldset>
            </form>
            <div class="middle">
                <div class="sidebar">
                    <div class="sidebar-item">
                        <div class="sidebar-item__title">Категории</div>
                        <div class="sidebar-item__content">
                            <ul class="sidebar-category">
                                @foreach($categories as $category)
                                    <li class="sidebar-category__item">
                                        <form action="{{route('admin.delCategory')}}" method="post" style="display: inline">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$category->id}}">
                                            <input type="submit" value="X" style="background: red; color: white">
                                        </form>
                                        {{$category->name}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="boxProduct">
            <form action="{{route('admin.postProduct')}}" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>New Product</legend>
                    @csrf
                    <input type="text" placeholder="Название" name="name">
                    <select name="category">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <input type="number" placeholder="Цена" name="price">
                    <input type="file" name="photo">
                    <input type="text" placeholder="Описание" name="description">
                    <input type="submit" value="Создать">
                </fieldset>
            </form>
            <table>
                <thead>
                <tr>
                    <th>del</th>
                    <th>id</th>
                    <th>name</th>
                    <th>category</th>
                    <th>price</th>
                    <th>photo</th>
                    <th>description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <th>
                        <form action="{{route('admin.delProduct')}}" method="post" style="display: inline">
                            @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="submit" value="X" style="background: red; color: white">
                        </form>
                    </th>
                    <th>{{$product->id}}</th>
                    <th>{{$product->name}}</th>
                    <th>{{$product->category}}</th>
                    <th>{{$product->price}}руб</th>
                    <th><img src="img/cover/{{$product->photo}}" alt="img" class="productImg"></th>
                    <th>{{$product->description}}</th>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>