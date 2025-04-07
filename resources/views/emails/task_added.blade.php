<link rel="stylesheet" href="{{ asset('css/bootstrap-to-do-list.min.css') }}" />

<h2>{{$todo->title}}</h2> 
<div>
Congrate! and welcome to our task management app
</div>
<div>
    <a href="{{ url('/Todo/Task_list'. $todo->idateid) }}">view your task here</a>
</div>