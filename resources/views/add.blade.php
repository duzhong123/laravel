<h1>表单提交</h1>
<form action="{{url('/add')}}" method="post">
@csrf
    <input type="text" name="name">
    <button>提交</button>
</form>