<form  action="/admin/student/index" method="post"  id="myForm" class="sr-input-func">
  @csrf
  <input name="search_value" type="text" placeholder="Search..." class="search-int form-control">
  <a href="#" onclick="document.getElementById('myForm').submit(); return false;"><i class="fa fa-search"></i></a>

</form>