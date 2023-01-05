@component('mail::message')

<p><strong>Name: </strong>{{$data['name']}}</p>
<p><strong>Phone: </strong>{{$data['phone']}}</p>
<p><strong>Email: </strong>{{$data['email']}}</p>
<br>
<p><strong>Tour Date: </strong>{{$data['phone']}}</p>
<p><strong>Tour Time: </strong>{{$data['date']}}</p>
<br>
@component('mail::panel')
{{$data['message']}}
@endcomponent
@endcomponent
