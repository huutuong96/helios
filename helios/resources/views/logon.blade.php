<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif}
body{
    width: 100%;
}
form {
    border: 3px solid #f1f1f1;
    width: 30%;
    margin: 0 auto
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Log in to the admin page.</h2>

<form action="{{route("logon")}}" method="post">
  @csrf
  <div class="imgcontainer">
    <img src="{{asset('public/images/orther/avatar.png')}}" alt="Avatar" class="avatar">
    @if (Session::get("messenge"))
      <p class=" text-muted " style="color:red; margir-left:30px; front-size:20px"> <strong>Thông báo : </strong>{{Session::get("messenge")}}</p>
    {{Session::put("messenge", null)}}
    @endif 
  </div>

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" required value="{{old("username")}}">

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required  value="{{old("password")}}">
        
    <button type="submit">Login</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>
