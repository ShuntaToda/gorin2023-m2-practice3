@include("header")

<div>
  @if(session("message"))
  <div>{{ session("message") }}</div>
  @endif
  <table>
    <thead>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>is_active</th>
        <th>role</th>
        <th>memo</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->is_active }}</td>
        <td>{{ $user->role }}</td>
        <td>{{ $user->memo }}</td>
        <td>
          <a href="{{ route('admin.showUser', $user->id) }}">表示</a>
          @if($user->role !== "admin")
          <a href="{{ route('admin.editUser', $user->id) }}">編集</a>
          <form method="post" action="{{ route('admin.deleteUser', $user->id) }}">
            @csrf
            @method("delete")
            <button type="submit">削除</button>
          </form>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <a href="{{ route('admin.createUser') }}">ユーザー追加</a>
</div>

@include("footer")