@include("header")

<div>
  <h2>Show User</h2>
    <div>
      <span>name</span>
      <span>{{ $user->name }}</span>
    </div>
    <div>
      <span>email</span>
      <span>{{ $user->email }}</span>
    </div>
    <div>
      <span>memo</span>
      <span>{{ $user->memo }}</span>
    </div>
    <div>
      <span>created_at</span>
      <span>{{ $user->created_at }}</span>
    </div>
</div>

@include("footer")