<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">

        @if (Session::has('Student'))
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Students</a>
            </li>
           {{Session::put('Student',null)}}
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Students</a>
            </li>
        @endif

        @if (Session::has('Exam'))
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/exam') }}">Exams</a>
            </li>
            {{Session::put('Exam',null)}}

        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/exam') }}">Exams</a>
            </li>
        @endif

        @if (Session::has('StudentExam'))
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/studentexam') }}">Student's Exam</a>
            </li>
          {{Session::put('StudentExam',null)}}

        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/studentexam') }}">Student's Exam</a>
            </li>

        @endif
    </ul>
  </div>
</nav>
