<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css')}}" >
        <title>Laravel Daraja</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <div class="col-sm-8 mx -auto">

                      <div class="card mt-5">
                        <div class="card-header">
                          STK PUSH
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="phone"> Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone No"/>
                                </div>
                                <div class="form-group">
                                    <label for="amount"> Amount</label>
                                    <input type="number" name="amount" class="form-control" id="amount" placeholder="Enter Amount"/>
                                </div>
                                <div class="form-group">
                                    <label for="account">Account</label>
                                    <input type="text" name="account" class="form-control" id="account" placeholder="Enter Account No"/>
                                </div>          
                                <br>               
                               <div class="form-group">
                                <button id="stkpush" class="btn btn-primary"> Simulate STK</button>
                               </div>
                            </form>
                        </div>
                      </div>                                     
                </div>
            </div>
        </div>
        <script src="{{ asset('js/app.js')}}"></script>
        <script src="{{ asset('js/custom/custom.js')}}"></script>
    </body>
</html>
