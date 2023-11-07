@include("header")

<div>
  <h2>Create User</h2>
  <form action="{{ route('admin.createUser') }}" method="post">
    @csrf
    <div>
      <span>name</span>
      <input type="text" name="name">
    </div>
    <div>
      <span>email</span>
      <input type="email" name="email">
    </div>
    <div>
      <span>memo</span>
      <input type="text" name="memo">
    </div>
    <div>
      <span>password</span>
      <input type="password" name="password">
    </div>
    <div>
      <span>password_confirmation</span>
      <input type="password" name="password_confirmation">
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