@component('mail::message')
# A Heading



- Name: {{$name}}
- Phone: {{$phone}}

@component('mail::button',['url' => 'https://laracasts.com'])
    Visit Laracasts
@endcomponent
@endcomponent
