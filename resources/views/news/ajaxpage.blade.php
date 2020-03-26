@foreach ($news as $v)
		<tr>
			<td>{{$v->new_id}}</td>
			<td>{{$v->new_title}}</td>
			<td>{{$v->cate_name}}</td>
            <td>{{$v->new_man}}</td>
            <td>{{$v->new_time}}</td>
			<td>
                 <a href="" class="btn btn-info">编辑</a>
                 <a href="" class="btn btn-danger">删除</a></td>
		</tr>
        @endforeach
		<tr>
			<td colsoan='6'>{{$news->links()}}</td>
		</tr>