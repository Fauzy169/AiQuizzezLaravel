<form method="POST" action="{{ url('/quiz/generate') }}">
    @csrf
    <input type="text" name="title" placeholder="Quiz Title" required>
    <textarea name="prompt" placeholder="Describe the quiz" required></textarea>
    <button type="submit">Generate Quiz</button>
</form>
