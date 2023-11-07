@include("header")


<div>
  <h2>Edit User</h2>
  <form action="{{ route('admin.editUser', $user->id) }}" method="post">
    @csrf
    @method("put")
    <div>
      <span>name</span>
      <input value="{{ $user->name }}" type="text" name="name">
    </div>
    <div>
      <span>email</span>
      <input value="{{ $user->email }}" type="email" name="email">
    </div>
    <div>
      <span>memo</span>
      <input value="{{ $user->memo }}" type="text" name="memo">
    </div>
    @if(session("message"))
    <div>{{ session("message") }}</div>
    @endif
    @if($errors->first())
    <div>入力が間違っています<div>
    @endif
    <button type="submit">submit</button>
  </form>
</div>

@include("footer")

@include("footer")