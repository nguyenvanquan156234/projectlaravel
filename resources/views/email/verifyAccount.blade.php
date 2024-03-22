<h3>Hi: {{$account->name}}</h3>
<p>Vui lòng click vào link phía dưới để xác nhận tài khoản</p>
    <a href="{{route('verify',$account->email)}}">Click here</a>
</p>
