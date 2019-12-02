<head>
<style>
body {
  padding-bottom: 40px;
  background-color: #eee;
}


#dashboard{
  i{
    margin-right:1em;
  }
}
footer{
  color:white;
  background:#1f87c2;
  padding-top:1em;
}

m-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">AlphaCMS</a>
    </div
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="#">Categories</a></li> 
        <li><a href="#">Users</a></li>  
        <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      </ul>  
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profile</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid --> 
</nav>
 <section>
  <div class="container-fluid">
   <row>
    <div id="dashboard" class="col-md-4">
       <div class="list-group">
          <a href="#" class="list-group-item active"><i class="glyphicon glyphicon-dashboard"></i>Dashboard</a>
          <a href="#" class="list-group-item"><i class="glyphicon glyphicon-folder-open"></i>Pages</a>
          <a href="#" class="list-group-item"><i class="glyphicon glyphicon-list"></i>Categories</a>
          <a href="#" class="list-group-item"><i class="glyphicon glyphicon-user"></i>User Accounts</a>
       </div>
     </div>
    <div class="col-md-8">
     <h1 class="page-header"><i class="glyphicon glyphicon-dashboard"></i>Dashboard</h1>
      <h3>Lastes Pages</h3>
      <table class="table table-striped">
         <tr>
           <th>Page Title</th>
           <th>Category</th>
           <th>Author</th>
        </tr>
        <tr>
          <td><a href="#">Sample Page One</a></td>
          <td>Category One</td>
          <td>Author One</td>
        </tr>
        <tr>
          <td><a href="#">Sample Page Two</a></td>
          <td>Category Two</td>
          <td>Author Two</td>
        </tr>
        <tr>
          <td><a href="#">Sample Page Two</a></td>
          <td>Category Two</td>
          <td>Author Two</td>
        </tr>
      </table>
      <a href="" class="btn btn-default"> View All Pages</a>
      <h3>Lates Users</h3>
      <table class="table table-striped">
         <tr>
           <th>Name</th>
           <th>Email</th>
           <th>Group</th>
        </tr>
        <tr>
          <td><a href="#">John Doe</a></td>
          <td>something@somewhat.yo</td>
          <td>Admin</td>
        </tr>
         <tr>
          <td><a href="#">John Doe</a></td>
          <td>something@somewhat.yo</td>
          <td>Admin</td>
        </tr>
      </table>
      <a href="" class="btn btn-default">View all users</a>
     </div>
    </row>
   </div>
  </section>
  <footer class="navbar-fixed-bottom text-center">
  <div><p>&copy Copyright 2017,etc,etc</p></div>
  </footer>
</body>