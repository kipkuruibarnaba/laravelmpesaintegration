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
                          Obtain Access Token
                        </div>
                        <div class="card-body">
                          <p class="text-primary" id="accesstoken"></p>
                          <button id="getAccessToken" class="btn btn-primary">Request Access Token</button>
                        </div>
                      </div>
                      <div class="card mt-5">
                        <div class="card-header">
                          Register URLs
                        </div>
                        <div class="card-body">
                          <div id="response"></div>
                          <button id="registerURLs" class="btn btn-primary">Request URLs</button>
                        </div>
                      </div>
                      <div class="card mt-5">
                        <div class="card-header">
                          Simulate Transaction
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                @csrf
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
                                <button id="simulatetransaction" class="btn btn-primary"> Simulate Payment</button>
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
