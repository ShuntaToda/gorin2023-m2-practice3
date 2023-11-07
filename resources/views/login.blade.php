@include("header")

<div>
  <h2>Login</h2>
  <div>
    <form action="{{ route('login') }}" method="POST" >
      @csrf
      <div>
        <span>name</span>
        <input type="text" name="name">
      </div>
      
      <div>
        <span>password</span>
        <input type="password" name="password">
      </div>
      @if(session("message"))
        <div>{{ session("message") }}</div>
      @endif
      <button type="submit">submit</button>
    </form>

  </div>
</div>


@include("footer")