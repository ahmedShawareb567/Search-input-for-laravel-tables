<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            .tableSec{
                position: relative;
                width: 100%;
                height:auto;
                text-align: center;
            }
        </style>
    </head>
    <body>
    <section class="tableSec">
        <div class="container">
            <h3>All posts</h3>
            <div class="row">
                <div class="col-12">
                    <div class="formSec">
                        <form class="form" action="" method="POST">
                            <input type="text" placeholder="search.." id="search-input">
                        </form>
                    </div>
                    <table class="table" border="1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->desc}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        jQuery(function($){
            $('#search-input').on({
                'keyup': function(){
                    let data = $(this).val();
                    $.ajax({
                        'method': 'POST',
                        'url': '{{route('search')}}',
                        'data' : {
                            _token: '{{csrf_token()}}',
                            data  : data
                        },
                        success: function (data){
                            $('table tbody').html(data.data);
                        }
                    });
                }
            });
        });
    </script>
    </body>
</html>

